$(document).ready(function () {

	var table = $('.js-dynamic-table');

	Callbacks.updateComplete = function(data)
	{
		var action = $('form').attr('action');
		var newAction = action.replace("atualizar", "salvar");

		/*
		 * Muda o action do formulario
		 */
		$('form').attr('action', newAction);
		$('form').find('input[type=text], #id').val('');

		showMessage('Registro atualizado com sucesso.', 'success');
		$('.js-dynamic-table').dataTable().api().ajax.reload();
	};

	/*
	 * Configura a tabela logo após ela ser desenhada.
	 */
	table.on('draw.dt', function () {
		table.find('.tip').tooltip();
	});

	/*
	 * Exibe o campo de texto ao clicar em um registro da tabela.
	 */
	table.delegate('tbody td:first-child', 'dblclick', function (evt) {
		$(this).find('.js-span').hide().nextAll().last().removeClass('hide').show().focus();
	});

	/*
	 * Exibe o campo de texto para edição de cor no caso de a tela ser situação de erro tse.
	 */
	table.delegate('tbody td:nth-child(2)', 'dblclick', function (evt) {
		$(this).find('.js-span').hide().nextAll().removeClass('hide').show().filter('input').focus();
	});

	/*
	 * Atualiza o registro com o novo valor do campo de texto, ou simplesmente
	 * cancela a edição.
	 */
	table.delegate('.js-input', 'keyup', function (evt) {
		var input = $(this);
		var colorString = '';
		var isValid = true;

		if (evt.keyCode == 13)
		{
			var tipo = 0;

			if (input.data('cor') == 1)
				tipo = 1;
			else if (input.data('prazo') == 1)
				tipo = 2;

			if (tipo == 1)
			{
				colorString = $(this).val().match(/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/);

				if (!colorString)
					isValid = false;
			}

			if (!!input.val() && isValid)
			{
				var postData = {
					id: input.data('id'),
					tipo: tipo,
					nome: input.val(),
					cadastro: $('input[name=cadastro]').val()
				};

				input.removeClass('error').parent().removeClass('error-control tip');
				input.tooltip('destroy');
				input.prop('disabled', true);

				$.post(optimuz.baseUrl + 'cadastro-basico/atualizar', postData, function (data) {
					input.prop('disabled', false);

					if (data.success)
					{
						if (tipo == 0)
						{
							input.hide().prev().html(input.val()).show();
						}
						else if (tipo == 2)
						{
							input.hide().prev().html(input.val()).show();
						}
					} else
					{
						input.addClass('error').parent().addClass('error-control tip');
						input.attr('title', data.message || 'Ocorreu um erro. Tente novamente.')
								.tooltip({
									trigger: 'manual'
								}).tooltip('show');
					}
				}).error(function () {
					input.prop('disabled', false);
					input.addClass('error').parent().addClass('error-control tip');
					input.attr('title', 'Ocorreu um erro. Tente novamente.')
							.tooltip({
								trigger: 'manual'
							}).tooltip('show');
				});
			} else
			{
				if (tipo == 0)
				{
					input.addClass('error').parent().addClass('error-control tip');
					input.attr('title', 'Este campo não pode ficar vazio')
							.tooltip({
								trigger: 'manual'
							}).tooltip('show');
				}
				else
				{
					input.addClass('error').parent().addClass('error-control tip');
					input.attr('title', 'Cor em hexadecimal inválida, favor inserir um valor válido (Ex: #F18 ou #18FF00)')
						.tooltip({
							trigger: 'manual'
						}).tooltip('show');
				}
			}
		}
		else if (evt.keyCode == 27)
		{
			var isCor = 0;

			if (input.data('cor') == 1)
				isCor = 1;

			input.parent().removeClass('error-control tip');
			input.tooltip('destroy');
			input.hide().val(input.prev().text()).prev().show();

			if (input.data('cor') == 1)
			{
				$('.js-input + span').hide();
			}
		}
	});

	/*
	 * Cancela a edição do registro ao clicar fora.
	 */
	table.delegate('.js-input', 'blur', function (evt) {
		var input = $(this);
		input.removeClass('error').parent().removeClass('error-control tip');
		input.tooltip('destroy');
		input.val(input.prev().text()).prev().show().nextAll().hide();
	});

	/**
	 * Evento usado no gerenciamento de perfis.
	 *
	 * Atualiza o perfil de acordo com as permissões selecionadas.
	 */
	$('.btn-update-profile').click(function(){
		var profileId = $('#box-profiles .actived').data('id');
		var permissions = $('.js-permission:checked');
		var btn = $(this);


		if(profileId && permissions.length)
		{
			blockUI(btn);

			var postData = {
				'perfil-id' : profileId,
				'permissoes' : []
			};

			permissions.each(function(){
				postData['permissoes'].push($(this).val());
			});

			$.post(resolveUrl('~/cadastro-basico/atualizar-perfil'), postData, function(data){
				unblockUI(btn);
				showMessage(data.message, data.type);
			}).error(function(){
				unblockUI(btn);
				showMessage('Ocorreu um erro ao atualizar o perfil. Por favor tente novamente.', 'error');
			});
		}
		else
		{
			if(!profileId)
				showMessage('Selecione o perfil para efetuar as alterações', 'info');
			else
				showMessage('Selecione ao menos uma permissão de acesso do perfil', 'info');
		}
	});

	/*
	 * Evento usado no gerenciamento de perfis.
	 *
	 * Ao clicar na lista uma requisição é feita para verificar as permissões
	 * atribuidas ao perfil selecionado.
	 */
	$('body').delegate('.js-profile', 'click', function(){

		var profileId = $(this).data('id');
		var boxPermissions = $('#box-permissions');

		blockUI(boxPermissions);

		$.get(resolveUrl('~/cadastro-basico/listar-permissoes/' + profileId), function(data){

			$('.js-permission').removeAttr('checked');
			unblockUI(boxPermissions);

			if(data.success)
			{
				for(var i in data.permissionsId)
					$('#permissoes-' + data.permissionsId[i]).prop('checked', 'checked');
			}
		}).error(function(){
			unblockUI(boxPermissions);
			showMessage('Ocorreu um erro ao verificar as permissões diponiveis para o perfil. Por favor atualize a página', 'error');
		});
	});

	/*
	 * Evento usado no gerenciamento de perfis.
	 *
	 * Salva um novo perfil no sistema com as permissões selcionadas.
	 */
	$('.js-new-profile').click(function(){

		var nameProfile		= $('#nome-perfil');
		var permissions		= $('.js-new-permission:checked');
		var modal			= $('#novo-perfil');
		var bodyModal		= $('#novo-perfil .modal-body');

		if(nameProfile.val() != '' && permissions.length)
		{
			var btn = $(this);
			blockUI(btn);

			var postData = {
				'nome-perfil' : nameProfile.val(),
				'novas-permissoes' : []
			};

			permissions.each(function(){
				postData['novas-permissoes'].push($(this).val());
			});

			$.post(resolveUrl('~/cadastro-basico/salvar-perfil'), postData, function(data){

				unblockUI(btn);

				if(data.success)
				{
					modal.modal('hide');
					showMessage(data.message, data.type);
					$('.clickable-list').append('<li class="list-group-item js-profile" data-id="' + data.id + '">' + data.nome + '</li>');

					/*
					 * Reseta os inputs
					 */
					nameProfile.val('');
					permissions.removeAttr('checked');
				}
				else
				{
					showBoxMessage(bodyModal, data.message, data.type);
				}

			}).error(function(){
				unblockUI(btn);
				showBoxMessage(bodyModal, 'Ocorreu um erro ao salvar o perfil. Por favor tente novamente', 'error');
			});
		}
		else
		{
			if(nameProfile.val() == '')
				setInputError(nameProfile, 'O nome do perfil é obrigatório');
			else
				showBoxMessage(bodyModal, 'É necessário selecionar ao menos uma permissão para continuar', 'info');
		}
	});
});