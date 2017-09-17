$(document).ready(function()
{
	/**
	 * Inicializa máscaras
	 */
	try
	{
		$('.js-date').mask('99/99/9999', {placeholder : ''});

		$('.datepicker').datepicker({
			format:'dd/mm/yyyy',
			language:'pt-BR'
		});
	}
	catch(e)
	{
		missingPlugin('jquery.inputmask');
	}

	//Cria tooltips
	$('[data-toggle="tooltip"]').tooltip();

	/*
	 * Verifica se a variável com os está populada para carregar o mapa
	 * (mapas de visualização e editação de pesquisas).
	 */
	if(optimuz.loadMap)
	{
		google.charts.load("current", {packages:["map", "geochart"]});

		google.charts.setOnLoadCallback(function(){
			/*
			 * Apresenta a área limite da pesquisa.
			 * @param {Object} coordenada Latitude, longitude e limite da pesquisa.
			 */
			function initMap(coordenada)
			{
				var latitude = parseFloat(coordenada.latitude);
				var longitude = parseFloat(coordenada.longitude);
				var raio = coordenada.limite;

				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 18,
					center: {lat: latitude, lng: longitude},
					scrollwheel : false,
					useMapTypeControl : true
				});

				var circle = new google.maps.Circle({
					strokeColor: '#FF0000',
					strokeOpacity: 0,
					strokeWeight: 0,
					fillColor: '#7f7fff',
					fillOpacity: 0.2,
					map: map,
					center: {lng: longitude, lat: latitude},
					radius: (raio * 1000)
				});

				map.fitBounds(circle.getBounds());
			}

			initMap(optimuz.loadMap);
		});
	}

	/*
	 * Zera o campo de cidade quando a UF é alterada.
	 */
	$('#uf').change(function(){
		$('#cidade').select2('val', '');
	});

	/**
	 * Objeto responsável pelo público alvo.
	 * @type Object
	 */
	var TargetAudience =
	{
		/**
		 * Atualiza os inputs.
		 */
		updateGroups : function()
		{
			var boxs = $('.js-publico-alvo');
			var tam	 = boxs.length - 1;

			boxs.each(function(p){

				/*
				 * Atualização dos ids.
				 */
				$(this).find('[name="quantidade-homens"]').attr('id', 'quantidade-homens-' + p);
				$(this).find('[name="quantidade-mulheres"]').attr('id', 'quantidade-mulheres-' + p);
				$(this).find('[name="idade-minima"]').attr('id', 'idade-minimima-'+ p);
				$(this).find('[name="idade-maxima"]').attr('id', 'idade-maxima-'+ p);

				/**
				 * Atualização das divs do select2.
				 */
				$(this).find('[name="idade-maxima"]').prev().attr('id', 's2id_idade-maxima-' + p);
				$(this).find('[name="idade-minima"]').prev().attr('id', 's2id_idade-minima-' + p);

				/*
				 * Atualização dos botões
				 */
				var btn		= $(this).find('.js-btns').empty();
				var minus	= '<button type="button" class="btn btn-white btn-small js-remove-group m-t-5 pull-right"><i class="fa fa-minus"></button>';
				var plus	= '<button type="button" class="btn btn-white btn-small js-add-group pull-right"><i class="fa fa-plus"></button>';

				if(p == 0)
				{
					if(tam > 0)
						btn.append(minus);
				}
				else
				{
					btn.append(minus);
				}

				if(tam == p)
					btn.prepend(plus);
			});
		},

		/**
		 * Função responsável por adicionar um novo público alvo.
		 */
		add : function()
		{
			$('body').delegate('.js-add-group', 'click', function()
			{
				var lastGroup = $('.js-publico-alvo').last();
				var minAgeObj = lastGroup.find('[name="idade-minima"]').first();
				var maxAgeObj = lastGroup.find('[name="idade-maxima"]').first();

				if(parseInt(maxAgeObj.val()) > parseInt(minAgeObj.val()))
				{
					var clone = $('.js-publico-alvo').first().clone().hide();
					var select = clone.find('select').val('').select2('destroy');

					clone.find('input').val(null);

					select.prev().remove();
					select
						.removeClass('error')
						.val('')
						.prop('required', false)
						.tooltip('destroy');

					clone.find('.error-control').removeClass('error-control tip').find('.tooltip').remove();
					prettySelect(select);

					$('.js-publico-alvo').last().after(clone);

					clone.slideDown(300);
					TargetAudience.updateGroups();
				}
				else
				{
					showMessage('A idade máxima precisa ser maior que a idade mínima', 'error');

					setInputError(minAgeObj, '');
					setInputError(maxAgeObj, '');

					minAgeObj.change(function(){
						removeInputError(minAgeObj);
						removeInputError(maxAgeObj);
					});

					maxAgeObj.change(function(){
						removeInputError(minAgeObj);
						removeInputError(maxAgeObj);
					});
				}
			});
		},

		/**
		 * Remove um público alvo.
		 */
		remove : function()
		{
			$('body').delegate('.js-remove-group', 'click', function()
			{
				var box = $(this).closest('.js-publico-alvo');

				box.slideUp(350, function(){
					box.remove();
					TargetAudience.updateGroups();
				});
			});
		},

		/**
		 * Inicializa os eventos do objeto.
		 */
		inicialize : function()
		{
			this.add();
			this.remove();
		}
	};

	/*
	 * Inicializa os eventos.
	 */
	TargetAudience.inicialize();

	/**
	 * Obejto responsável por controlar todos os eventos referente a parte de
	 * categorias.
	 * @type Object
	 */
	var Category =
	{
		/**
		 * Responsável por adicionar uma nova categoria a pesquisa.
		 * @param Boll isNew Verifica se o objeto de categoria está sendo
		 * iniciado para uma nova pesquisa ou para a edição de pesquisa.
		 */
		add : function(isNewResearch)
		{
			$('#adicionar-categoria').click(function()
			{
				var category	= $(this).parent().find('input');
				var position	= $('.js-category').length + 1;
				var isNew		= isNewResearch || false;
				var box			= $(this);
				var canAdd		= true;
				var value		= category.val();
				var repeated	= false;

				if(value.length <= 1)
					canAdd = false;

				$('select#categoria').find('option').each(function() {
					if($(this).text() == value)
					{
						canAdd = false;
						repeated = true;
					}
				});

				if(canAdd)
				{
					blockUI(box);

					/*
					 * Envia a mensage digitada no input para salvar como uma
					 * nova categoria.
					 */
					$.get(resolveUrl('~/pesquisa/adicionar-categoria/' + category.val() + '/' + position), function(data)
					{
						if(data.success)
						{
							unblockUI(box);

							category.data('position', (position + 1));
							category.val(null);

							var categorySelect  = $('#categoria, .js-perguntas select[name*=categoria]');

							categorySelect.each(function(){
								var select = $(this);
								select.prev().remove();
								select.select2('destroy');
								select.append('<option value="' + data.id + '">' + data.name + '</option>');
								prettySelect(categorySelect);
							});

							var boxCategory =   '<div class="grid simple border-solid">'
													+ '<div class="grid-title no-border">'
														+ '<h4></h4>'
													+ '</div>'
													+ '<div class="grid-body no-border js-category" id="' + data.id + '">'
													+ '</div>'
												+ '</div>';

							/*
							 * A aréa de pre-visualização é criada no momento que
							 * categoria é adicionada.
							 */
							var newCategory = $(boxCategory).clone();
							newCategory.attr('data-category', data.id);
							newCategory.find('h4').append(data.name);
							$('.modal-body').append(newCategory);

							/*
							 * Verificação para novas pesquisas.
							 */
							var boxQuestions = $('.js-box-questions').first();

							if(boxQuestions.hasClass('hide'))
							{
								boxQuestions
									.removeClass('hide')
									.hide()
									.slideDown(300);
							}
						}
						else
						{
							unblockUI(box);
							showMessage(data.message, data.type);
						}
					}).error(function()
					{
						unblockUI(box);
						showMessage('Ocorreu um erro ao adicionar a categoria. Por favor tente novamente!', 'error');
					});
				}
				else
				{
					if (repeated)
						showMessage('Esta categoria já foi adicionada!', 'error');
					else
						showMessage('Adicione um valor válido com pelo menos 3 caracteres!', 'error');
				}
			});
		},

		/**
		 * Inicializa todos os eventos relacionados ao objeto.
		 */
		inicialize : function()
		{
			Category.add();
		}
	};

	/*
	 * Inicializa os eventos.
	 */
	Category.inicialize();

	/*
	 * Habilita as funções exlusivas para a criação de uma nova pesquisa.
	 */
	if(optimuz.newResearch || optimuz.editResearch)
	{
		/*
		 * Inicializa os eventos exclusivos para nova pesquisa.
		 */
		if(optimuz.newResearch)
			modules.newResearch.inicialize();
		else
			modules.editResearch.inicialize();

		/**
		 * Válidações feitas antes do envio do formulário.
		 */
		Callbacks.preSubmit = function()
		{
			/*
			 * Definirá se o formulário será enviado ou não.
			 * @return Bool.
			 */
			var success = true;

			/*
			 * Define se a mensagem de perguntas não adicionadas irá aparecer.
			 * @return Bool.
			 */
			var canShowError = true;

			/*
			 *	Verifica se a função scrollToElement ja foi chamada.
			 *	@return Bool.
			 */
			var wasCalled = false;

			/**
			 * Função de validação exclusiva de públicos alvos.
			 */
			function verifyTargetAudience()
			{
				$('.js-publico-alvo').each(function(p)
				{
					var mans	= $(this).find('[name="quantidade-homens"]');
					var womans	= $(this).find('[name="quantidade-mulheres"]');
					var minAgeObj = $(this).find('[name="idade-minima"]').first();
					var maxAgeObj = $(this).find('[name="idade-maxima"]').first();

					var minAge = parseInt($(this).find('[name="idade-minima"]').first().val());
					var maxAge = parseInt($(this).find('[name="idade-maxima"]').first().val());

					if(maxAge > minAge)
					{
						$('.js-publico-alvo').each(function(position)
						{
							var minAgeCompare = parseInt($(this).find('[name="idade-minima"]').first().val());
							var maxAgeCompare = parseInt($(this).find('[name="idade-maxima"]').first().val());

							if(p >= position && p != position)
							{
								var minAgeIsValid = !((minAge >= minAgeCompare) && (minAge <= maxAgeCompare));
								var maxAgeIsValid = !((maxAge >= minAgeCompare) && (maxAge <= maxAgeCompare));

								if(!minAgeIsValid)
								{
									setInputError(minAgeObj, '');
									success = false;

									if(canShowError)
									{
										showMessage('Não é possível adicionar faixas etárias com idades cruzadas nos públicos alvos!', 'error');
										canShowError = false;
									}

									minAgeObj.change(function(){
										removeInputError($(this));
									});
								}

								if(!maxAgeIsValid)
								{
									setInputError(maxAgeObj, '');
									success = false;

									if(canShowError)
									{
										showMessage('Não é possivel adicionar idades cruzadas nos públicos alvos!', 'error');
										canShowError = false;
									}

									maxAgeObj.change(function(){
										removeInputError($(this));
									});
								}
							}
						});
					}
					else
					{
						if(canShowError)
						{
							canShowError = false;
							success = false;

							showMessage('A idade máxima precisa ser maior que a idade mínima', 'error');

							setInputError(minAgeObj, '');
							setInputError(maxAgeObj, '');

							minAgeObj.change(function(){
								removeInputError(minAgeObj);
								removeInputError(minAgeObj);
							});

							maxAgeObj.change(function(){
								removeInputError(minAgeObj);
								removeInputError(minAgeObj);
							});
						}
					}

					/*
					 * Verifica se o input com a quantidade de homens foi preenchido
					 * corretamente.
					 */
					if(mans.val() == null || mans.val() == '')
					{
						success = false;
						canShowError = false;
						setInputError(mans, 'Escolha a quantidade!');

						if(!wasCalled)
						{
							scrollToElement(mans, true);
							wasCalled = true;
						}
					}

					/*
					 * Verifica se o input com a quantidade de mulheres foi preenchido
					 * corretamente.
					 */
					if(womans.val() == null || womans.val() == '')
					{
						success = false;
						canShowError = false;
						setInputError(womans, 'Escolha a quantidade!');

						if(!wasCalled)
						{
							scrollToElement(womans, true);
							wasCalled = true;
						}
					}
				});
			}

			verifyTargetAudience();

			/*
			 * Validação da abrangência.
			 */
			if($('#abrangencia').val() == 'm')
			{
				var city = $('#cidade');

				if(city.val() == '' || city.val() == null)
				{
					setInputError(city, 'Escolha a cidade!');
					canShowError = false;
					success = false;

					if(!wasCalled)
					{
						scrollToElement(city, $('#abrangencia').val());
						wasCalled = true;
					}
				}
			}

			/**
			 * Verifica se alguma pergunta foi adicionada.
			 */
			if(canShowError && optimuz.newResearch)
			{
				var hasQuestion = $('.js-question-added').length >= 1;

				if(!hasQuestion)
				{
					showMessage('A pesquisa deve ter ao menos uma pergunta cadastrada!', 'error');
					success = hasQuestion;
				}
			}

			canShowError = true;
			return success;
		};

		/*
		 * Resgata todos os inputs do formulário e cria um obejto contendo todas
		 * as informações da pesquisa, perguntas e alternativas para salvar ou
		 * atualizar o banco.
		 */
		Callbacks.serializeData = function(data)
		{
			var form = {
				'text-question'				: [],
				'type-response'				: [],
				'category'					: [],
				'required'					: [],
				'exception'					: [],
				'trigger'					: [],
				'subquestion'				: [],
				'question-mother'			: [],
				'options'					: [],

				'categorias'				: [],
				'perguntas'					: [],
				'tipo-resposta'				: [],
				'alternativas'				: [],
				'id-categorias'				: [],
				'id-perguntas'				: [],
				'id-alternativas'			: [],
				'novas-alternativas'		: [],
				'novas-alternativas-img'	: [],

				'options-removed'			: [],
				'questions-removed'			: []
			};

			/*
			 * Atualização do data para o formato que o validator irá receber.
			 */
			for(var i = 0; i < data.length; i++)
				form[data[i].name] = data[i].value;

			/*
			 * Perguntas adicionadas.
			 */
			$('.js-questions-added > .js-question-added').each(function(p)
			{
				var textQuestion	= $(this).data('text-question');
				var typeResponse	= $(this).data('type-response');
				var category		= $(this).data('category');
				var required		= $(this).data('required');
				var exception		= $(this).data('exception');
				var trigger			= $(this).data('trigger');
				var subQuestion		= $(this).data('subquestion');
				var questionMother	= $(this).data('question-mother');
				var oPosition		= p;

				form['category'][oPosition]			= category;
				form['required'][oPosition]			= required;
				form['exception'][oPosition]		= exception;
				form['trigger'][oPosition]			= trigger;
				form['subquestion'][oPosition]		= subQuestion;
				form['question-mother'][oPosition]	= questionMother;
				form['options'][oPosition]			= null;
				form['text-question'][oPosition]	= textQuestion;
				form['type-response'][oPosition]	= typeResponse;

				//Cria um array para respostas de única e multipla escolha sem imagem.
				if(typeResponse == 3 || typeResponse == 4)
				{
					var options = [];

					$(this).find('.js-option').each(function(p){
						options[p] = $(this).data('text-option');
					});

					form['options'][oPosition] = options;
				}

				//Cria um array para respostas de única e multipla escolha com imagem.
				if(typeResponse == 5 || typeResponse == 6)
				{
					var options = [];

					$(this).find('.js-option').each(function(p){
						options[p] = [
							$(this).data('image'),
							$(this).data('text-option')
						];
					});

					form['options'][oPosition] = options;
				}
			});

			//Percorre as alternativas deletadas e cria o array para exclusão.
			var removeds = $('#removeds-options').find('input[name="option-removed[]"]');
			var option = [];

			removeds.each(function(x){
				option[x] = $(this).val();
			});

			form['options-removed']	= option;

			//Percorre as perguntas deletadas e cria o array para exclusão.
			var removedsQuestion = $('#removeds-questions').find('input[name="question-removed[]"]');
			var question = [];

			removedsQuestion.each(function(x){
				question[x] = $(this).val();
			});

			form['questions-removed']	= question;

			/*
			 * Edição de pesquisa.
			 * Percorre todas as informações da pesquisa que está em edição
			 * para serem atualizadas no banco de dados.
			 */
			$('#listagem-pesquisa > .js-perguntas').each(function(p)
			{
				var categoria			= $(this).find('[name="categoria[]"]').val();
				var tipoResposta		= $(this).find('[name="tipo-resposta[]"]').val();
				var pergunta			= $(this).find('input[name="perguntas[]"]').val();
				var idPergunta			= $(this).find('input[name="id-perguntas[]"]').val();
				var alternativa			= null;
				var novaAlternativa		= null;
				var novaAlternativaImg	= null;
				var idAlternativa		= null;
				var oPosition			= p;

				form['categorias'][oPosition]		= categoria;
				form['id-perguntas'][oPosition]		= idPergunta;
				form['perguntas'][oPosition]		= pergunta;
				form['tipo-resposta'][oPosition]	= tipoResposta;

				var allOptions = $(this).find('.alternativas');

				if(tipoResposta == 3 || tipoResposta == 4)
				{
					alternativa = [];
					novaAlternativa = [];
					idAlternativa = [];

					allOptions.each(function(x)
					{
						alternativa[x] = $(this).find('input[name="alternativas[]"]').val();
						idAlternativa[x] = $(this).find('input[name="id-alternativas[]"]').val();
					});

					form['alternativas'][oPosition] = alternativa;
					form['id-alternativas'][oPosition]	= idAlternativa;

					$(this).find('.alternativas').find('input[name="novas-alternativas[]"]').each(function(y)
					{
						novaAlternativa[y] = [
							$(this).data('question'),
							$(this).val()
						];
					});

					form['novas-alternativas'][oPosition] = novaAlternativa;

				}
				else if(tipoResposta == 5 || tipoResposta == 6)
				{
					alternativa = [];
					idAlternativa = [];
					novaAlternativaImg = [];

					allOptions.each(function(p)
					{
						alternativa[p] = $(this).find('input[name="alternativas[]"]').val();
						idAlternativa[p] = $(this).find('input[name="id-alternativas[]"]').val();
					});

					form['alternativas'][oPosition] = alternativa;
					form['id-alternativas'][oPosition]	= idAlternativa;

					$(this).find('.alternativas').find('input[name="novas-alternativas-img[]"]').each(function(y)
					{
						novaAlternativaImg[y] = [
							$(this).data('question'),
							$(this).val(),
							$(this).data('image')
						];
					});

					form['novas-alternativas-img'][oPosition] = novaAlternativaImg;
				}
			});

			return form;
		};
	}

	/*
	 * Vincula o usuário a pesquisa.
	 */
	$('body').delegate('.js-assign-user', 'click', function()
	{
		var tr = $(this).closest('tr');
		var research = $('#pesquisa-id').val();
		var user = $(this).data('user-id');

		blockUI(tr);

		$.get(resolveUrl('~/pesquisa/vincular-usuario/' + research + '/' + user), function(data)
		{
			if(data.success)
			{
				var clone	   = tr;
				var usersAdded = $('#usuarios-adicionados');

				unblockUI(tr);
				usersAdded.find('.js-tr-temp').remove();
				showMessage(data.message, data.type);

				tr.closest('tr').fadeOut(450, function()
				{
					tr.remove();
					usersAdded.append(clone);

					clone.find('.js-assign-user')
						.removeClass('js-assign-user')
						.removeClass('btn-success')
						.addClass('js-unbind-user')
						.addClass('btn-danger')
						.empty()
						.append('<i class="fa fa-minus"></i>');

					clone.hide().fadeIn(450);
				});
			}
			else
			{
				unblockUI(tr);
				showMessage(data.message, data.type);
			}
		}).error(function(){
			unblockUI(tr);
			showMessage('Ocorreu um erro ao atribuir o usuário a pesquisa, por favor tente novamente!', 'error');
		});
	});

	/*
	 * Desvincula o usuário da pesquisa.
	 */
	$('body').delegate('.js-unbind-user', 'click', function()
	{
		var tr = $(this).closest('tr');
		var research = $('#pesquisa-id').val();
		var user = $(this).data('user-id');

		blockUI(tr);

		$.get(resolveUrl('~/pesquisa/desvincular-usuario/' + research + '/' + user), function(data)
		{
			if(data.success)
			{
				var usersAdded = $('#usuarios-adicionados');

				unblockUI(tr);
				usersAdded.find('.js-tr-temp').remove();
				showMessage(data.message, data.type);

				tr.closest('tr').fadeOut(450, function()
				{
					var parent		= tr.parent();
					var verifyTr	= tr.siblings();

					tr.remove();

					if(verifyTr.length == 0)
					{
						parent.append(
							'<tr class="js-tr-temp">'
								+ '<td colspan="3"> Nenhum pesquisador adicionado a pesquisa</td>'
							+ '</tr>'
						);
					}
				});
			}
			else
			{
				unblockUI(tr);
				showMessage(data.message, data.type);
			}
		}).error(function(){
			unblockUI(tr);
			showMessage('Ocorreu um erro ao atribuir o usuário a pesquisa, por favor tente novamente!', 'error');
		});
	});

	/**
	 * Função executada quando a pesquisa está inativa.
	 */
	function reseachDisable()
	{
		/**
		 * O valor da data é salvo caso o usuário decida não ativar a pesquisa.
		 * novamente.
		 */
		var oDate = $('#data-fim').val();

		/*
		 * O datepicker é removido por padrão caso a pesquisa esteja inativa.
		 */
		$('.datepicker').datepicker('remove');

		/*
		 * O submit é desabilitado por padrão
		 */
		$('.js-submit').prop('disabled', true);

		/*
		 * Habilita o campo de data para que o usário possa informar uma nova
		 * data final.
		 */
		$('#status').change(function(){

			var dateEnd = $('#data-fim');

			if($(this).val() == 1)
			{
				var dateEndObj = dateEnd.datepicker({
					format:'dd/mm/yyyy',
					language:'pt-BR',
					startDate: new Date(new Date().getTime()+(1 *24*60*60*1000))
				})
				.on('show', function(){
					dateEnd.prop('readonly', false);
				})
				.on('hide', function(){
					dateEnd.prop('readonly', true);
				})
				.on('changeDate', function(){
					dateEndObj.hide();
				})
				.data('datepicker');

				$('.js-submit').prop('disabled', false);
				dateEnd.trigger('focus');
				scrollToElement(dateEnd, false);
			}
			else
			{
				$('.js-submit').prop('disabled', true);
				dateEnd.datepicker('remove');
				dateEnd.val(oDate);
			}
		});
	}

	/*
	 * Caso a pesquisa esteja desabilitada, todos os campos ficam inalteráveis.
	 */
	if(optimuz.researchDisabled)
		reseachDisable();

	/*
	 * Alterar o placeholder padrão do filtro rápido da listagem de coletas.
	 */
	if(optimuz.alterLabel)
		$('.input-medium').first().attr('placeholder', 'Nome ou E-mail');

	/*
	 * Se a pergunta for definida como subpergunta, exibe o select para escolha
	 * da pergunta mãe.
	 */
	$('#sub-pergunta').change(function()
	{
		$('.js-pergunta-mae').addClass('hide');

		if($(this).val() == 1)
			$('.js-pergunta-mae').removeClass('hide');
	});

	/*
	 * Remove a funcionalidade de submit ao apertar enter.
	 */
	$('form').on('keyup keypress', function(e)
	{
		var keyCode = e.keyCode || e.which;

		if (keyCode === 13)
		{
		  e.preventDefault();
		  return false;
		}
	});

	/*
	 * Publica a pesquisa.
	 */
	$('body').delegate('.publicar', 'click', function()
	{
		var research	= $(this).data('pesquisa');
		var button		= $(this);
		var row			= button.closest('.btn-group');

		var title	= 'Confirmação de publicação';
		var btn		= 'Publicar';
		var mensage = 'Ao publicar esta pesquisa não será permitido remover as perguntas ou suas respectivas alternativadas. <p>'
					+ 'Deseja publicar?</p>';

		var callback = function()
		{
			blockUI(row);

			$.get(resolveUrl('~/pesquisa/publicar-pesquisa/' + research), function(data)
			{
				unblockUI(row);

				if(data.success)
				{
					button.remove();
					row.find('a').find('i').addClass('text-success');
					showMessage(data.message, data.type);
				}
				else
				{
					showMessage(data.message, data.type);
				}

			}).error(function(){
				unblockUI(row);
				showMessage('Ocorreu um erro ao publicar a pesquisa, por favor tente novamente!', 'error');
			});
		};

		showConfirm(title, mensage, btn, callback, 'btn-success');
	});

	/*
	 * Duplica a pesquisa.
	 */
	$('body').delegate('.duplicar', 'click', function()
	{
		var researchId = $(this).data('pesquisa-id');
		var research = $(this).data('pesquisa');
		var button = $(this);
		var row = button.closest('.content');

		showMessage('Duplicando a pesquisa ' + research.bold() + ', isto pode levar alguns minutos, Aguarde!', 'info');
		blockUI(row);

		$.get(resolveUrl('~/pesquisa/duplicar-pesquisa/' + researchId), function(data)
		{
			if(data.success)
			{
				unblockUI(row);
				showMessage(data.message, data.type);
				$('.js-dynamic-table').dataTable().api().ajax.reload();
			}
			else
			{
				unblockUI(row);
				showMessage(data.message, data.type);
			}
			}).error(function(){
			unblockUI(row);
			showMessage('Ocorreu um erro ao duplicar a pesquisa, por favor tente novamente!', 'error');
		});
	});

	/*
	 * Botão que remove as pesquisas.
	 */
	$('body').delegate('.excluir', 'click', function()
	{
		var researchId = $(this).data('pesquisa-id');
		var research = $(this).data('pesquisa');
		var button = $(this);
		var row = button.closest('.content');

		$title = 'Confirmação de exclusão';
		$button = 'Sim';
		$mensage = '<b class="text-error">Aviso:</b> Todas as informações referentes a esta pesquisa serão excluidas (Categorias, Perguntas, Alternativas, Coletas e etc).'
				 + '<p class="bold text-error m-t-15">Esta ação não poderá ser desfeita. Deseja realmente deletar esta pesquisa? </p>';

		$callback = function()
		{
			showMessage('Excluindo a pesquisa ' + research.bold() + ', isto pode levar alguns minutos, Aguarde!', 'info');
			blockUI(row);

			$.get(resolveUrl('~/pesquisa/excluir-pesquisa/' + researchId), function(data)
			{
				if(data.success)
				{
					unblockUI(row);
					showMessage(data.message, data.type);
					$('.js-dynamic-table').dataTable().api().ajax.reload();
				}
				else
				{
					unblockUI(row);
					showMessage(data.message, data.type);
				}
			}).error(function(){
				unblockUI(row);
				showMessage('Ocorreu um erro ao excluir a pesquisa, por favor tente novamente!', 'error');
			});
		};

		showConfirm($title, $mensage, $button, $callback);
	});













