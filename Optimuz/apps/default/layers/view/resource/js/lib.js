/**
 * Identificador do timer usado para esconder a mensagem de erro exibida por
 * showMessage().
 * @type {Number}
 */
var hideMessageTimeoutID = null;

/**
 * Tradução do plugin DataTable.
 * @type {Object}
 */
var defaultDataTableLanguage = {
	oAria : {
		sSortAscending : ': ative para order em ordem crescente',
		sSortDescending : ': ative para order em ordem decrescente'
	},
	oPaginate : {
		sFirst : 'Primero',
		sLast : 'Último',
		sNext : 'Siguiente',
		sPrevious : 'Anterior'
	},
	sEmptyTable : 'No hay registros en la tabla',
	sInfo : 'Visualización de _START_ a _END_ de _TOTAL_ registros',
	sInfoEmpty : 'No se muestra ningún registro',
	sInfoFiltered : '(Filtrado de un total de _MAX_ registros)',
	sInfoPostFix : '',
	sInfoThousands : ',',
	sLengthMenu : '_MENU_ ',
	sLoadingRecords : 'Cargando...',
	sSearch : 'Búsqueda: ',
	sUrl : '',
	sZeroRecords : 'Registro Ninguno encontrado'
};

/**
 * Grava uma mensagem no log informando a falta de um plugin necessário.
 * @param {String} plugin Nome do plugin.
 */
function missingPlugin(plugin)
{
	console.log('Plugin ' + plugin + ' não carregado');
}

/**
 * Exibe uma mensagem de erro no cabeçalho da página.
 * @param {String} msg Mensagem de erro. Pode conter HTML.
 * @param {String} type Tipo da mensagem: error, success ou info. Se não for
 * passado, o tipo padrão será assumido (info).
 */
function showMessage(msg, type)
{
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

	$('#messages-container').hide().stop(true, true).html(
		'<div class="alert ' + divClss + type + ' clearfix m-b-0">' +
			'<div class="pull-left">' +
				'<i class="fa fa-' + icon + ' m-r-10"></i>' +
				msg +
			'</div>' +
			'<button class="pull-right m-l-10 btn btn-mini btn-' + btnClss + '" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button>' +
		'</div>'
	).show().children().addClass('animated ' + animationClss)
		.one('mouseenter', function(){
			clearTimeout(hideMessageTimeoutID);
		})
		.one('click', function(){
			hideMessage();
		});

	clearTimeout(hideMessageTimeoutID);
	hideMessageTimeoutID = setTimeout(hideMessage, 10000);
}

/**
 * Exibe uma mensagem dentro do seletor informado.
 * @param {jQuery} selector Local onde a mensagem será inserida.
 * @param {String} msg Mensagem de erro. Pode conter HTML.
 * @param {String} type Tipo da mensagem: error, success ou info. Se não for
 * passado, o tipo padrão será assumido (info).
 */
function showBoxMessage(selector, msg, type)
{
	if(!type)
		type = 'info';

	var name = '';

	switch(type)
	{
		case 'error':
			name = 'Error!';
			break;
		case 'success':
			name = 'Sucesso!';
			break;
		case 'info':
			name = 'Informação!';
			break;
		default:
			break;
	}

	var message = $(
			'<div class="clickable alert alert-' + type + ' Custom_Message_Box">'
				+ '<strong class="m-r-5">' + name + '</strong>' + msg
			+ '</div>'
		).hide();

	/**
	 * Esconde e remove a mensagem informada.
	 */
	var hideMessage = function(){
		message.hide(100, function(){
			$(this).remove();
		});
	};

	selector.find('.Custom_Message_Box').stop(true, true).remove();
	selector.prepend(message);
	message.show();

	message.click(function(){
		hideMessage();
	});

	setTimeout(function(){
		hideMessage();
	}, 10000);
}

/**
 * Esconde a mensagem da página.
 */
function hideMessage()
{
	if(hideMessageTimeoutID > 0)
	{
		clearTimeout(hideMessageTimeoutID);
		hideMessageTimeoutID = 0;
		$('#messages-container').fadeOut('fast', function(){
			$(this).empty();
		});
	}
}

/**
 * Traduz uma URL relativa para uma URL real.
 * @param {String} url A URL relativa deve iniciar com "~/". Exemplo: ~/caminho.
 * Neste caso a URL será traduzida para /base/caminho. Se a URL não iniciar com
 * "~/" nada será feito e a URL original será retornada.
 * @returns {String} URL traduzida.
 */
function resolveUrl(url)
{
	return url.replace(/^~\/?/, optimuz.baseUrl);
}

/**
 * Bloqueia a UI para que o usuário não interaja enquanto uma ação é
 * realizada pelo sistema.
 * @param {Object} e Elemento que será bloqueado.
 */
function blockUI(e)
{
	$(e).block({
		message : '<div class="loading-animator"></div>',
		css : {
			border : 'none',
			padding : '2px',
			backgroundColor : 'none'
		},
		overlayCSS : {
			backgroundColor : '#fff',
			opacity : 0.3,
			cursor : 'wait'
		}
	});
}

/**
 * Desbloqueia a UI de um elemento previamente bloqueado.
 * @param {Object} e Elemento que será desbloqueado.
 */
function unblockUI(e)
{
	$(e).unblock();
}

