$(document).ready(function(){

	/**
	 * Inputs usados para o cadastro de um novo usuário.
	 * @returns {Jquery} description
	 */
	var inputsRegister = function(){
		return $('#nome-completo, #email, #confirmar-email, #celular, #cadastro-senha, #tipo-cliente');
	};

	/**
	 *
	 * @returns {jQuery}
	 */
	var inputRecoverEmail = function(){
		return $('#email-recuperar-senha');
	};

	/**
	 *
	 * @returns {jQuery}
	 */
	var inputsLogin = function(){
		return $('#usuario, #senha');
	};

	/*
	 * Exibe os campos de recuperação de senha.
	 */
	$('#js-recover-pwd').click(function()
	{
		var container = $(this).closest('.js-login-container');
		inputsLogin().attr('required', false);
		inputsRegister().attr('required', false);
		inputRecoverEmail().attr('required', true);
		$('#logar').attr('disabled', true);

		container.fadeOut('fast', function(){
			$('.box-recover-psw')
				.hide()
				.removeClass('hide')
				.fadeIn('fast');
			$('#email').focus();
		});
	});

	/*
	 * Exibe os campos de cadastro de usuário.
	 */
	$('#js-create-account').click(function()
	{
		var container = $(this).closest('.js-login-container');
		inputsLogin().attr('required', true);
		inputRecoverEmail().attr('required', false);
		inputsRegister().attr('required', true);
		$('#logar').attr('disabled', true);

		container.fadeOut('fast', function(){
			$('.box-create-account')
				.hide()
				.removeClass('hide')
				.fadeIn('fast');
		});
	});

	/*
	 * Exibe os campos de login.
	 */
	$('.js-show-login').click(function(){
		var container = $(this).closest('.js-login-container');
		inputsRegister().attr('required', false);
		inputRecoverEmail().attr('required', false);
		inputsLogin().attr('required', true);
		$('#logar').attr('disabled', false);

		container.fadeOut('fast', function(){
			$('.box-login')
				.hide()
				.removeClass('hide')
				.fadeIn('fast');
		});
	});

	/*
	 * Envia a solicitação de recuperação.
	 */
	$('#js-recover-btn').click(function()
	{
		var email = $('#email-recuperar-senha');
		var btn = $(this);

		if(email.val())
		{
			var postData = {
				email : email.val()
			};

			removeInputError(email);
			blockUI(btn);

			$.post(optimuz.baseUrl + 'login/recuperar-senha', postData, function(data)
			{
				if(data.success)
				{
					email.prop('disabled', false);
					btn.prop('disabled', false);

					unblockUI(btn);

					email.closest('.js-login-container').closest('.js-login-container').html(
						'<div class="row">'
							+ '<div class="col-md-3 text-white p-l-40">'
								+ '<i class="fa fa-check fa-5x pull-left "></i>'
							+ '</div>'
							+ '<div class="col-md-9 text-white">'
								+ data.message
							+ '</div>'
						+ '</div>'
					).addClass('text-black')
					.next().children(0).removeClass('col-md-12').addClass('m-t-10');
				}
				else
				{
					email.prop('disabled', false);
					btn.prop('disabled', false);
					unblockUI(btn);
					showMessage(data.message, data.type || 'error');
				}
			}).error(function(){
				email.prop('disabled', false);
				btn.prop('disabled', false);
				unblockUI(btn);
				showMessage('Ops! Não foi possível recuperar seu e-mail. Tente novamente em alguns instantes.', 'error');
			});
		}
		else
		{
			setInputError(email, 'Informe o endereço de e-mail que está vinculado à sua conta.');
			email.focus();
		}
	});

	/*
	 * Cadastra um novo usuario.
	 */
	$('#cadastrar').click(function(){
		var box = $(this);
		blockUI(box);

		var name = $('#nome-completo').val();
		var email = $('#email').val();
		var cpf = $('#cpf').val();
		var rg = $('#rg').val();
		var cellphone = $('#celular').val();
		var password = $('#cadastro-senha').val();
		var confirmPsw = $('#confirmar-cadastro-senha').val();
		var typeCliente = $('[name="tipo-cliente"]:checked ').val();

		var postData = {
			'nome-completo' : name,
			cpf : cpf,
			rg : rg,
			email : email,
			celular : cellphone,
			'cadastro-senha' : password,
			'confirmar-cadastro-senha' : confirmPsw,
			'tipo-cliente' : typeCliente
		};

		$.post(resolveUrl('login/cadastrar-usuario'), postData, function(data){
			unblockUI(box);

			if(data.success)
			{
				showMessage(data.message, data.type);

				setTimeout(function(){
					window.location.href = optimuz.baseUrl;
				}, 3000);
			}
			else
			{
				if(!!data.message)
					showMessage(data.message, data.type);

				if(!!data.result)
					displayResultErrors(data.result, $('.box-create-account'));
			}
		}).error(function(){
			unblockUI(box);
			showMessage('Ocorreu um erro ao efetuar seu cadastro, a equipe LegalWay foi avisada e iremos verificar o mais rápido possivel', 'error');
		});;

	});

});