/*###############################
 * Funções exclusivas da edição
 *///////////////////////////////

	/*
	 * Seleciona o tipo de resposta de cada pergunta na edição.
	 */
	$('.js-perguntas [data-selected]').each(function()
	{
		var select = $(this).data('selected');
		$(this).select2('val', select).trigger('change');
		$(this).select2('disable');
	});

	/*
	 * Seleciona a categoria de cada pergunta na edição.
	 */
	$('.js-perguntas [data-categoria]').each(function()
	{
		var categoria = $(this).data('categoria');
		$(this).select2('val', categoria).trigger('change');
	});

	/*
	 * Coloca o número das perguntas
	 */
	function updateQuestionNumber()
	{
		$('.js-question-number').each(function(p){
			$(this).find('.badge').empty().append(p+1 + 'ª');
		});
    }
	updateQuestionNumber();

	/*
	 * Botão que adiciona alternativas nas perguntas de tipo (3,4,5,6)
	 * escolha única e múltipla escolha com e sem imagem.
	 */
	$('.add-option').on('click', function()
	{
		var container	= $(this).parent().closest('div[id]');
		var idQuestion	= container.attr('id');
		var empty		= container.find('input:last').val();
		var type		= container.data('type');
		var date		= new Date();
		var tempId		= date.getMilliseconds();
		var noImages	= $('.js-add-image').length;
		var quantity	= container.find('input').length;
		var pass		= true;

		if(empty == '' || empty == null || empty == 'undefined' || empty.length < 3)
			pass = false;

		if(quantity == 0)
			pass = true;

		//adiciona uma nova alternativa
		if(pass)
		{
			if(type == 5 || type == 6)
			{
				var input =
					"<div class='col-md-12 alternativas m-b-5'>"
						+ "<div class='row'>"
							+ "<div class='col-md-1 p-l-0 text-left'>"
								+ "<a class='btn js-add-image'>"
									+ "<i class='fa fa-camera' aria-hidden='true'></i>"
								+ "</a>"
							+ "</div>"
							+ "<div class='col-md-11 p-r-0'>"
								+ "<input type='text' class='form-control' id='" + tempId + "' name='novas-alternativas-img[]' data-question='" + idQuestion + "' placeholder='Nova alternativa'/>"
								+ '<a title="Remover Alternativa" class="pull-right m-r-5 remove-this" data-type="alternativa" href="javascript:;">'
									+ '<i class="fa fa-times text-danger"></i>'
								+ '</a>'
							+ "</div>"
						+ "</div>"
					+ "</div>";

				if(noImages > 0)
				{
					showMessage('Nenhuma imagem foi anexada!', 'error');
					$('.js-add-image').parent('input').focus();
				}
				else
				{
					container.append(input);
					container.find('input').last().focus();
				}
			}
			else
			{
				var countRow = container.find('.row').last().children().length;

				if(countRow > 1)
					container.append('<div class="row m-b-5"></div>');

				var input =
					"<div class='alternativas col-md-6'>"
						+ "<input type='text' class='form-control' id='" + tempId + "' name='novas-alternativas[]' data-question='" + idQuestion + "' placeholder='Nova alternativa'/>"
						+ '<a title="Remover Alternativa" class="remove-this" data-type="alternativa" href="javascript:;">'
							+ '<i class="fa fa-times text-danger"></i>'
						+ '</a>'
					+ "</div>";

				container.find('.row').last().append(input);
				container.find('.row').last().find('input').last().focus();
			}
		}
		else
			showMessage('O campo não possui caracteres suficientes!', 'error');

		container.find('input').last().focus();
	});

	/*
	 * Botão que remove alternativas nas perguntas de tipo (3,4,5,6)
	 * única e múltipla escolha com e sem imagem.
	 */
	$(document).on('click', '.remove-this', function()
	{
		var dataType = $(this).data('type');
		var btn = $(this);

		if(dataType == 'alternativa')
		{
			//Define algumas variáveis necessárias.
			var container = $(this).closest('.alternativas');
			var value = container.find('input[type=hidden]').val();

			//Cria input oculto da alternativa excluida que já está no banco.
			if(value)
				$("#removeds-options").append('<input type="text" name="option-removed[]" value="' + value + '"/>');

			//Remove a alternativa da lista.
			container.remove();
		}
		else
		{
			$title = 'Confirmação de exclusão';
			$button = 'Sim, <b>excluir</b>';
			$mensage = '<h4> Deseja realmente deletar esta pergunta? </h4>'
					 + '<h5>Todas as alternativas desta pergunta, também serão excluídas.</h5>'
					 + '<p class="bold text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Esta ação não poderá ser desfeita .</p>';

			$callback = function()
			{
				//Define algumas variaveis necessárias.
				var container = btn.closest('.box-perguntas');
				var value = container.find('input[type=hidden]').val();

				//Cria input oculto da pergunta excluida que já está no banco.
				if(value)
					$("#removeds-questions").append('<input type="text" name="question-removed[]" value="' + value + '"/>');

				//Remove a pergunta da lista e atualiza os numeros.
				container.remove();
				updateQuestionNumber();
			};

			showConfirm($title, $mensage, $button, $callback);
		}
	});

	/*
	 * Configura o dropzone para anexar a imagem de uma alternativa adicionada
	 * na edição da pesquisa.
	 */
	try
	{
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("form#upload-image",
		{
			url					: resolveUrl('~/pesquisa/upload-imagem'),
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
					unblockUI('#myModal form, #myModal button');
				});

				this.on("success", function(file, data){
					var image = $('#myModal').find('.dz-filename').find('span').html();
					$('a.js-add-image').closest('.row').find('input').attr('data-image', image);
					$("a.js-add-image").replaceWith( "<img src='" + data.pathImage + "' alt='' width='36' height='36'/>" );
					unblockUI('#myModal form, #myModal button');
					$('#myModal').modal('hide');
				});

				this.on("error", function(file){
					if(!file.accepted)
					{
						unblockUI('#myModal form, #myModal button');
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
		missingPlugin('dropzone');
	}

	/*
	 * Botão que abre o modal com a dropzone para anexar uma imagem à alternativa.
	 */
	$(document).on('click', '.js-add-image', function(){
		$("#myModal").modal('show');
    });

	/*
	 * Botão dentro do modal que faz o envio da imagem e fecha o modal após
	 * concluido com sucesso.
	 */
	$(document).on('click', '.js-image-done', function(){
		var canAdd = true;
		var image = $("#myModal").find('.dz-filename').find('span').html();

		if(image == "" || image == 'undefined' || image == null)
			canAdd = false;

		if(canAdd)
		{
			blockUI('#myModal form, #myModal button');
			myDropzone.processQueue();
		}
    });


	/*
	 * Torna a pergunta obrigatória ou opcional.
	 */
	$('body').delegate('.change-required', 'click', function()
	{
		var required = $(this).data('required');
		var question = $(this).data('question');
		var element = $(this);

		blockUI(element);

		$.get(resolveUrl('~/pesquisa/pergunta-obrigatoria/' +  question + '/' + required), function(data)
		{
			if(data.success)
			{
				//Destroy o tooltip
				$('[data-toggle="tooltip"]').tooltip();
				$('[data-toggle="tooltip"]').tooltip('destroy');

				//Atualiza a classe do botao e alguns outros atributos
				element.removeClass(data.classRemove).addClass(data.classAdd);
				element.data('required', data.required);
				element.attr('title', data.title);

				//Recria o tooltip
				$('[data-toggle="tooltip"]').tooltip();

				//Desbloqueia o botão
				unblockUI(element);

				showMessage(data.message, data.type);
			}

		}).error(function(){
			unblockUI(element);
			showMessage('Ocorreu um erro na mudança de obrigatoriedade da pergunta, por favor tente novamente!', 'error');
		});
	});

});