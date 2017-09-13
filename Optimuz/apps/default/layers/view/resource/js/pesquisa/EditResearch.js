/**
 * Este arquivo atribui os eventos exclusivos da área de edição de pesquisa.
 * @author Bruno Cordeiro.
 */
modules.editResearch = (function()
{
	/**
	 * Identificador do timer usado para esconder a mensagem de erro exibida por
	 * showMessage().
	 * @type {Number}
	 */
	var hideCustomMessageTimeoutID = null;

	/**
	 * Exibe uma mensagem personalizada na tag especificada.
	 * @param {String} msg Mensagem de erro. Pode conter HTML.
	 * @param {String} type Tipo da mensagem: error, success ou info. Se não for
	 * passado, o tipo padrão será assumido (info).
	 */
	function showCustomMessage(msg, type)
	{
		var selector = $('#custom-message');

		if(!type)
			type = 'info';

		var divClss = 'alert-';
		var btnClss = type;
		var icon = '';
		var animationClss = '';

		switch(type)
		{
			case 'error':
				icon = 'exclamation-triangle';
				animationClss = 'bounceInDown';
				btnClss = 'danger';
				break;
			case 'success':
				icon = 'check';
				animationClss = 'fadeInDown';
				break;
			case 'info':
				icon = 'info';
				animationClss = 'fadeInDown';
				break;
			default:
				divClss = '';
				break;
		}

		selector.hide().stop(true, true).html(
			'<div class="alert ' + divClss + type + ' clearfix m-b-0 m-t-10 m-b-10">' +
				'<div class="pull-left">' +
					'<i class="fa fa-' + icon + ' m-r-10"></i>' +
					msg +
				'</div>' +
				'<button type="button" class="close" data-dismiss="alert" aria-label="Fechar"></button>' +
			'</div>'
		).show().children().addClass('animated ' + animationClss)
			.one('mouseenter', function(){
				clearTimeout(hideCustomMessageTimeoutID);
			})
			.one('click', function(){
				hideCustomMessage(selector);
			});

		$('#visualizar-perguntas').scrollUp();
		clearTimeout(hideCustomMessageTimeoutID);
		hideCustomMessageTimeoutID = setTimeout(function(){
			hideCustomMessage(selector);
		}, 10000);
	}

	/**
	 * Esconde a mensagem personalizada da página.
	 * @param {jQuery} selector que a foi adicionada a mensagem.
	 */
	function hideCustomMessage(selector)
	{
		if(hideCustomMessageTimeoutID > 0)
		{
			clearTimeout(hideCustomMessageTimeoutID);
			hideCustomMessageTimeoutID = 0;
			selector.fadeOut('fast', function(){
				$(this).empty();
			});
		}
	}

	/**
	 * Atualiza o número das questões.
	 */
	function updateNumbers()
	{
		$('.js-number').each(function(p){
			$(this).empty().append((p+1) + ' - ');
		});
	};

	var editResearch =
	{
		/**
		 * Remove a pergunta do banco de dados e do formulário html.
		 */
		removeQuestion : function()
		{
//			$('body').delegate('.js-line-question .js-remove-question', 'click', function(){
//
//				var element = $(this);
//				var questions = $(this).closest('.grid.simple');
//
//				var remove = function()
//				{
//					var boxQuestion = element.closest('.js-line-question');
//					var questionId = boxQuestion.data('pergunta-id');
//
//					blockUI(boxQuestion);
//
//					$.get(resolveUrl('~/pesquisa/remover-pergunta/' + questionId), function(data)
//					{
//						if(data.success)
//						{
//							unblockUI(boxQuestion);
//
//							boxQuestion.slideUp(300, function(){
//								$(this).remove();
//								showCustomMessage(data.message, data.type);
//
//								setTimeout(function(){
//									updateNumbers();
//								}, 50);
//							});
//						}
//						else
//						{
//							unblockUI(boxQuestion);
//							showCustomMessage(data.message, data.type);
//						}
//					}).error(function(){
//						unblockUI(boxQuestion);
//						showCustomMessage('Ocorreu um erro ao remover a pergunta, por favor tente novamente!', 'error');
//					});
//				};
//
//				var hidePopover = function(){
//					element.removeClass('overall-element').popover('hide');
//				};
//
//				$(this).popover({
//					html : function(){alert('Bruno cordeiro'); return true;},
//					trigger : 'manual',
//					placement : 'left',
//					title : 'Deseja realmente remover esta pergunta?',
//					content : function(){
//						var content = $(
//							'<div> Deseja realmente remover esta pergunta ? <div>'
//							+ '<div class="text-right m-t-10">' +
//								'<button class="btn btn-success btn-small m-r-10 " type="button"> SIM </button>' +
//								'<button class="btn btn-danger btn-small" type="button"> NÃO </button>' +
//							'</div>'
//						);
//
//						content.find('button.btn-success').click(function(){
//							hidePopover();
//							remove();
//						});
//
//						content.find('button.btn-danger').click(function(){
//							hidePopover();
//						});
//						return content;
//					}
//				}).popover('show');
//			});
		},

		/**
		 * Objeto responsável pela manipulação e apresentação das respostas,
		 * opções adicionadas e de seus respectivos tipos.
		 */
		response : {

			/*
			 * Campo usado para receber as respostas.
			 */
			inputResponse : function()
			{
				return $('.js-input-response').empty();
			},

			/*
			 * Campo usado para apresentar a resposta.
			 */
			presentResponse : function()
			{
				return $('.js-present-response').empty();
			},

			/*
			 * Resposta de tipo texto
			 */
			text : function()
			{
				$('.js-text-question').data('type-response', 1);
				this.inputResponse();

				var textarea = '<div class="form-group col-md-12">'
								+ '<label class="form-label" for="desccricao">TIPO DE RESPOSTA</label>'
								+ '<div class="controls">'
									+ '<input type="text" class="form-control text-center" placeholder="RESPOSTA DE TIPO TEXTO" readonly>'
								+ '</div>'
							+ '</div>';

				var clone = $(textarea).hide();
				this.presentResponse().show().append(clone);
				clone.slideDown(400);
			},

			/*
			 * Resposta de tipo número.
			 */
			number : function()
			{
				$('.js-text-question').data('type-response', 2);
				this.inputResponse();

				var textarea = '<div class="form-group col-md-12">'
								+ '<label class="form-label" for="desccricao">TIPO DE RESPOSTA</label>'
								+ '<div class="controls">'
									+ '<input type="number" class="form-control text-center" placeholder="RESPOSTA DE TIPO NUMERO" readonly>'
								+ '</div>'
							 + '</div>';

				var clone = $(textarea).hide();
				this.presentResponse().show().append(clone);
				clone.slideDown(400);
			},

			/*
			 * Resposta de tipo multipla escolha.
			 */
			multChoice : function()
			{
				$('.js-text-question').data('type-response', 3);

				var htmlInput = '<div class="form-group col-md-12">'
									+ '<label class="form-label" for="sexo">Adicionar resposta</label>'
									+ '<div class="controls input-group">'
										+ '<input type="text" class="form-control">'
										+ '<a href="javascript:;" class="input-group-addon" title="Adicionar resposta">'
											+ '<i class="fa fa-plus"></i>'
										+ '</a>'
									+ '</div>'
								+ '</div>';

				var htmlCheck = '<div class="form-group col-md-6">'
									+ '<a href="javascript:;" class="pull-right" title="Adicionar resposta">'
										+ '<i class="fa fa-minus"></i>'
									+ '</a>'
									+ '<div class="controls checkbox check-success">'
										+ '<input type="checkbox" class="js-option">'
										+ '<label class="form-label" for=""></label>'
									+ '</div>'
								+ '</div>';

				var boxInput = $(htmlInput);
				var presentResponse = this.presentResponse();
				presentResponse.append('<div class="col-md-12"></div>');
				this.inputResponse().append(boxInput);
				boxInput.hide().slideDown(400);

				//Cria um novo checkbox com a resposta informada pelo input.
				boxInput.find('.input-group-addon').click(function()
				{
					var canAdd = boxInput.find('input').val().length >= 2;
					var input = boxInput.find('input');
					var isRepeated = false;

					//Verifica se a opção já foi adicionada.
					$('.js-present-response .js-option').each(function()
					{
						if(input.val() == $(this).data('text-option'))
						{
							canAdd = false;
							isRepeated = true;
						}
					});

					if(canAdd)
					{
						var option = $(htmlCheck);
						var forValue = (new Date()).getTime();
						var position = $('.js-option').length;

						//Personalização do checkbox.
						option.find('label').prepend(input.val());
						option.find('label').attr('for', forValue);
						option.find('input').attr('id', forValue);
						option.find('input').attr('data-position', position);
						option.find('input').attr('data-text-option', input.val());

						//Verifica quantos checkbox foram adicionados a div.
						var countRow = presentResponse.find('.row').last().children().length;

						if(countRow != 1)
							presentResponse.children().append('<div class="row"></div>');

						presentResponse.find('.row').last().append(option);
						option.hide().slideDown(350);
						input.val(null);

						//Remove a resposta adicionada.
						option.find('a').click(function()
						{
							$(this).parent().slideUp(200, function()
							{
								if($(this).siblings().length == 1)
									$(this).remove();
								else
									$(this).parent().remove();

								//Posição das perguntas.
								$('.js-option').each(function(p){
									$(this).attr('data-position', p);
								});
							});
						});
					}
					else
					{
						if(isRepeated)
							showMessage('Esta opção já foi adicionada!', 'info');
						else
							showMessage('O campo não possui caracteres suficientes!', 'error');
					}
				});
			},

			/*
			 * Resposta de tipo opção unica.
			 */
			optionUnique : function()
			{
				$('.js-text-question').data('type-response', 4);

				var htmlInput = '<div class="form-group col-md-12">'
									+ '<label class="form-label" for="sexo">Adicionar resposta</label>'
									+ '<div class="controls input-group">'
										+ '<input type="text" class="form-control">'
										+ '<a href="javascript:;" class="input-group-addon" title="Adicionar resposta">'
											+ '<i class="fa fa-plus"></i>'
										+ '</a>'
									+ '</div>'
								+ '</div>';

				var htmlRadio = '<div class="form-group col-md-6">'
									+ '<a href="javascript:;" class="pull-right" title="Remover Resposta">'
										+ '<i class="fa fa-minus"></i>'
									+ '</a>'
									+ '<div class="controls radio radio-success">'
										+ '<input type="radio" name="radio-option" class="js-option">'
										+ '<label class="form-label"> </label>'
									+ '</div>'
								+ '</div>';

				var boxInput = $(htmlInput);
				var presentResponse = this.presentResponse();
				presentResponse.append('<div class="col-md-12"></div>');
				this.inputResponse().append(boxInput);
				boxInput.hide().slideDown(400);

				//Cria um novo checkbox com a resposta informada pelo input.
				boxInput.find('.input-group-addon').click(function()
				{
					var input = boxInput.find('input');
					var canAdd = boxInput.find('input').val().length >= 2;
					var isRepeated = false;

					//Verifica se a opção já foi adicionada.
					$('.js-present-response .js-option').each(function()
					{
						if(input.val() == $(this).data('text-option'))
						{
							canAdd = false;
							isRepeated = true;
						}
					});

					if(canAdd)
					{
						var option = $(htmlRadio);
						var forValue = (new Date()).getTime();
						var position = $('.js-option').length;
						var value = input.val();

						//Personalização do checkbox.
						option.find('label').prepend(value);
						option.find('label').attr('for', forValue);
						option.find('input').attr('id', forValue);
						option.find('input').attr('data-position', position);
						option.find('input').attr('data-text-option', value);

						$("#opcao-excecao").append($('<option>', {value: value, text: value}));

						//Verifica quantos checkbox foram adicionados a div.
						var countRow = presentResponse.find('.row').last().children().length;

						if(countRow != 1)
							presentResponse.children().append('<div class="row"></div>');

						presentResponse.find('.row').last().append(option);
						option.hide().slideDown(350);
						input.val(null);

						//Remove a resposta adicionada.
						option.find('a').click(function()
						{
							$(this).parent().slideUp(200, function()
							{
								if($(this).siblings().length == 1)
									$(this).remove();
								else
									$(this).parent().remove();

								$("#opcao-excecao option[value='" + value + "']").remove();
								$("#opcao-excecao").select2('val', 0).trigger('change');

								//Posição das perguntas.
								$('.js-option').each(function(p){
									$(this).attr('data-position', p);
								});
							});
						});
					}
					else
					{
						if(isRepeated)
							showMessage('Esta opção já foi adicionada!', 'info');
						else
							showMessage('O campo não possui caracteres suficientes!', 'error');
					}
				});
			},

			/*
			 * Resposta de tipo multipla escolha com imagem.
			 */
			multChoiceWithImage : function()
			{
				$('.js-text-question').data('type-response', 5);

				var htmlInput = '<div class="form-group col-md-12">'
									+ '<label class="form-label" for="sexo">Adicionar resposta</label>'
									+ '<div class="controls input-group">'
										+ '<input type="text" class="form-control"/>'
										+ '<a href="javascript:;" class="input-group-addon img" title="Adicionar imagem">'
											+ '<i class="fa fa-camera"></i>'
										+ '</a>'
										+ '<a href="javascript:;" class="input-group-addon add" title="Adicionar resposta">'
											+ '<i class="fa fa-plus"></i>'
										+ '</a>'
									+ '</div>'
									+ '<div id="js-add-imagem" class="text-center">'
										+ '<div class="dropzone my-upload no-margin col-md-12 text-center" data-url="~/pesquisa/upload-imagem">'
											+ '<div class="fallback">'
												+ '<input type="file" name="file" id="file">'
											+ '</div>'
										+ '</div>'
									+ '</div>'
								+ '</div>';

				var htmlCheck = '<div class="col-md-12 m-b-50 previewDz">'
									+ '<img src="" alt="" width="36" height="36" class="pull-left m-r-10"/>'
									+ '<a href="javascript:;" class="pull-right m-t-10" title="Remover">'
										+ '<i class="fa fa-minus"></i>'
									+ '</a>'
									+ '<div class="controls checkbox check-success pull-left">'
										+ '<input type="checkbox" class="js-option">'
										+ '<label class="form-label m-t-10" for=""></label>'
									+ '</div>'
								+ '</div>';

				var boxInput = $(htmlInput);
				var presentResponse = this.presentResponse();
				presentResponse.append('<div class="col-md-12"></div>');
				this.inputResponse().append(boxInput);
				boxInput.hide().slideDown(400);

				//Cria um novo checkbox com a resposta informada pelo input.
				boxInput.find('.input-group-addon.add').click(function()
				{
					var canAdd = boxInput.find('input').val().length >= 2;
					var input = boxInput.find('input');
					var isRepeated = false;
					var image = boxInput.find('.dz-filename').find('span').html();

					if(image == "" || image == 'undefined' || image == null)
						canAdd = false;

					//Verifica se a opção já foi adicionada.
					$('.js-present-response .js-option').each(function()
					{
						if(input.val() == $(this).data('text-option'))
						{
							canAdd = false;
							isRepeated = true;
						}
					});

					if(canAdd)
					{
						var option = $(htmlCheck);
						var forValue = (new Date()).getTime();
						var position = $('.js-option').length;

						//Bloqueia a dropzone e inicia o upload da imagem.
						blockUI('.js-input-response');
						myDropzone.processQueue();

						//Personalização do checkbox.
						option.find('label').prepend(input.val());
						option.find('label').attr('for', forValue);
						option.find('input').attr('id', forValue);
						option.find('input').attr('data-position', position);
						option.find('input').attr('data-text-option', input.val());
						option.find('input').attr('data-image', image);

						//Verifica quantos checkbox foram adicionados a div.
						var countRow = presentResponse.find('.row').last().children().length;

						if(countRow != 1)
							presentResponse.children().append('<div class="row"></div>');

						presentResponse.find('.row').last().append(option);
						option.hide().slideDown(350);
						input.val(null);

						//Remove a resposta adicionada.
						option.find('a').click(function()
						{
							$(this).parent().slideUp(200, function()
							{
								if($(this).siblings().length == 1)
									$(this).remove();
								else
									$(this).parent().remove();

								//Posição das perguntas.
								$('.js-option').each(function(p){
									$(this).attr('data-position', p);
								});
							});
						});
					}
					else
					{
						if(isRepeated)
							showMessage('Esta opção já foi adicionada!', 'info');
						else
							showMessage('O campo não possui caracteres suficientes ou nenhuma imagem foi anexada!', 'error');
					}
				});


				/*
				 * Ao clicar no icone de câmera no input alternativas, abre uma
				 * dropzone para o usuário adicionar uma imagem.
				 */
				$("#js-add-imagem").hide();

				try
				{
					var myDropzone = new Dropzone(".dropzone",
					{
						url					: resolveUrl($('.dropzone').data('url')),
						maxFiles			: 1,
						dictDefaultMessage	: "Anexe uma imagem para esta alternativa.",
						addRemoveLinks		: true,
						dictRemoveFile		: 'Remover Imagem',
						paramName			: 'file',
						autoProcessQueue	: false,
						acceptedFiles		: "image/jpeg, image/gif",

						init : function(){
							this.on("addedfile", function(){
								$('.dz-remove').addClass('btn btn-danger');
							});

							this.on("complete", function(){
								myDropzone.removeAllFiles(true);
								$("#js-add-imagem").slideUp();
								unblockUI('.js-input-response');
							});

							this.on("success", function(file, data){
								$('.previewDz img').last().attr('src', data.pathImage);
								unblockUI('.js-input-response');
							});

							this.on("error", function(file){
								if(!file.accepted)
								{
									this.removeFile(file);
									showMessage('A imagem não possui um formato válido. Permitidos (jpg/gif)', 'error');
								}
							});

							this.on("maxfilesexceeded", function(file){
								this.removeAllFiles();
								this.addFile(file);
								showMessage('A imagem que você esta tentando anexar é muito grande. Tamanho máximo (5MB)', 'error');
							});
						}
					});
				}
				catch(e)
				{
					console.log('Plugin DropZone não inicializado.');
				}

				boxInput.find('.input-group-addon.img').click(function(e){
					e.preventDefault();
					$("#js-add-imagem").slideToggle();
				});
			},

			/*
			 * Resposta de tipo opção única com imagem.
			 */
			optionUniqueWithImage : function()
			{
				$('.js-text-question').data('type-response', 6);

				var htmlInput = '<div class="form-group col-md-12">'
									+ '<label class="form-label" for="sexo">Adicionar resposta</label>'
									+ '<div class="controls input-group">'
										+ '<input type="text" class="form-control">'
										+ '<a href="javascript:;" class="input-group-addon img" title="Adicionar imagem">'
											+ '<i class="fa fa-camera"></i>'
										+ '</a>'
										+ '<a href="javascript:;" class="input-group-addon add" title="Adicionar resposta">'
											+ '<i class="fa fa-plus"></i>'
										+ '</a>'
									+ '</div>'
									+ '<div id="js-add-imagem" class="text-center">'
										+ '<div class="dropzone my-upload no-margin col-md-12 text-center" data-url="~/pesquisa/upload-imagem">'
											+ '<div class="fallback">'
												+ '<input type="file" name="file" id="file">'
											+ '</div>'
										+ '</div>'
									+ '</div>'
								+ '</div>';

				var htmlRadio = '<div class="form-group col-md-12 m-b-50 previewDz">'
									+ '<img src="" alt="" width="36" height="36" class="pull-left m-r-10"/>'
									+ '<a href="javascript:;" class="pull-right m-t-10" title="Remover">'
										+ '<i class="fa fa-minus"></i>'
									+ '</a>'
									+ '<div class="controls radio radio-success pull-left">'
										+ '<input type="radio" name="radio-option" class="js-option">'
										+ '<label class="form-label"></label>'
									+ '</div>'
								+ '</div>';

				var boxInput = $(htmlInput);
				var presentResponse = this.presentResponse();
				presentResponse.append('<div class="col-md-12"></div>');
				this.inputResponse().append(boxInput);
				boxInput.hide().slideDown(400);

				//Cria um novo checkbox com a resposta informada pelo input.
				boxInput.find('.input-group-addon.add').click(function()
				{
					var input = boxInput.find('input');
					var canAdd = boxInput.find('input').val().length >= 2;
					var isRepeated = false;
					var image = boxInput.find('.dz-filename').find('span').html();
					var value = input.val();

					if(image == "" || image == 'undefined' || image == null)
						canAdd = false;

					$("#opcao-excecao").append($('<option>', {value: value, text: value}));

					//Verifica se a opção já foi adicionada.
					$('.js-present-response .js-option').each(function()
					{
						if(value == $(this).data('text-option'))
						{
							canAdd = false;
							isRepeated = true;
						}
					});

					if(canAdd)
					{
						var option = $(htmlRadio);
						var forValue = (new Date()).getTime();
						var position = $('.js-option').length;

						//Bloqueia a dropzone e inicia o upload.
						blockUI('.js-input-response');
						myDropzone.processQueue();

						//Personalização do checkbox.
						option.find('label').prepend(input.val());
						option.find('label').attr('for', forValue);
						option.find('input').attr('id', forValue);
						option.find('input').attr('data-position', position);
						option.find('input').attr('data-text-option', input.val());
						option.find('input').attr('data-image', image);

						//Verifica quantos checkbox foram adicionados a div.
						var countRow = presentResponse.find('.row').last().children().length;

						if(countRow != 1)
							presentResponse.children().append('<div class="row"></div>');

						presentResponse.find('.row').last().append(option);
						option.hide().slideDown(350);
						input.val(null);

						//Remove a resposta adicionada.
						option.find('a').click(function()
						{
							$(this).parent().slideUp(200, function()
							{
								if($(this).siblings().length == 1)
									$(this).remove();
								else
									$(this).parent().remove();

								$("#opcao-excecao option[value='" + value + "']").remove();
								$("#opcao-excecao").select2('val', 0).trigger('change');

								//Posição das perguntas.
								$('.js-option').each(function(p){
									$(this).attr('data-position', p);
								});
							});
						});
					}
					else
					{
						if(isRepeated)
							showMessage('Esta opção já foi adicionada!', 'info');
						else
							showMessage('O campo não possui caracteres suficientes ou nenhuma imagem foi anexada!', 'error');
					}
				});

				/*
				 * Ao clicar no icone de câmera no input alternativas, abre uma
				 * dropzone para o usuário adicionar uma imagem.
				 */
				$("#js-add-imagem").hide();

				try
				{
					var myDropzone = new Dropzone(".dropzone",
					{
						url					: resolveUrl($('.dropzone').data('url')),
						maxFiles			: 1,
						dictDefaultMessage	: "Anexe uma imagem para esta alternativa.",
						addRemoveLinks		: true,
						dictRemoveFile		: 'Remover Imagem',
						paramName			: 'file',
						autoProcessQueue	: false,
						acceptedFiles		: "image/jpeg, image/gif",

						init : function(){
							this.on("addedfile", function(){
								$('.dz-remove').addClass('btn btn-danger');
							});

							this.on("complete", function(){
								myDropzone.removeAllFiles(true);
								$("#js-add-imagem").slideUp();
								unblockUI('.js-input-response');
							});

							this.on("success", function(file, data){
								$('.previewDz img').last().attr('src', data.pathImage);
								unblockUI('.js-input-response');
							});

							this.on("error", function(file){
								if(!file.accepted)
								{
									this.removeFile(file);
									showMessage('A imagem não possui um formato válido. Permitidos (jpg/gif)', 'error');
								}
							});

							this.on("maxfilesexceeded", function(file){
								this.removeFile(file);
								showMessage('A imagem que você esta tentando anexar é muito grande. Tamanho máximo (5MB)', 'error');
							});
						}
					});
				}
				catch(e)
				{
					console.log('Plugin DropZone não inicializado.');
				}

				boxInput.find('.input-group-addon.img').click(function(e){
					e.preventDefault();
					$("#js-add-imagem").slideToggle();
				});
			}
		},

		/**
		 * Adiciona a pergunta e suas respectivas opções ao html para que o
		 * usuário possa ver.
		 */
		add : function()
		{
			var question			= $('#pergunta').val();
			var typeResponse		= $('#tipo-resposta').val();
			var category			= $('#categoria').val();
			var excecao				= $('#tipo-excecao').val();
			var triggerException	= $('#opcao-excecao').val();
			var required			= $('#obrigatoria').is(":checked");
			var subPergunta			= $('#sub-pergunta').val();
			var perguntaMae			= $('#pergunta-mae').val();
			var obrigatoria			= '';
			var textExcecao			= '';
			var textSubpergunta		= '';
			var canRestart			= false;

			var questionBox = '<div class="row js-question-added" data-category="' + category + '" data-required="' + required + '" data-exception="' + excecao + '" data-trigger="' + triggerException + '" data-subquestion="' + subPergunta + '" data-question-mother="' + perguntaMae + '">'
								+ '<div class="form-group col-md-12">'
									+ '<h4>'
										+ '<a title="Remover Pergunta" class="pull-right m-r-5" href="javascript:;">'
											+ '<i class="fa fa-times text-danger"></i>'
										+ '</a>'
									+ '</h4>'
									+ '<label class="form-label" >'
										+ '<span class="js-number semi-bold"></span>'
									+ '</label>'
									+ '<div class="controls"></div>'
								+ '</div>'
							+ '</div>';

			/*
			 * Tratamento das variáveis para estilizar
			 */
			if (excecao == 1)
				textExcecao = '<i class="fa fa-exclamation-triangle text-warning font-14 m-r-5" aria-hidden="true" title="Encerrar Pesquisa"></i>';
			else if (excecao == 2)
				textExcecao = '<i class="fa fa-exclamation-triangle text-info font-14 m-r-5" aria-hidden="true" title="Exibir Subperguntas"></i>';

			if(required == true)
				var obrigatoria = '<i class="fa fa-asterisk m-r-5 font-14 text-danger" aria-hidden="true" title="Pergunta obrigatória"></i>';

			if(subPergunta == 1)
				var textSubpergunta = '<i class="fa fa-paperclip m-r-5 font-14 text-info" aria-hidden="true" title="Subpergunta"></i>';

			/**
			 * Verifica se a pergunta foi adicionada e mostra ou remove o box
			 * de perguntas adicionadas.
			 */
			function verifyQuestions()
			{
				var box = $('.box-questions-added');

				if($('.js-question-added').length >= 1)
				{
					if(box.hasClass('hide'))
					{
						box
							.removeClass('hide')
							.hide()
							.slideDown(300);
					}
				}
				else
				{
					if(!box.hasClass('hide'))
					{
						box.slideUp(300, function(){
							box.addClass('hide');
						});
					}
				}
			}

			/**
			 * Remove a pergunta e atualiza o número das questões.
			 * @param selector Botão da pergunta.
			 */
			var remove = function(selector)
			{
				selector.closest('.row').closest('.alternativas').slideUp(300, function()
				{
					$(this).remove();
					verifyQuestions();

					try
					{
						var value = $(this).find('label').first().text();
						var result = value.split('- ');
						$("#pergunta-mae option[value='" + result[1] + "']").remove();
						$("#pergunta-mae").select2('val', 0).trigger('change');
					}
					catch(e){}

					$('.js-number').each(function(p)
					{
						$(this).empty().append((p + 1) + ' - ');
					});
				});
			};

			var clone = $(questionBox);
			clone.find('.js-number').parent().append(question).attr('title', excecao);
			clone.data('text-question', question);
			clone.data('type-response', typeResponse);
			clone.data('required', required);

			if(question.length > 5)
			{
				// Texto e número
				if(typeResponse == 1 || typeResponse == 2)
				{
					var input = null;

					if(typeResponse == 1)
						input = '<input class="form-control text-center" type="text" placeholder="RESPOSTA DE TIPO TEXTO" readonly>';
					else
						input = '<input class="form-control text-center" type="number" placeholder="RESPOSTA DE TIPO NÚMERO" readonly>';

					clone.find('.js-number').append(obrigatoria + textSubpergunta + ($('.js-number').length + 1) + ' - ');
					clone.find('.controls').append(input);

					$('.js-questions-added').append(clone);
					clone.hide().slideDown(350);
					verifyQuestions();

					clone.find('a.remove-this').click(function(){
						remove($(this));
					});

					canRestart = true;
				}
				// Multipla escolha e Multipla escolha com imagem.
				else if(typeResponse == 3 || typeResponse == 5)
				{
					var copyCheck = $('.js-present-response').clone();
					var canAdd = copyCheck.find('.js-option').length >= 2;

					if(canAdd)
					{
						copyCheck.find('.fa-minus').parent().remove();
						copyCheck.find('input').attr('disabled', true);
						copyCheck.find('.previewDz').removeClass('previewDz');
						copyCheck.find('.m-t-10').removeClass('m-t-10');

						clone.find('.js-number').append(obrigatoria + textSubpergunta + ($('.js-number').length + 1) + ' - ');
						clone.find('.controls').append(copyCheck.html());

						$('.js-questions-added').append(clone);
						clone.hide().slideDown(350);
						verifyQuestions();

						clone.find('a.remove-this').click(function(){
							remove($(this));
						});

						canRestart = true;
					}
					else
						showMessage('Adicione no mínimo duas opções!', 'info');
				}
				// Opção única e Opção única com imagem.
				else if(typeResponse == 4 || typeResponse == 6)
				{
					var copyRadio	= $('.js-present-response').clone();
					var canAdd		= copyRadio.find('.js-option').length >= 2;
					var exception	= $('#tipo-excecao').val();
					var activate	= $('#opcao-excecao').val();
					var length		= copyRadio.find('.js-option').length >= 2;

					if(exception != '' && activate == '')
						canAdd = false;

					if(canAdd)
					{
						var subPergunta = $('#sub-pergunta').val();
						
						if(excecao == 2 && subPergunta != 1)
						{
							$("#pergunta-mae").append($('<option>', {value: question, text: question}));
							$('.js-subpergunta').removeClass('hide');
						}

						copyRadio.find('.fa-minus').parent().remove();
						copyRadio.find('input').attr('disabled', true);
						copyRadio.find('.previewDz').removeClass('previewDz');
						copyRadio.find('.m-t-10').removeClass('m-t-10');
						copyRadio.find('input').data('text-option');
						copyRadio.find('[data-text-option="'+activate+'"]').attr('checked', 'checked');

						clone.find('.js-number').append(obrigatoria + textExcecao + textSubpergunta + ($('.js-number').length + 1) + ' - ');
						clone.find('.controls').append(copyRadio.html());

						$('.js-questions-added').append(clone);
						clone.hide().slideDown(350);
						verifyQuestions();

						clone.find('h4').click(function(){
							remove($(this));
						});

						canRestart = true;
					}
					else
					{
						if(length > 2)
							showMessage('Você deve escolher a opção que ativará a exceção!', 'info');
						else
							showMessage('Adicione no mínimo duas opções!', 'info');
					}
				}
			}
			else
			{
				var inputError = $('#pergunta');
				setInputError(inputError, 'Adicione uma pergunta válida!');
				inputError.keyup(function(){
					removeInputError(inputError);
				});
			}

			// Zera o input para que seja adicionada uma nova pergunta.
			if(canRestart)
			{
				$('#pergunta').val('');
				$('#tipo-resposta').select2('val', 1).trigger('change');
				$('#obrigatoria').prop('checked', true);
				$('#tipo-excecao').select2('val', 0).trigger('change');
				$('#opcao-excecao').html('<option value="">Escolha a opção</option>').select2('val', 0).trigger('change');
				$('#sub-pergunta').select2('val', 0).trigger('change');
				$('#pergunta-mae').select2('val', 0).trigger('change');
			}
		},

		/**
		 * Inicializa todos os eventos responsáveis pela adição de perguntas,
		 * manipulação das respostas adicionadas e remoção das mesmas e por fazer
		 * a validação ao adicionar uma pergunta a pesquisa.
		 */
		inicialize : function()
		{
			/*
			 * Remove a questão do banco.
			 */
			this.removeQuestion();

			// Apresenta o tipo de resposta selecionado.
			$('#tipo-resposta').change(function()
			{
				var value = $(this).val();
				$('.js-excecao').addClass('hide');

				if(value == 1)
					editResearch.response.text();
				else if(value == 2)
					editResearch.response.number();
				else if(value == 3)
					editResearch.response.multChoice();
				else if(value == 4)
				{
					$('.js-excecao').removeClass('hide');

					$('#tipo-excecao').change(function()
					{
						var exception = $(this).val();

						if(exception != '')
							$('.js-opcao-excecao').removeClass('hide');
						else
							$('.js-opcao-excecao').addClass('hide');
					});

					editResearch.response.optionUnique();
				}
				else if(value == 5)
					editResearch.response.multChoiceWithImage();
				else
				{
					$('.js-excecao').removeClass('hide');

					$('#tipo-excecao').change(function()
					{
						var exception = $(this).val();

						if(exception != '')
							$('.js-opcao-excecao').removeClass('hide');
						else
							$('.js-opcao-excecao').addClass('hide');
					});

					editResearch.response.optionUniqueWithImage();
				}
			});

			/*
			 * Chama o objeto responsável por adicionar a questão ao
			 * formulário.
			 */
			$('#add-question-btn').click(function(){
				editResearch.add();
			});
		}
	};

	return editResearch;

})();