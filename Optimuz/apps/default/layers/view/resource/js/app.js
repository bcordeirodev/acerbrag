$(function(){
	/*
	 * Desabilita o PACE para determinadas URLs.
	 */
	Pace.options.ajax.ignoreURLs = ['notificacao'];

	/**
	 * Template dos campos de filtro, usado para adicionar novos campos
	 * dinamicamente.
	 * @type {jQuery}
	 */
	var templateFilter = $('.js-filter:first').clone();
	templateFilter.find('[name^=valor]').removeAttr('data-value');

	/**
	 * Relação de funções que são executadas no retorno de chamadas Ajax. Cada
	 * função recebe o objeto data devolvido pelo servidor.
	 * @type {Object}
	 */
	window.Callbacks = {
		/**
		 * Função executada antes do envio do formulário via Ajax. Deve ser
		 * sobrescrita para adicionar validações adicionais.
		 * @return {Boolean} Se retornar false o envio do formulário será
		 * cancelado. Retorna true por padrão.
		 */
		preSubmit : function()
		{
			return true;
		},

		/**
		 * Função executada após do envio do formulário via Ajax. Deve ser
		 * sobrescrita para adicionar comportamento adicional.
		 */
		postSubmit : function()
		{
		},

		/**
		 * Função executada para manipular os dados do formulário que serão
		 * enviados via Ajax. Deve ser sobrescrita para adicionar comportamento
		 * adicional.
		 * @param {Array} data O array contém objetos com duas propriedades
		 * apenas: name, value.
		 * @return {Array} O array deve seguir o mesmo formato do array
		 * recebido, contendo objetos com duas propriedades: name, value.
		 */
		serializeData : function(data)
		{
			return data;
		},

		/**
		 * Redireciona a página para a URL definida em data.url, o usuário
		 * também tem a opção de apresentar uma mensagem ao usuário antes do
		 * redirecionamento.
		 *
		 * @param {Object} data Objeto contendo a resposta de uma chamada Ajax
		 * feita por algum formulário. Deve conter a propriedade url.
		 */
		redirect : function(data)
		{
			if(!!data.time)
			{
				if(!!data.message && !!data.type)
					showMessage(data.message, data.type);

				setTimeout(function(){
					window.location.href = data.url;
				}, data.time);
			}
			else
			{
				window.location.href = data.url;
			}
		},

		/**
		 * Exibe uma mensagem de sucesso para o usuário ao final do upload da
		 * imagem.
		 * @param {Object} data Objeto com a resposta Ajax do servidor.
		 */
		userUploadSuccess : function(data)
		{
			var dz = $('.dropzone');
			dz.find('.dz-filename, .dz-size').fadeOut();
			$('<i class="upload-success mdi mdi-check mdi-6x m-t-50 animated bounceIn"></i>').appendTo(dz);
		},

		/**
		 * Exibe uma mensagem de sucesso quando um novo cadastro básico é
		 * adicionado.
		 * @param {Object} data
		 */
		basicDataAdded : function(data)
		{
			var form = $('form');

			form.find('#nome').val('').removeClass('error valid').parent().removeClass('error-control success-control');
			$('.table').DataTable().draw();

			showMessage('Cadastro adicionado com sucesso', 'success');
		},

		/**
		 * Executa ações após uma tabela dinâmica ter sido carregada.
		 * @param {jQuery} table Referência da tabela que acabou de ser
		 * carregada.
		 * @param {Object} data Dados retornados do servidor.
		 */
		tableLoaded : function(table, data)
		{
			if(!data.success)
				showMessage(data.message || 'Ocorreu um erro ao tentar carregar os registros da tabela.', data.type || 'error');
		},

		/**
		 * Exibe uma mensagem.
		 * @param {Object} data Dados retornados do servidor.
		 */
		message : function(data)
		{
			showMessage(data.message, data.type);
		}
	};

	/*
	 * Remoção de registros nas tabelas de listagem.
	 */
	$('body').delegate('.js-remove', 'click', function(e){
		e.preventDefault();

		var link = $(this);
		var row = link.closest('tr[role=row]');

		showConfirm('Confirmar remoção', 'Deseja mesmo remover?', '<i class="fa fa-trash-o m-r-5"></i> Sim, remover', function(modal){
			row.css('opacity', .4).find('a,button').addClass('disabled');
			modal.modal('hide');

			$.get(link.attr('href')).success(function(data){
				if(data.success)
					row.hide();
				else
					row.css('opacity', 1).find('a,button').removeClass('disabled');

				showMessage(data.message, data.type);
			}).error(function(){
				var data = getAjaxError(arguments);
				showMessage(data.message || 'Que coisa! Ocorreu um erro inesperado. Tente novamente.', data.type || 'error');
				row.css('opacity', 1).find('a,button').removeClass('disabled');
			});
		});

		hideMessage();
	});

	/*
	 * Duplicação de registros nas tabelas de listagem.
	 */
	$('body').delegate('.js-duplicate', 'click', function(e){
		e.preventDefault();

		var link = $(this);
		var row = link.closest('tr[role=row]');

		row.find('a,button').addClass('disabled');
		blockUI(link.closest('.btn-group'));
		hideMessage();

		$.get(link.attr('href')).success(function(data){
			row.find('a,button').removeClass('disabled');
			unblockUI(link.closest('.btn-group'));

			if(data.success)
				link.closest('.table').dataTable().api().ajax.reload();

			showMessage(data.message, data.type);
		}).error(function(){
			var data = getAjaxError(arguments);
			showMessage(data.message || 'Que coisa! Ocorreu um erro inesperado. Tente novamente.', data.type || 'error');
			row.find('a,button').removeClass('disabled');
		});
	});

	/*
	 * Contração e expansão das grids.
	 */
	$('.grid .tools .collapse, .grid .tools .expand').on('click', function (){
		var el = $(this).parents('.grid').children('.grid-body');

		if($(this).hasClass('collapse'))
		{
			$(this).removeClass('collapse').addClass('expand');
			el.closest('.grid-body').css('overflow', 'hidden');
			el.slideUp(200);
		}
		else
		{
			$(this).removeClass('expand').addClass('collapse');
			el.slideDown(200, function (){
				el.closest('.grid-body').css('overflow', '');
			});
		}
	});

	$('.user-info .collapse').on('click', function (){
		$(this).parents('.user-info').slideToggle();
	});

	/*
	 * Formatação dos campos de telefone.
	 */
	try
	{
		$('input[type=tel]').mask('00 0000-00009', {placeholder : ''});
		$('input[name="cpf"]').mask('000.000.000-00', {placeholder : ''});
		$('input[name="cep"]').mask('00000-000', {placeholder : ''});
	}
	catch(e)
	{
		missingPlugin('jquery.inputmask');
	}

	/*
	 * Tooltips.
	 */
	try
	{
		$('.tip').tooltip();
	}
	catch(e)
	{
		missingPlugin('bootstrap');
	}

	/*
	 * Popovers.
	 */
	try
	{
		$('[data-toggle=popover]').each(function(){
			$(this).popover({
				html : true,
				trigger : $(this).data('trigger') || 'hover',
				content : function(){
					return $(this).data('content');
				}
			});
		});
	}
	catch(e)
	{
		missingPlugin('bootstrap');
	}

	/*
	 * Scrollers.
	 */
	try
	{
		$('.scroller').each(function(){
			$(this).slimScroll({
				size : '7px',
				color : '#a1b2bd',
				height : $(this).attr('data-height'),
				alwaysVisible : $(this).attr('data-always-visible') == '1',
				railVisible : $(this).attr('data-rail-visible') == '1',
				disableFadeOut : true
			});
		});
	}
	catch(e)
	{
		missingPlugin('slimscroll');
	}

	/*
	 * Validação global de formulário.
	 */
	try
	{
		$('.js-form').each(function(){
			$(this).validate({
				focusInvalid : false,
				ignore : '',
				invalidHandler: function (event, validator){
					var e = $(validator.errorList[0].element);
					var isSelect2 = e.hasClass('js-select');

					showMessage('Corrija os campos destacados em vermelho', 'error');
					scrollToElement(isSelect2 ? e.prev() : e, true);
					setTimeout(function(){
						if(isSelect2)
							e.select2('open');
						else
							e.focus();
					}, 50);
				},
				errorPlacement : function(error, element){
					setInputError($(element), $(error).text());
				},
				success : function(label, element){
					removeInputError(element);
				},
				submitHandler : function(form){
					if(Callbacks.preSubmit())
					{
						form = $(form);
						var mainButton = form.find('.btn.js-submit');

						form.find('.tip [data-original-title]').each(function(){
							$(this).tooltip('destroy');
						});

						mainButton
							.attr('disabled', true)
							.attr('old-html', mainButton.html())
							.html('<i class="fa fa-spin fa-spinner"></i>' + (mainButton.hasClass('js-submit-icon-only') ? '' : ' Aguarde'));

						hideMessage();

						$.post(form.attr('action') + '?' + (new Date).getTime(), Callbacks.serializeData(form.serializeArray()), function(data){
							mainButton
								.attr('disabled', false)
								.html(mainButton.attr('old-html'));

							if(data.success)
							{
								if(!!data.callback)
									Callbacks[data.callback](data);
								else if(!!data.message)
									showMessage(data.message, data.type);
							}
							else
							{
								if(!!data.errorCallback)
									Callbacks[data.errorCallback](data);

								if(!!data.result)
									displayResultErrors(data.result, form);

								if(!!data.message)
									showMessage(data.message, 'error');
							}

							Callbacks.postSubmit();
						}, 'json').error(function(){
							var data = getAjaxError(arguments);

							mainButton
								.attr('disabled', false)
								.html(mainButton.attr('old-html'));

							showMessage(data.message || 'Parece que alguma coisa saiu errada. Tente novamente.', data.type || 'error');
							Callbacks.postSubmit();
						});
					}

					return false;
				}
			});
		});
	}
	catch(e)
	{
		missingPlugin('jquery.validate');
	}

	/*
	 * Reinicia o formulário e retorna para a seleção do tipo de notícia.
	 */
	$('.js-reset').click(function(){
		var form = $(this).closest('form');
		form[0].reset();
		removeInputError(form.find(':input'));
		scrollToTop();
		hideMessage();
	});

	/*
	 * Upload de arquivos.
	 */
	try
	{
		Dropzone.autoDiscover = false;

		$('.dropzone').each(function(){
			var dz = $(this);
			var dzObj;

			dz.dropzone({
				url : resolveUrl($(this).data('url')),
				maxFiles : 1,
				uploadMultiple : false,
				addRemoveLinks : false,
				clickable : true,
				autoProcessQueue : true,
				parallelUploads : 1,
				thumbnailWidth : 200,
				thumbnailHeight : 200,
				init : function(){
					this.on('addedfile', function(file){
						dz.removeClass('dz-clickable alert alert-error').find('.dz-message').hide();
						dz.find('.dz-message').children(0).show().next().remove();
						dz.find('.alert').remove();
						blockUI(dz.parents('.grid'));
					});
					this.on('error', function(file, data, xhr){
						dz.addClass('dz-clickable alert alert-error').find('.dz-message').show();

						dzObj.removeAllFiles();

						if(!!data.message)
						{
							dz.find('.dz-message').children(0)
								.hide()
								.after('<span>' + data.message + '</span>');
						}

						if(!!data.errorCallback)
							Callbacks[data.errorCallback](data);
					});
					this.on('success', function(file, data){
						if(data.success)
							dzObj.disable();

						if(!!data.callback)
							Callbacks[data.callback](data);
					});
					this.on('complete', function(file, data){
						unblockUI(dz.parents('.grid'));
					});
				},

				dictDefaultMessage : '<i class="mdi mdi-upload"></i> ' + dz.data('message') || '<i class="mdi mdi-upload"></i> Jogue seu arquivo aqui ou clique para selecionar',
				dictFallbackMessage : 'Seu navegador não suporta envio de arquivos com drag\'n\'drop.',
				dictFallbackText : 'Use os campos abaixo para enviar seus arquivos',
				dictInvalidFileType : 'O tipo do arquivo não é aceito',
				dictFileTooBig : 'O arquivo é muito grande',
				dictResponseError : 'Ocorreu um erro ao transferir o arquivo',
				dictCancelUpload : 'Cancelar',
				dictCancelUploadConfirmation : 'Quer mesmo cancelar o envio?',
				dictRemoveFile : 'Remover',
				dictMaxFilesExceeded : 'Você excedeu o número máximo de arquivos'
			});

			dzObj = Dropzone.forElement(dz[0]);

			if(dz.attr('disabled') || dz.hasClass('disabled'))
				dzObj.disable();
		});
	}
	catch(e)
	{
		missingPlugin('dropzone');
	}

	/*
	 * Tabelas dinâmicas.
	 */
	try
	{
		if(($('.js-dynamic-table').size() > 0) && ($('.js-dynamic-table td.empty').size() == 0))
		{
			setupDataTables();

			$('.js-dynamic-table').each(function(){
				var table = $(this);
				var filterContainer = $('.filter-export-container');
				var dataURL = resolveUrl(table.data('source'));

				if(filterContainer.data('state-saved'))
				{
					prettySelect(filterContainer.find('select,.js-select'));
					var params = getFiltersQueryString(filterContainer.find('.js-filter'));

					if(/\?/.test(table.data('source')))
						params = '&' + params.slice(1);

					dataURL += params;
					filterContainer.removeData('state-saved');
				}

				table.dataTable({
					processing : false,
					serverSide : true,
					bPaginate : table.data('paginate') != false,
					bLengthChange : table.data('length') != false,
					iDisplayLength : table.data('page-length') || 10,
//					aLengthMenu: [5, 10, 25, 50, 100],
					bFilter : table.data('filter') != false,
					bSort : table.data('sort') != false,
					bInfo : table.data('info') != false,
					bAutoWidth : false,
					bStateSave : true,
					ajax : {
						url : dataURL,
						data : function(data){
							blockUI(table);
							return data;
						}
					},
					drawCallback : function(settings){
						table.find('tbody .tip').tooltip();
						table.find('.check-all').prop('checked', false);
						table.find('thead .dropdown-toggle').addClass('disabled');
						table.filter('.multi-actions').find('tbody tr[role=row]').click(function(evt){
							if(!$(evt.target).is('a,.btn') && ($(evt.target).closest('a,.btn').size() == 0))
							{
								if(this.parentNode.nodeName.toLowerCase() == 'tbody')
									evt.preventDefault();

								checkItem($(this));
							}
						});

						unblockUI(table);
						Callbacks.tableLoaded(table, settings.json);
					},
					oLanguage : defaultDataTableLanguage
				});

				table.find('thead .dropdown-menu a').click(function(evt){
					evt.preventDefault();
					var link = $(this);
					var url = this.href;
					var rows = table.find('tbody .row_selected');
					var doAction = function()
					{
						blockUI(table);
						hideMessage();

						rows.find(':checkbox').each(function(){
							url += '/' + this.value;
						});

						rows.animate({opacity : .4}, 'fast');

						$.get(url, function(data){
							unblockUI(table);

							if(data.success)
							{
								showMessage(data.message, data.type);
								table.api().ajax.reload();
							}
							else
							{
								rows.animate({opacity : 1}, 'fast');
								showMessage(data.message || 'Não foi possível executar a ação desejada. Tente novamente.', data.type || 'error');
							}
						}).error(function(){
							var data = getAjaxError(arguments);
							rows.animate({opacity : 1}, 'fast');
							unblockUI(table);
							showMessage(data.message || 'Parece que alguma coisa saiu errada. Tente novamente.', data.type || 'error');
						});
					};

					if(link.data('confirm'))
					{
						var title = '', text = '', btnContent = '', btnClass = '';

						switch(link.data('behavior'))
						{
							case 'remove':
								title = 'Confirmar remoção';
								text = 'Deseja mesmo remover os registros selecionados?';
								btnContent = '<i class="fa fa-trash-o m-r-5"></i> Sim, remover selecionados';
								btnClass = 'btn-danger';
								break;
							default:
								title = 'Confirmar operação';
								text = 'Deseja mesmo realizar esta operação?';
								btnContent = '<i class="fa fa-check m-r-5"></i> Sim, continuar';
								btnClass = 'btn-success';
								break;
						}

						showConfirm(title, text, btnContent, function(modal){
							modal.modal('hide');
							doAction();
						}, btnClass);
					}
					else
					{
						doAction();
					}
				});

				var inputFilter = table.parent().find('.dataTables_filter input');
				inputFilter.addClass('input-medium').attr('placeholder', 'Filtro rápido');
				inputFilter.parent()[0].removeChild(inputFilter[0].previousSibling);
			});

			$('.check-all').click(function(){
				var checked = $(this).prop('checked');
				$(this).closest('table').find('tbody tr[role=row]').each(function(){
					checkItem($(this), checked);
				});
			});
		}
	}
	catch(e)
	{
		missingPlugin('jquery.dataTables');
	}

	/*
	 * Formatação dos campos select.
	 */
	try
	{
		prettySelect('select,.js-select');
	}
	catch(e)
	{
		missingPlugin('select2');
	}

	/*
	 * Formatação dos campos de data.
	 */
	try
	{
		setInputDate('.js-date');
	}
	catch(e)
	{
		missingPlugin('bootstrap-datepicker ou jquery.inputmask');
	}

	/*
	 * Campo de tempo.
	 */
	try
	{
		setInputTime('.js-timepicker');
	}
	catch(e)
	{
		missingPlugin('bootstrap-slider ou bootstrap-timepicker');
	}

	/*
	 * Mostra/esconde os filtros ao clicar no cabeçalho da grid.
	 */
	$('.grid-title.clickable').on('click', function(evt){
		var target = $(evt.target);

		if(!target.hasClass('btn') && (target.closest('.btn').size() == 0) && !target.hasClass('ios7-switch') && (target.closest('.ios7-switch').size() == 0))
		{
			var parent = $(this).parent();
			var el = parent.children('.grid-body');
			var link = parent.find('.grid-title .tools a:last');

			if(link.hasClass('collapse'))
			{
				link.removeClass('collapse').addClass('expand');
				el.closest('.grid-body').css('overflow', 'hidden');
				el.slideUp(200);
			}
			else
			{
				link.removeClass('expand').addClass('collapse');
				el.slideDown(200, function (){
					el.closest('.grid-body').css('overflow', '');
				});
			}
		}
	}).find('a').unbind('click');

	/*
	 * Adiciona um campo de filtro.
	 */
	$('body').delegate('.js-add-filter', 'click', function(){
		var clone = templateFilter.clone();

		clone.find('.tip').tooltip('destroy');
		clone.find('.tooltip').remove();
		clone.find('input').val('');
		clone.find('select').prev().remove();
		clone.find('select').val('').select2('destroy');

		if(clone.find('.js-remove-filter').size() == 0)
			clone.find('a').before('<a href="javascript:;" class="input-group-addon tip js-remove-filter" data-original-title="Remover este filtro"><i class="fa fa-minus"></i></a>');

		prettySelect(clone.find('select'));
		clone.find('.tip').tooltip();

		clone.hide();
		$(this).closest('.js-filter').after(clone);
		clone.slideDown('fast', function(){
			clone.css('overflow', '');
		});
	});

	/*
	 * Remove um campo de filtro.
	 */
	$('body').delegate('.js-remove-filter', 'click', function(){
		$(this).closest('.js-filter').slideUp('fast', function(){
			$(this).remove();
		});
	});

	/*
	 * Reseta todos os campos de filtro.
	 */
	$('body').delegate('.js-reset-filters', 'click', function(){
		$('.js-filter').not(':first').slideUp('fast', function(){
			$(this).remove();
		});
		$('.js-filter input').val('');
		$('.js-filter select').select2('val', '');
		$('.js-select-filter').closest('.js-filter').find('.col-md-5 div').empty().append('<input type="text" name="valor[]" class="form-control" placeholder="Insira um valor">');

		var table = $('.js-dynamic-table');
		table.dataTable().api().ajax.url(resolveUrl(table.data('source'))).load();
	});

	/*
	 * Aplica os filtros selecionados à tabela de registros.
	 */
	$('body').delegate('.js-filter-table', 'click', doFilterTable);
	$('body').delegate('#js-filters :input', 'keyup', function(evt){
		if(evt.keyCode == 13)
			doFilterTable();
	});

	/*
	 * Carrega um campo de filtro quando o usuário seleciona o campo que deseja
	 * usar.
	 */
	$('body').delegate('.js-select-filter', 'change', function(){
		loadFilter($(this), true);
	});

	/*
	 * Exporta os registros da tabela de acordo com os filtros selecionados.
	 */
	$('body').delegate('.js-export-table', 'click', function(){
		var loader = $('<em class="js-loader m-l-20"><i class="fa fa-spinner fa-spin m-r-5"></i> Aguarde, esta operação pode levar alguns minutos</em>');
		var filters = $('.js-filter');
		var params = getFiltersQueryString(filters);
		var url = resolveUrl($('.js-dynamic-table').data('source'));

		if(url.indexOf('?') > -1)
			url += '&' + params.substring(1);
		else
			url += params;

		url += '&exportar=1&tipo=' + $(this).data('type');

		$(this).closest('.btn-group').after(loader);
		blockUI(loader.closest('.grid'));

		$.get(url, function(data){
			unblockUI(loader.closest('.grid'));
			loader.fadeOut('fast', function(){
				loader.remove();
			});

			if(data.success)
				window.location.href = data.url;
			else
				showMessage(data.message, data.type);
		}).error(function(){
			loader.fadeOut('fast', function(){
				loader.remove();
			});
			showMessage('Ops! Não foi possível exportar os dados. Tente novamente por favor.', 'error');
		});
	});

	/*
	 * Recarrega os filtros usados anteriormente.
	 */
	$('select,.js-select').filter('.js-select-filter').each(function(){
		var input = $(this);
		var valueInput = input.closest('.form-group').nextAll('.col-md-5');
		var oldValue = valueInput.find('input').data('value');
		var filtersContainer = $('.filter-export-container');

		loadFilter(input, false, function(data){
			if(filtersContainer.data('showFiltersTimeout'))
				clearTimeout(filtersContainer.data('showFiltersTimeout'));

			if(valueInput.find('select,.js-select').size() == 1)
				valueInput.find('select,.js-select').select2('val', oldValue);
			else
				valueInput.find('input').val(oldValue);

			filtersContainer.data('showFiltersTimeout', setTimeout(function(){
				if(filtersContainer.data('state-saved'))
					filtersContainer.find('.grid-title').trigger('click');
			}, 500));
		});
	});

	/*
	 * Abas.
	 */
	$('.nav-pills,.nav-tabs').find('a').click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});


	/*
	 *
	 */
	$('.js-download').click(function(){

		$.post(resolveUrl('~/processo/download/' + $(this).data('file')), function(data){

		});
	});

	/*
	 * Gerenciamento do layout responsivo.
	 */
	$(window).setBreakpoints({
		distinct : true,
		breakpoints : [
			320,
			480,
			768,
			1024
		]
	});

	$(window).bind('enterBreakpoint320', function(){
		console.log(1);
		$('#main-menu-toggle-wrapper').show();
		$('#main-menu').removeClass('mini');
		$('.page-content').removeClass('condensed');
		rebuildSider();
		changeSettingsMenu(true);
	});

	$(window).bind('enterBreakpoint480', function(){
		console.log(2);
		$('#main-menu-toggle-wrapper').show();
		$('.header-seperation').show();
		$('#main-menu').removeClass('mini');
		$('.page-content').removeClass('condensed');
		$('.user-info-wrapper').removeClass('hide');
		rebuildSider();
		changeSettingsMenu(true);
	});

	$(window).bind('enterBreakpoint768', function(){
		console.log(3);
//		$('#main-menu-toggle-wrapper').show();
		$('.user-info-wrapper').addClass('hide');
		changeSettingsMenu(true);

		if(isMobile())
		{
			$('#main-menu').removeClass('mini');
			$('.page-content').removeClass('condensed');
			rebuildSider();
		}
	});

	$(window).bind('exitBreakpoint320', function(){
		console.log(4);
		$('#main-menu-toggle-wrapper').hide();
		closeAndRestSider();
		changeSettingsMenu(false);
	});

	$(window).bind('exitBreakpoint480', function(){
		console.log(5);
		$('#main-menu-toggle-wrapper').hide();
		closeAndRestSider();
		changeSettingsMenu(false);
	});

	$(window).bind('exitBreakpoint768', function(){
		console.log(6);
		$('.user-info-wrapper').removeClass('hide');
		$('#main-menu-toggle-wrapper').hide();
		closeAndRestSider();
		changeSettingsMenu(false);
	});

	/*
	 * Configurações gerais do menu principal e da página.
	 */
	$('.page-sidebar li > a').on('click', function(e){
		var link = $(this);
		var parent = link.parent().parent();
		var sub = link.next();

		if(sub.hasClass('sub-menu') == false)
			return;

		parent.children('li.open').children('a').children('.arrow').removeClass('open');
		parent.children('li.open').children('.sub-menu').slideUp(200);
		parent.children('li.open').removeClass('open');

		if(sub.is(':visible'))
		{
			link.find('.arrow').removeClass('open');
			link.parent().removeClass('open');
			sub.slideUp(200, function(){
				handleSidebarAndContentHeight();
			});
		}
		else
		{
			link.find('.arrow').addClass('open');
			link.parent().addClass('open');
			sub.slideDown(200, function(){
				handleSidebarAndContentHeight();
			});
		}

		e.preventDefault();
	});

	$('img').unveil();

	$(window).resize(function(){
		$.sidr('close', 'sidr');
	});

	if($('.page-container').lenght == 0)
		$('#messages-container').css('margin-left', '16.6667%').addClass('col-md-8 col-md-offset-2').removeClass('col-md-5 col-md-offset-3');

	/**
	 * Método usado para validar cpf.
	 *
	 * @param {string} strCPF Cpf que será validado.
	 * @returns {Boolean}
	 */
	function cpfIsValid(strCPF)
	{
		var soma;
		var resto;
		soma = 0;

		if(strCPF == "00000000000")
			return false;

		for(var i = 1; i <= 9; i++)
			soma = soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);

		resto = (soma * 10) % 11;

		if((resto == 10) || (resto == 11))
			resto = 0;

		if(resto != parseInt(strCPF.substring(9, 10)))
			return false;

		soma = 0;

		for(i = 1; i <= 10; i++)
			soma = soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);

		resto = (soma * 10) % 11;

		if((resto == 10) || (resto == 11))
			resto = 0;

		if(resto != parseInt(strCPF.substring(10, 11)))
			return false;

		return true;
	}

	/*
	 * Verifica os campos que possuem cpf e faz a validação automáticamente.
	 */
	$('#cpf').focusout(function(){
		var numsStr = $(this).val().replace(/[^0-9]/g,'');
		var input = $(this);

		if(numsStr.length > 1 && !cpfIsValid(numsStr))
			setInputError(input.parent(), 'Informe um cpf válido.');
	});
});