/**
 * Exibe uma caixa de confirmação modal. A caixa é feita utilizando o Bootstrap.
 * @param {String} title Título da caixa.
 * @param {String} message Mensagem de ação.
 * @param {String} positiveLabel Texto do botão de confirmação.
 * @param {Function} positiveCallback Função que será chamada quando o usuário
 * pressionar o botão de confirmação.
 * @param {String} positiveBtnClass (opcional) Classe CSS do botão de
 * confirmação. O padrão é btn-danger.
 */
function showConfirm(title, message, positiveLabel, positiveCallback, positiveBtnClass)
{
	var modal;
	positiveBtnClass = positiveBtnClass || 'btn-danger';

//	if($('#confirm-dialog').size() == 0)
//	{
		modal = $(
			'<div class="modal fade">\
				<div class="modal-dialog">\
					<div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>\
							<h4 class="modal-title">' + title + '</h4>\
						</div>\
						<div class="modal-body">\
							' + message + '\
						</div>\
						<div class="modal-footer">\
							<button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>\
							<button type="button" class="btn ' + positiveBtnClass + '">' + positiveLabel + '</button>\
						</div>\
					</div>\
				</div>\
			</div>'
		).appendTo('body');

		modal.modal();
//	}
//	else
//	{
//		modal = $('#confirm-dialog');
//		modal.find('.modal-title').html(title);
//		modal.find('.modal-body').html(message);
//		modal.find('.' + positiveBtnClass).unbind('click').html(positiveLabel);
//		modal.modal('show');
//	}

	modal.find('.' + positiveBtnClass).click(function(){
		positiveCallback.call(this, modal);
		modal.modal('hide');
	});

	setTimeout(function(){
		modal.find('.' + positiveBtnClass).focus();
	}, 300);
}

/**
 * Exibe uma janela modal. A janela é feita utilizando o Bootstrap.
 * @param {String} title Título da janela.
 * @param {String} content Conteúdo da janela.
 * @param {String} footer (opcional) Conteúdo do rodapé da janela, geralmente
 * usado para colocar botões. Se não for informado, a janela não terá rodapé.
 * @return {jQuery} Retorna o objeto jQuery da janela.
 */
function showModal(title, content, footer)
{
	footer = !!footer ? '<div class="modal-footer">' + footer + '</div>' : '';

	var modal = $(
		'<div class="modal fade">\
			<div class="modal-dialog">\
				<div class="modal-content">\
					<div class="modal-header">\
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>\
						<h4 class="modal-title">' + title + '</h4>\
					</div>\
					<div class="modal-body">\
						' + content + '\
					</div>\
					' + footer + '\
				</div>\
			</div>\
		</div>'
	).appendTo('body');
	modal.css('overflow', 'auto').modal();

	return modal;
}

/**
 * Transforma o select passado pelo parâmetro 'e' em um select melhorado usando
 * o plugin Select2 do jQuery.
 * @param {jQuery} e Expressão jQuery.
 */
function prettySelect(e)
{
	$(e).each(function(){
		var input = $(this);
		var opts = {
			language: 'pt-BR',
			minimumResultsForSearch : -1,
			placeholder : 'Selecione um valor',
			triggerChange : true,
			dropdownAutoWidth : false,
			width : 'off',
			formatSearching : function(){
				return '<span class="display-inline-block p-t-10 m-t-5"><i class="fa fa-spinner fa-spin m-r-10"></i> Buscando</span>';
			},
			nextSearchTerm : function(selectedObject, currentSearchTerm){
				return currentSearchTerm;
			},
			escapeMarkup : function(m){
				return m;
			}
		};

		if(!!input.data('source'))
		{
			opts.minimumResultsForSearch = 5;
			opts.maximumSelectionSize = 2;
			opts.ajax = {
				url : optimuz.baseUrl + input.data('source'),
				dataType : 'json',
				quietMillis : 250,
				data : function (term, page){
					var e = $(this);
					return {
						q : term,
						second : !!e.data('second') ? $(e.data('second')).val() : ''
					};
				},
				results : function (data, page){
					return {
						results : data.items
					};
				},
				cache : true
			};
		}

		if(input.hasClass('js-select'))
		{
			opts.initSelection = function(element, callback){
				if(!!element.val())
				{
					var data = JSON.parse(element.val());
					callback(data);
					element.val(data.id);
				}
			};
		}

		if(input.data('search') || input.hasClass('js-select'))
		{
			opts.minimumResultsForSearch = null;
			opts.formatInputTooShort = '';
			opts.createSearchChoicePosition = 'bottom';

			if(input.hasClass('js-select'))
			{
//				opts.minimumInputLength = 1;
				opts.createSearchChoice = function(term){
					return {
						id : 0,
						text : input.data('clear-placeholder') || opts.placeholder
					};
				};
			}
		}

		if(input.data('select2-data'))
			opts.data = input.data('select2-data');

		try
		{
			input.select2(opts);
		}
		catch(ex)
		{
			console.log('prettySelect: ' + ex);
		}
	});
}

/**
 * Marca as permissões de acordo com o perfil selecionado.
 * @param {Number} profileId ID do perfil.
 */
