$(document).ready(function(){

	/**
	 *
	 * @param {type} data
	 */
	Callbacks.finalizarSenha = function(data)
	{
		$('.grid-body').empty();
		$('.hide-on-success').addClass('animated flipOutX');
		$('.grid-body').addClass('animated flipInX text-center text-success').html('<i class="fa fa-check" aria-hidden="true" style="font-size: 370px"></i>');
		$('.page-title h3').html('Sua senha <span class="semi-bold">foi alterada</span>');
	};

	/*
	 * Campos com máscara.
	 */
	try
	{
		$('#cpf').mask('000.000.000-00', {placeholder : ''});
		$('#cep').mask('00000-000', {placeholder : ''});
		$('#cep-cadastro').mask('00000-000', {placeholder : ''});

		$('#data-vigencia').datepicker({
				format:'dd/mm/yyyy',
				language:'pt-BR',
				startDate: new Date(new Date().getTime()+(1 *24*60*60*1000))
			});
	}
	catch(e)
	{
		missingPlugin('jquery.inputmask');
	}

	if($('.dropzone + .wrapper-current-img').size() > 0)
	{
		$('.dropzone').hide();
		$('.wrapper-current-img a').click(function(){
			$(this).closest('.wrapper-current-img').hide();
			$('.dropzone').show();
		});
	}

	$('#uf').change(function(){
		$('#cidade').select2('val', '');
	});

	if($('#id').val())
		Dropzone.forElement('.dropzone').options.params['usuario'] = $('#id').val();

	$('#js-remove-user').click(function(e){
		e.preventDefault();
		var link = $(this);

		showConfirm('Remover usuário', 'Deseja mesmo remover?', 'Remover', function(modal){
			modal
				.find('button').prop('disabled', true)
					.filter('.btn-danger').html('<i class="fa fa-spin fa-spinner"></i> Aguarde');

			$.get(link.attr('href')).success(function(data){
				modal.modal('hide');
				showMessage(data.message, data.type);

				if(!!data.url)
				{
					setTimeout(function(){
						window.location.href = data.url;
					}, 3000);
				}
			}).error(function(){
				modal
					.find('button').prop('disabled', false)
						.filter('.btn-danger').html('Remover usuário');
				showMessage('Que coisa! Ocorreu um erro inesperado. Tente novamente.', 'error');
			});
		});
	});

	$('#js-change-password').click(function(e){
		e.preventDefault();
		var link = $(this);

		if(!link.hasClass('loading'))
		{
			link
				.addClass('loading')
				.data('original-html', link.html())
				.html('<i class="fa fa-spin fa-spinner"></i> Aguarde');

			$.get(link.attr('href')).success(function(data){
				link.removeClass('loading').html(link.data('original-html'));
				showMessage(data.message, data.type);
			}).error(function(){
				link.removeClass('loading').html(link.data('original-html'));
				showMessage('Que coisa! Ocorreu um erro inesperado. Tente novamente.', 'error');
			});
		}
	});

	$('.js-dynamic-table').on('draw.dt', function(){
		$(this).find('span').popover({
			html : true,
			trigger : 'hover',
			placement : 'left',
			content : function(){
				return $(this).data('content');
			}
		});
	});

	$('#js-generate-pwd').click(function(){
		var pwd = '';
		var size = $('#js-pwd-size').val();
		var chrs = ['abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', '0123456789', '!@#$%&*()_-+=[]{}<>~^:;/?,.|'];
		var chr = chrs.join('');
		var i = -1, a, x = -1;

		while(++i < size)
			pwd += chr.charAt(rand(0, chr.length));

		x = -1;

		while(++x < chrs.length)
		{
			a = chrs[x];

			if(x == chrs.length - 1)
				a = a.replace(/(.)/g, '\\$1');

			if(!pwd.match('[' + a + ']'))
			{
				console.log('No match ' + pwd + ' for ' + a);
				arguments.callee();
				return;
			}
		}

		$('.js-pwd').val(pwd).last().click();
		$('.js-pwd').first().trigger('keyup');
	});

	$('.js-pwd:last').click(function(){
		this.select();
	});

	$('.js-pwd:first').keyup(function(){
		var s = 0;
		var v = this.value;
		var p = $('.progress-bar');

		if(v.match('[a-z]'))
			s += 2;

		if(v.match('[A-Z]'))
			s += 2;

		if(v.match('[0-9]'))
			s += 2;

		if(v.match('[\\-\\!\\@\\#\\$\\%\\&\\*\\(\\)\\_\\+\\=\\[\\]\\{\\}\\~\\^\\:\\;\\/\\?\\,\\.\\|\\<\\>]'))
			s += 2;

		if(v.length >= 8)
			s += 1;

		if(v.length >= 14)
			s += 1;

		if(s < 6)
			p.attr('class', 'progress-bar-danger');
		else if((s >= 6) && (s <= 8))
			p.attr('class', 'progress-bar-warning');
		else
			p.attr('class', 'progress-bar-success');

		s *= 10;
		p.addClass('progress-bar animate-progress-bar').css('width', s + '%');
	});

	if(optimuz.showPermissionsSlugs)
		$('.checkbox .tip').tooltip();

	/*
     * Busca por informações de endereço pelo CEP
     */
    $('#cep-cadastro').blur(function(){

        var cep = $(this).val().replace('-', '');
        var box = $(".js-address-box").first();
		var canSearch = cep.length == 8;

        if(canSearch)
        {
            blockUI(box);

            $.get(optimuz.baseUrl + 'usuario/busca-cep/' + cep, function(data){
                unblockUI(box);

                if(data.success)
                {
                    $('#logradouro').val(data.endereco.logradouro);
                    $('#bairro').val(data.endereco.bairro);
                    $('#uf').select2('val', data.endereco.uf);
                    $('#cidade').select2('data', data.endereco.cidade);
                    $('#numero').val('');
                    $('#complemento').val('');
                }
				else
				{
					unblockUI(box);
					showMessage(data.message, data.type);
				}
            }).error(function(){
                unblockUI(box);
                showMessage('Ops! Não foi recuperar o endereço. Tente novamente.', 'error');
            });
        }
		else
		{
			setInputError($(this), 'Informe um cep válido!');
		}
    });

	/*
	 * Ativa o cadastro do usuário.
	 */
	$('#js-enable-user').click(function()
	{
		var box = $(this);

		var enable = function()
		{
			blockUI(box);

			$.get(resolveUrl('~/usuario/ativar/' + $('#id').val()), function(data){

				if(data.success)
				{
					unblockUI(box);
					showMessage(data.message, data.type);
					setTimeout(function(){
						window.location.href = resolveUrl('~/usuario/editar/' + data.id);
					}, 3000);
				}
				else
				{
					unblockUI(box);
					showMessage(data.message, data.type);
				}
			}).error(function()
			{
				unblockUI(box);
				showMessage('Ocorreu um erro ao ativar o usuário, por favor tente novamente!', 'error');
			});
		};

		var title = 'Ativar <span class="semi-bold">Usuário</span>';
		var message = '<h4>Deseja realmente ativar este usuário?</h4>';
		var textBtn = 'Ativar';
		var classBtn = 'btn-success';

		showConfirm(title, message, textBtn, enable, classBtn);
	});

	/*
	 * Desativa o cadastro do usuário.
	 */
	$('#js-disable-user').click(function()
	{
		var box = $(this);

		var disable = function()
		{
			blockUI(box);

			$.get(resolveUrl('~/usuario/desativar/' + $('#id').val()), function(data){

				if(data.success)
				{
					unblockUI(box);
					showMessage(data.message, data.type);
					setTimeout(function(){
						window.location.href = resolveUrl('~/usuario/editar/' + data.id);
					}, 3000);
				}
				else
				{
					unblockUI(box);
					showMessage(data.message, data.type);
				}
			}).error(function()
			{
				unblockUI(box);
				showMessage('Ocorreu um erro ao inativar o usuário, por favor tente novamente!', 'error');
			});
		};

		var title = 'Desativar <span class="semi-bold">Usuário</span>';
		var message = '<h4>Deseja realmente desativar este usuário? <p> Ele será desvinculado de todas as pesquisas ativas!</h4>';
		var textBtn = 'Desativar';
		var classBtn = 'btn-danger';

		showConfirm(title, message, textBtn, disable, classBtn);
	});
});