function setPermissions(profileId)
{
	if(!!optimuz.profiles)
	{
		var profiles = optimuz.profiles[profileId];

		if(!!profiles)
		{
			var checklist = $('.checklist');
			var checkbox;
			checklist.find(':checkbox').prop('checked', false);

			for(var id in profiles)
			{
				if(profiles.hasOwnProperty(id))
					checkbox = checklist.find('#permissoes-' + profiles[id].id).prop('checked', true);
			}
		}
	}
}

/**
 * Exibe um erro no campo de formulário especificado.
 * @param {jQuery} input Campo do formulário.
 * @param {String} error Mensagem de erro.
 */
function setInputError(input, error)
{
	var target = input;
	var isSelect2 = input.hasClass('js-select');

	if(!input.hasClass('select2-focusser'))
	{
		if(isSelect2)
			target = input.prev();

		input.parent().addClass('error-control tip');

		target.attr('title', error)
			.tooltip({
				placement : 'bottom',
				trigger : 'hover focus'
			});

		if(isSelect2)
		{
			input.change(function(){
				if(!!this.value)
				{
					removeInputError(input);
					input.unbind('change', arguments.callee);
				}
			});
		}

		/*
		 * Remove os erros automaticamente.
		 */
		input.bind('keyup', function(){
			removeInputError(input);
		});
	}
}

/**
 * Remove a mensagem e a formatação de erro de um campo do formulário.
 * @param {jQuery} input Campo do formulário ou expressão CSS correspondente.
 */
function removeInputError(input)
{
	input = $(input);

	input.removeClass('error').parent().removeClass('error-control tip');
	input.tooltip('destroy');

	if(input.hasClass('js-select'))
		input.prev().tooltip('destroy');
}

/**
 * Rola a tela para o topo.
 */
function scrollToTop()
{
	$('html,body').animate({scrollTop : 0}, 700);
}

/**
 * Rola a tela para o topo.
 * @param {Mixed} e Elemento usado como referência para a rolagem da tela.
 * @param {Boolean} centerOnMiddle Se for true, o elemento será centralizado no
 * centro da tela. Se for false, o elemento será posicionado no topo da tela.
 */
function scrollToElement(e, centerOnMiddle)
{
	e = $(e);
	var offset = centerOnMiddle ? (e.height() / 2) : 0;
	$('html,body').animate({scrollTop : e.offset().top - offset - 150}, 700);
}

/**
 * Formata um número no padrão 0.000,00.
 * @param {Number} n Número inteiro ou decimal.
 * @param {Number} digits Quantidade de dígitos após a vírgula. O padrão são 2
 * dígitos.
 * @returns {String} Número formatado.
 */
function formatNumber(n, digits)
{
	return n.toFixed(digits || 2)
		.replace('.', ',')
		.replace(/(\d)(\d{3})(\D)/g, '$1.$2$3')
		.replace(/(\d)(\d{3})(\D)/g, '$1.$2$3');
}

/**
 * Checa se o UA atual é um dispositivo mobile.
 * @returns {Boolean}
 */
function isMobile()
{
	return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

/**
 * Restaura a barra de navegação lateral.
 */
function closeAndRestSider()
{
	if($('#main-menu').attr('data-inner-menu') == '1')
	{
		$('#main-menu').addClass('mini');
		$.sidr('close', 'main-menu');
		$.sidr('close', 'sidr');
		$('#main-menu').removeClass('sidr');
		$('#main-menu').removeClass('left');
	}
	else
	{
		$.sidr('close', 'main-menu');
		$.sidr('close', 'sidr');
		$('#main-menu').removeClass('sidr');
		$('#main-menu').removeClass('left');
	}
}

/**
 * Configura a barra de navegação lateral.
 */
function rebuildSider()
{
	$('#main-menu-toggle').sidr({
		name : 'main-menu',
		side : 'left'
	});
}

/**
 * Configura o menu de configurações de acordo com o layout (mobile ou desktop).
 * @param {Boolean} isMobileLayout Define se o menu deve ser configurado para
 * mobile.
 */
function changeSettingsMenu(isMobileLayout)
{
	var settingsMenu = $('#settings-menu').addClass('mobile-layout');

	if(isMobileLayout)
	{
		$('#main-menu, #main-menu-toggle-wrapper').addClass('mobile-layout');

		if(!settingsMenu.parent().hasClass('header-seperation'))
		{
			settingsMenu
				.addClass('pull-right notifcation-center')
				.removeClass('quick-section');
//				.find('.top-settings-white')
//					.removeClass('top-settings-white')
//					.addClass('top-settings m-t-5');

			settingsMenu.appendTo($('.header-seperation')).prev().hide();
		}
	}
	else
	{
		$('#main-menu, #main-menu-toggle-wrapper').removeClass('mobile-layout');

		if(settingsMenu.parent().hasClass('header-seperation'))
		{
			settingsMenu
				.addClass('quick-section')
				.removeClass('pull-right notifcation-center')
				.find('.top-settings')
					.removeClass('top-settings m-t-5')
					.addClass('top-settings');

			settingsMenu.appendTo(settingsMenu.parent().next().children().last());
		}
	}
}

/**
 * Atualiza a altura do conteúdo principal da página.
 */
function handleSidebarAndContentHeight()
{
	var content = $('.page-content');
	var sidebar = $('.page-sidebar');

	if(!content.attr('data-height'))
		content.attr('data-height', content.height());

	if(sidebar.height() > content.height())
		content.css('min-height', sidebar.height() + 120);
	else
		content.css('min-height', content.attr('data-height'));
}

/**
 * Exibe os erros nos seus devidos campos, configurando as tooltips e
 * adicionando as classes de erro.
 * @param {Object} errorsList Lista de erros no formato name = value.
 * @param {jQuery} container Objeto jQuery contendo o elemento (formulário) com
 * os campos.
 */
function displayResultErrors(errorsList, container)
{
	var input = null;
	var hasFocus = false;

	for(var name in errorsList)
	{
		if(errorsList.hasOwnProperty(name))
		{
			input = container.find('[name=' + name + ']');

			if(input.size() == 0)
				input = container.find('#' + name);

			if(input.size() > 0)
			{
				if(input.data('checkbox'))
					input = input.parent();

				input
					.parent()
						.removeClass('success-control')
						.addClass('error-control tip');

				setInputError(input, errorsList[name]);

				if(!hasFocus)
				{
					hasFocus = true;
					var isSelect2 = input.hasClass('js-select');
					scrollToElement(isSelect2 ? input.prev() : input, true);
					setTimeout(function(){
						if(isSelect2)
							input.select2('open');
						else
							input.focus();
					}, 50);
				}
			}
		}
	}
}

/**
 * Coloca os elementos passados em evidência.
 * @param {jQuery|Array} elements Se mais de um elemento precisar entrar em
 * evidência, deve ser passado um array com os elementos jQuery na ordem em que
 * devem aparecer. Se for apenas um elemento, basta passá-lo encapsulado com o
 * jQuery.
 * @param {Object|Array} opts (opcional) Configurações para o Popover. Se for
 * passada uma lista no parâmetro elements, deve ser passada uma lista aqui
 * também com o mesmo número de itens. As configurações são passadas como
 * objeto.
 * @param {Number} index (opcional) Índice da lista para o elemento que será
 * colocado em evidência.
 */
function spotElement(elements, opts, index)
{
	var currentOpts = null;

	if(!index)
		index = 0;

	if(Array.isArray(opts))
		currentOpts = opts[index];
	else
		currentOpts = opts;

	if(!currentOpts)
		currentOpts = {};

	var hideAll = function(){
		element.removeClass('overall-element').popover('destroy');

		if(++index == elements.length)
			$('.overall').fadeOut('slow');
		else
			spotElement(elements, opts, index);
	};
	var setPopover = function(element){
		element.popover({
			html : true,
			trigger : 'manual',
			placement : currentOpts.placement || element.data('placement'),
			title : function(){
				return currentOpts.title || $(this).attr('title');
			},
			content : function(){
				var content = $(
					'<div>' +
						(currentOpts.content || $(this).data('content')) +
					'<div>' +
					'<div class="text-right m-t-10">' +
						'<button class="btn btn-success btn-small all-caps">' + (index == (elements.length - 1) ? 'OK, entendi' : 'Próxima dica <i class="fa fa-angle-right m-l-5"></i>') + '</button>' +
					'</div>'
				);
				content.find('button.btn-success').click(function(){
					hideAll();
				});
				return content;
			}
		}).popover('show');
	};
	var element = Array.isArray(elements) ? elements[index] : elements;

	if(!/absolute|relative|fixed/.test(element.css('position')))
		element.css('position', 'relative');

	element.addClass('overall-element');

	if($('.overall').size() == 0)
	{
		$('<div class="overall"></div>').appendTo('body')
			.click(function(){
				hideAll();
			})
			.fadeIn('slow', function(){
				setPopover(element);
			});
	}
	else
	{
		setPopover(element);
	}
}

/**
 * Forma uma query string de acordo com os filtros selecionados.
 * @param {jQuery} filters Coleção de filtros.
 * @returns {String} Query string resultante.
 */
function getFiltersQueryString(filters)
{
	var params = '?';

	filters.each(function (){
		var filter = $(this);
		var val = filter.find(':input[name^=valor]');
		val = val.data('value') ? val.data('value') : (val[0].nodeName.toLowerCase() == 'select' ? val.select2('val') : val.val());

		params += (params == '?' ? '' : '&')
				+ 'campo[]=' + filter.find(':input[name^=campo]').select2('val')
				+ '&condicao[]=' + filter.find(':input[name^=condicao]').select2('val')
				+ '&valor[]=' + val
				+ '&operador[]=' + filter.find(':input[name^=operador]').select2('val');
	});

	return params;
}

/**
 * Filtra a tabela de acordo com os filtros selecionados.
 */
function doFilterTable()
{
	var table = $('.js-dynamic-table');
	var filters = $('.js-filter');
	var btn = $('.js-filter-table');
	var params = getFiltersQueryString(filters);
	var oldCallback = Callbacks.tableLoaded;

	if(/\?/.test(table.data('source')))
		params = '&' + params.slice(1);

	Callbacks.tableLoaded = function(table, data){
		btn
			.attr('disabled', false)
			.html(btn.attr('old-html'))
			.prev().attr('disabled', false);

		oldCallback(table, data);
		Callbacks.tableLoaded = oldCallback;
	};

	btn
		.attr('disabled', true)
		.attr('old-html', btn.html())
		.html('<i class="fa fa-spin fa-spinner"></i> Aguarde')
		.prev().attr('disabled', true);

	table.dataTable().api().ajax.url(resolveUrl(table.data('source')) + params).load();
}

/**
 * Carrega os valores de um filtro.
 * @param {jQuery} input Campo do filtro.
 * @param {Boolean} reset Indica se o campo de condição deve ser reiniciado.
 * @param {Function} callback (opcional) Função executada no término do
 * carregamento do filtro. Só é chamada se o carregamento for bem sucedido.
 */
function loadFilter(input, reset, callback)
{
	$.get(optimuz.baseUrl + input.data('controller') + '/carregar-filtro/' + input.select2('val'), function (data){
		if(data.success)
		{
			if(!data.input.html)
				data.input.html = '<input type="text" name="valor[]" class="form-control" placeholder="Insira um valor">';

			var newInputValue = $(data.input.html);
			var parent = input.closest('.js-filter').find('.col-md-5 div');
			var conditionInput = input.closest('.js-filter').find('.form-group').eq(1).find('select,.js-select');
			var conditionValue = reset ? '' : conditionInput.select2('val');

			parent.find('select,.js-select').select2('destroy');
			parent.empty().replaceWith('<div class="controls"></div>');
			input.closest('.js-filter').find('.col-md-5 div').append(newInputValue);

			if(newInputValue.hasClass('js-select') || (newInputValue[0].nodeName.toLowerCase() == 'select'))
			{
				prettySelect(newInputValue);

				if(conditionValue === '')
					conditionValue = 1;
			}
			else if(!!data.input.mask)
			{
				newInputValue.mask(data.input.mask);

				if(conditionValue === '')
					conditionValue = 1;
			}

			conditionInput.select2('val', conditionValue);

			if(!!callback)
				callback(data);
		}
		else
		{
			showMessage(data.message, data.type);
		}
	}).error(function (){
		showMessage('Ops! Não foi possível carregar o filtro. Tente novamente por favor.', 'error');
	});
}

/**
 * Formata os campos passados como seleção de hora.
 * @param {Mixed} e Seletor CSS, objeto DOM ou objeto jQuery com os campos que
 * deverão ser formatados como hora.
 */
function setInputTime(e)
{
	var timeToSeconds = function(time, inputTime)
	{
		var maxSeconds = 15 * 60;
		var seconds = getTimeToSeconds(time);

		if(seconds > maxSeconds)
			inputTime.timepicker('setTime', '15:00');

		return seconds;
	};

	$(e).each(function(){
		var container = $(this);
		var inputSlider = container.find('.slider-element');
		var inputTime = container.find('.timepicker');
		var hasSlider = inputSlider.size() > 0;

		if(hasSlider)
		{
			inputSlider.slider().on('slide', function(evt){
				setTimepickerValue(evt.value, inputTime);
			});
		}

		//TODO aprimorar o comportamento da máscara
		inputTime.mask('99:99', {
			placeholder : '0',
			autoclear : false,
			completed : function(){
				var seconds = timeToSeconds(this.val(), inputTime);

				if(hasSlider)
					inputSlider.val(seconds).slider('setValue', seconds);
			}
		});

		inputTime.timepicker({
			template : false,
			defaultTime : '01:00',
			showSeconds : false,
			showMeridian : false,
			minuteStep : 1,
			secondStep : 1
		}).on('changeTime.timepicker', function(evt){
			var seconds = timeToSeconds(evt.time.hours + ':' + evt.time.minutes, inputTime);

			if(hasSlider)
				inputSlider.val(seconds).slider('setValue', seconds);
		});

		inputTime.next().css('cursor', 'pointer').click(function(){
			inputTime.focus();
		});

		if(hasSlider)
			setTimepickerValue(inputSlider.data('slider-value'), inputTime);
	});
}

/**
 * Exibe um tempo em segundos formatado como mm:ss no campo de seleção de tempo.
 * @param {Number} seconds Tempo em segundos.
 * @param {jQuery} inputTime Campo do formulário usado como seletor de tempo.
 */
function setTimepickerValue(seconds, inputTime)
{
	inputTime.timepicker('setTime', getSecondsToTime(seconds));
}

/**
 * Converte um número de segundos para uma expressão de tempo no formato mm:ss.
 * @param {Number} seconds Número de segundos.
 * @returns {String} Expressão no formato mm:ss.
 */
function getSecondsToTime(seconds)
{
	var time = '';

	if(seconds > 59)
	{
		var d = seconds / 60;
		var a = parseInt(d);
		var b = Math.round((d - a) * 60);
		time = (a <= 9 ? '0' : '') + a + ':' + (b <= 9 ? '0' : '') + b;
	}
	else
	{
		time = '00:' + (seconds <= 9 ? '0' : '') + seconds;
	}

	return time;
}

/**
 * Transforma uma expressão de tempo no formato mm:ss em um número inteiro de
 * segundos.
 * @param {String} time Expressão no formato mm:ss.
 * @returns {Number} Número de segundos correspondente ao tempo passado.
 */
function getTimeToSeconds(time)
{
	var parts = time.split(':');
	return (parseInt(parts[0]) * 60) + parseInt(parts[1]);
}

/**
 * Habilita o comportamento de filtro para um campo de formulário. A medida que
 * o usuário digita, uma função é chamada para fazer o filtro.
 * @param {jQuery} input Campo que será usado como filtro.
 * @param {Function} fn Função que será chamada para fazer o filtro. O campo
 * input será passado como primeiro parâmetro.
 */
function filterInput(input, fn)
{
	if(input.data('isFilteringInput') === undefined)
	{
		input
			.data('delayFilterID', 0)
			.data('isFilteringInput', false)
			.keyup(function(evt){
				var key = evt.keyCode;
				var doSearch = !/^(9|1[36-8]|2[07]|3[3-9]|4[04-5]|9[13]|11[2-9]|12[0-3])$/.test(key);

				if(doSearch)
				{
					clearTimeout(input.data('delayFilterID'));
					input.data('delayFilterID', setTimeout(function(){
						if(!input.data('isFilteringInput'))
						{
							input
								.data('isFilteringInput', true)
								.prop('disabled', true);
							fn(input);
						}
					}, 400));
				}
			});
	}
}

/**
 * Habilita o comportamento de remoção para um determinado botão.
 *
 * Ao clicar no botão, uma janela de confirmação é apresentada, e ao confirmar,
 * o registro é removido via requisição Ajax.
 * @param {String|DOMElement|jQuery} btn Pode ser um seletor CSS, um elemento
 * DOM ou um objeto jQuery.
 * @param {String} title (opcional) Título da janela de confirmação. Se não for
 * informado, o título padrão será usado.
 * @param {String} description (opcional) Texto da janela de confirmação. Se não
 * for informado, o texto padrão será usado.
 */
function removeRecord(btn, title, description)
{
	$(btn).click(function(e){
		e.preventDefault();
		var link = $(this);
		var btnConfirmHtml = '<i class="fa fa-trash-o m-r-5"></i> Sim, continuar';

		showConfirm(title || 'Remover registro', description || 'Deseja mesmo executar esta ação?', btnConfirmHtml, function(modal){
			var restore = function()
			{
				modal.modal('hide');
				modal
					.find('button').prop('disabled', false)
						.filter('.btn-danger').html(btnConfirmHtml);
			};

			hideMessage();
			modal
				.find('button').prop('disabled', true)
					.filter('.btn-danger').html('<i class="fa fa-spin fa-spinner m-r-5"></i> Aguarde');

			$.get(link.attr('href')).success(function(data){
				restore();
				showMessage(data.message, data.type);

				if(!!data.url)
				{
					setTimeout(function(){
						window.location.href = data.url;
					}, 3000);
				}
			}).error(function(){
				restore();
				showMessage('Que coisa! Ocorreu um erro inesperado. Tente novamente.', 'error');
			});
		});
	});
}

/**
 * Formata os campos passados como data atribuindo a eles uma máscara e um mini
 * calendário.
 * @param {Mixed} e Seletor CSS, objeto DOM ou objeto jQuery com os campos que
 * deverão ser formatados como data.
 * @param {Object} opts (opcional) Opções para o plugin Datepicker.
 */
function setInputDate(e, opts)
{
	var finalOpts = $.extend({}, {
		format : 'dd/mm/yyyy',
		autoclose: true,
		language : 'pt-BR',
		clearBtn : true
	}, opts);

	$(e).each(function(){
		var input = $(this);
		input.mask('99/99/9999');
		input.datepicker(finalOpts);
		input.next('.input-group-addon').css('cursor', 'pointer').click(function(){
			input.datepicker('show');
		});
	});
}

/**
 * Exibe uma mensagem animada em forma de círculo no centro da tela. A mensagem
 * fica sobreposta sobre todos os elementos da página.
 * @param {String} icon Identificador CSS do ícone que deverá ser exibido.
 * @param {String} title Título da mensagem. Pode conter HTML.
 * @param {String} msg Conteúdo da mensagem. Pode conter HTML.
 * @param {Number} speed (opcional) Velocidade da animação. O padrão é 300.
 * @param {Object} animateIconSettings (opcional) Configurações para a animação
 * do ícone. O objeto pode conter seguintes os parâmetros:
 * <ul>
 * <li>animate: liga/desliga a animação do ícone (ligado por padrão).</li>
 * <li>loop: define se a animação deve rodar em loop.</li>
 * <li>delay: intervalo de tempo para a animação se o loop estiver ligado.</li>
 * <li>animation: animação CSS do ícone (padrão é tada).</li>
 * </ul>
 */
function showFancyMessage(icon, title, msg, speed, animateIconSettings)
{
	var size = 300;
	var animateIcon = function()
	{
		var animation = animateIconSettings.animation;
		var icon = e.find('.js-icon').addClass('animated');
		var delay = 0;

		if(icon.hasClass(animation))
		{
			icon.removeClass(animation);
			delay = 50;

			setTimeout(function(){
				icon.addClass(animation);
			}, delay);
		}
		else
		{
			icon.addClass(animation);
		}

		clearTimeout(e.data('iconAnimationTimeout'));
		e.data('iconAnimationTimeout', setTimeout(function(){
			icon.removeClass(animation);

			if(animateIconSettings.loop)
				setTimeout(animateIcon, animateIconSettings.delay);
		}, 1000 + delay));
	};
	var e = $(
		'<div class="overall js-fancy-message">'
			+ '<div class="overall-element">'
				+ '<div><i class="fa fa-' + icon + ' fa-5x js-icon"></i>' + title + msg + '</div>'
			+ '</div>'
		+ '</div>'
	);

	if(speed === undefined)
		speed = 600;

	animateIconSettings = $.extend({}, {
		animate : true,
		loop : false,
		delay : 0,
		animation : 'tada'
	}, animateIconSettings);

	e.css({
		opacity : 0,
		position : 'fixed',
		top : 0,
		right : 0,
		bottom : 0,
		left : 0,
		margin : 'auto',
		background : 'rgba(0, 0, 0, .5)'
	});

	e.find('.overall-element')
		.css({
			opacity : 0,
			width : 900,
			height : 900,
			position : 'absolute',
			top : 0,
			right : 0,
			bottom : 0,
			left : 0,
			margin : 'auto',
			borderRadius : '50%',
			background : '#fff'
		})
		.children()
			.css({
				width : size,
				height : size / 2,
				position : 'absolute',
				top : 100,
				margin : 'auto',
				textAlign : 'center',
				opacity : 0
			});

	e.appendTo('body').animate({
		opacity : 1
	}, speed, function(){
		e.find('.overall-element')
			.animate({
				opacity : 1,
				width : size,
				height : size
			}, speed, 'easeOutExpo', function(){
				e.find('.overall-element > div')
					.animate({
						opacity : 1,
						top : 70
					}, 600, 'easeOutExpo')
					.find('.js-icon')
						.css({
							display : 'block',
							marginBottom : 50
						})
						.animate({
							marginBottom : 0
						}, 600, 'easeOutExpo', function(){
							e.click();

							if(animateIconSettings.animate)
								animateIcon();
						});
			});
	});
}

/**
 * Esconde a mensagem circular criada através de <code>showFancyMessage()</code>
 * através de uma animação suave.
 */
function hideFancyMessage()
{
	var speed = 200;

	$('.js-fancy-message').each(function(){
		var e = $(this);

		e.find('.overall-element').children().fadeOut(speed, function(){
			e.find('.overall-element').animate({
				opacity : 1,
				width : 0,
				height : 0
			}, speed, function(){
				e.fadeOut(speed, function(){
					e.remove();
				});
			});
		});
	});
}

/**
 * Marca uma linha da tabela como selecinada.
 * @param {jQuery} row Linha que será marcada.
 * @param {Boolean} checked (opcional) Indica se a linha está selecionada ou
 * não. Se não for informado, a linha será atualizada automaticamente.
 */
function checkItem(row, checked)
{
   if(checked === undefined)
	   checked = !row.hasClass('row_selected');

   row.find('td:first :checkbox').prop('checked', checked);

   if(checked)
	   row.addClass('row_selected');
   else
	   row.removeClass('row_selected');

   var table = row.closest('table');
   table.find('thead .dropdown-toggle')[table.find('.row_selected').size() == 0 ? 'addClass' : 'removeClass']('disabled');
}

/**
 * Tenta recuperar a resposta JSON da chamada Ajax. Quando a chamada retorna,
 * erro o conteúdo da resposta é passada como string no primeiro parâmetro da
 * função de callback error(). Assim é possível recuperá-lo e transformá-lo em
 * um objeto JSON.
 * @param {Array} errorArguments Os argumentos recebidos pela função error() do
 * jQuery.
 * @returns {Object} Retorna o objeto JSON em caso de sucesso na recuperação, ou
 * um objeto vazio em caso de falhas.
 */
function getAjaxError(errorArguments)
{
	var data = {};

	try
	{
		data = JSON.parse(errorArguments[0].responseText);
	}
	catch(e)
	{
		data = {};
	}

	return data;
}

/**
 * Retorna um número aleatório entre min e max.
 * @param {Number} min Número mínimo.
 * @param {Number} max Número máximo.
 * @returns {Number} Número aleatório.
 */
function rand(min, max)
{
	return Math.floor((Math.random() * (max - min + 1)) + min);
}

/**
 * Faz animação de um número dentro de um elemento da página.
 * @param {Number} stop Número final (alvo). Pode ser um inteiro ou um float.
 * @param {Number} duration Duração da animação em milisegundos.
 * @param {String} ease Efeito da animação. O padrão é swing.
 * @param {Number} precision Número de casas decimais exibidos durante e no
 * número final da animação.
 * @returns {jQuery} Retorna o objeto jQuery.
 */
jQuery.fn.animateNumbers = function(stop, duration, ease, precision)
{
	return this.each(function(){
		var $this = $(this);
		var start = parseFloat($this.text().trim().replace(/,/g, '.'));

		if(precision === undefined)
			precision = 0;

		if(typeof stop == 'string')
			stop = Number(stop.replace(',', '.'));

		$({value : start}).animate({value : stop}, {
			duration : (duration == undefined ? 1000 : duration),
			easing : (ease == undefined ? 'swing' : ease),
			step : function(){
				$this.text(Number(this.value.toFixed(precision)).toLocaleString());
			},
			complete : function (){
				var n = 0;

				if(parseInt($this.text()) !== stop)
					n = Number(stop.toFixed(precision));
				else
					n = Number(Number($this.text().trim()).toFixed(precision));

				if(isNaN(n))
					n = 0;

				$this.text(n.toLocaleString());
			}
		});
	});
};

/**
 * Define as configurações padrões iniciais para todas as tabelas dinâmicas.
 */
function setupDataTables()
{
	/* Set the defaults for DataTables initialisation */
	$.extend(true, $.fn.dataTable.defaults, {
		sDom : "<'clearfix'l <'toolbar'<'table-tools-actions pull-left'>>f>rt<'clearfix'p i>",
		sPaginationType : 'bootstrap',
		oLanguage : {
			sLengthMenu : '_MENU_'
		}
	});

	/* Default class modification */
	$.extend($.fn.dataTableExt.oStdClasses, {
		sWrapper : 'dataTables_wrapper form-inline'
	});

	/* API method to get paging information */
	$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
	{
		return {
			iStart : oSettings._iDisplayStart,
			iEnd : oSettings.fnDisplayEnd(),
			iLength : oSettings._iDisplayLength,
			iTotal : oSettings.fnRecordsTotal(),
			iFilteredTotal : oSettings.fnRecordsDisplay(),
			iPage : oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
			iTotalPages : oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
		};
	};

	/* Bootstrap style pagination control */
	$.extend($.fn.dataTableExt.oPagination, {
		bootstrap : {
			fnInit : function(oSettings, nPaging, fnDraw)
			{
				var fnClickHandler = function(e)
				{
					e.preventDefault();

					if(oSettings.oApi._fnPageChange(oSettings, e.data.action))
						fnDraw(oSettings);
				};

				$(nPaging).addClass('pagination').append(
					'<ul>' +
						'<li class="first disabled"><a href="#"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i></a></li>' +
						'<li class="prev disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>' +
						'<li class="next disabled"><a href="#"><i class="fa fa-chevron-right"></i></a></li>' +
						'<li class="last disabled"><a href="#"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a></li>' +
					'</ul>'
				);

				var els = $('a', nPaging);
				els.eq(0).bind('click.DT', {action : 'first'}, fnClickHandler);
				els.eq(1).bind('click.DT', {action : 'previous'}, fnClickHandler);
				els.eq(2).bind('click.DT', {action : 'next'}, fnClickHandler);
				els.eq(3).bind('click.DT', {action : 'last'}, fnClickHandler);
			},
			fnUpdate : function(oSettings, fnDraw)
			{
				var iListLength = 5;
				var oPaging = oSettings.oInstance.fnPagingInfo();
				var an = oSettings.aanFeatures.p;
				var i, ien, j, sClass, iStart, iEnd, iHalf = Math.floor(iListLength / 2);

				if(oPaging.iTotalPages < iListLength)
				{
					iStart = 1;
					iEnd = oPaging.iTotalPages;
				}
				else if(oPaging.iPage <= iHalf)
				{
					iStart = 1;
					iEnd = iListLength;
				}
				else if(oPaging.iPage >= (oPaging.iTotalPages - iHalf))
				{
					iStart = oPaging.iTotalPages - iListLength + 1;
					iEnd = oPaging.iTotalPages;
				}
				else
				{
					iStart = oPaging.iPage - iHalf + 1;
					iEnd = iStart + iListLength - 1;
				}

				for(i = 0, ien = an.length; i < ien; i++)
				{
					// Remove the middle elements
					$('li:gt(1)', an[i]).filter(':not(.next, .last)').remove();

					// Add the new list items and their event handlers
					for(j = iStart; j <= iEnd; j++)
					{
						sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';

						$('<li ' + sClass + '><a href="#">' + j + '</a></li>')
							.insertBefore($('li.next', an[i])[0])
							.bind('click', function (e){
								e.preventDefault();
								oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
								fnDraw(oSettings);
							});
					}

					// Add / remove disabled classes from the static elements
					if(oPaging.iPage === 0)
						$('li.first, li.prev', an[i]).addClass('disabled');
					else
						$('li.first, li.prev', an[i]).removeClass('disabled');

					if(oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0)
						$('li.next, li.last', an[i]).addClass('disabled');
					else
						$('li.next, li.last', an[i]).removeClass('disabled');
				}
			}
		}
	});

	/*
	 * TableTools Bootstrap compatibility
	 * Required TableTools 2.1+
	 */

	// Set the classes that TableTools uses to something suitable for Bootstrap
	$.extend(true, $.fn.DataTable.TableTools.classes, {
		container : 'DTTT ',
		buttons : {
			normal : 'btn btn-white',
			disabled : 'disabled'
		},
		collection : {
			container : 'DTTT_dropdown dropdown-menu',
			buttons : {
				normal : '',
				disabled : 'disabled'
			}
		},
		print : {
			info : 'DTTT_print_info modal'
		},
		select : {
			row : 'active'
		}
	});

	// Have the collection use a bootstrap compatible dropdown
	$.extend(true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
		collection : {
			container : 'ul',
			button : 'li',
			liner : 'a'
		}
	});
}

/**
 *
 * @returns {jQuery}
 */
jQuery.fn.scrollUp = function()
{
	return this.animate({scrollTop : 0}, 500);
};

/**
 * Retorna a data atual com as horas e segundos.
 * @returns {String}
 */
function getCurrentDate()
{
	var d = new Date();

	var day		= d.getDay() < 10 ? '0' + d.getDay() : d.getDay();
	var month	= d.getMonth() < 10 ? '0' + d.getMonth() : d.getMonth();
	var hours	= d.getHours() < 10 ? '0' + d.getHours() : d.getHours();
	var minuts	=  d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes();
	var seconds =   d.getSeconds() < 10 ? '0' +  d.getSeconds() : d.getSeconds();

	return  day + '/' + month +'/'+ d.getFullYear() + ' ' + hours +':'+ minuts +':'+ seconds;
}