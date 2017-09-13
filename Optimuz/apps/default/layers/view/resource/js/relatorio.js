$(document).ready(function()
{
	/**
	 * Template do select de usuários.
	 * @type jQuery
	 */
	var templateUsuarios = $('#usuarios').clone();

	/**
	 * Callback para retornar as pesquisas.
	 *
	 * @param {stdClass} data Dados do objeto da resposta ajax.
	 * @author Hugo Minari
	 */
	Callbacks.listarPesquisa = function(data)
	{
		$('input#pesquisa').val(data['pesquisa']);

		if(data.success)
		{
			//Popula a lista dos as pesquisas disponiveis
			var tbody = $('#filtro-pesquisas .table tbody');
			tbody.html('');
			$.each(data['dados'], function(index, value) {
				tbody.append(
					'<tr class="cursor-pointer" data-url="' + data['url'] + value['id'] + '">' +
						'<td>' + value['titulo'] + '</td>' +
						'<td class="text-right">' +
							'<i class="fa fa-bar-chart font-18 m-t-5" aria-hidden="true"></i></td>' +
						'</td>' +
					'</tr>'
				);
			});

			tbody.find('tr').click(function(){
				showMessage('Gerando gráficos, Isto pode demorar alguns segundos, <b>Por favor Aguarde!</b>', 'success');
				blockUI('.page-content');
				window.location.replace($(this).data('url'));
			});
		}
		else
		{
			showMessage(data.message || 'Não foi possível resgatar as pesquisas. Tente novamente.', data.type || 'error');
		}

		if(tbody.html() == "")
		{
			showMessage('Desculpe! Não encontramos nenhuma pesquisa neste periodo selecionado.', 'error');
		}
	};

	/**
	 * Callback para retornar as pesquisas e selecionar um ou mais usuários.
	 * @param {stdClass} data Dados do objeto da resposta ajax.
	 * @author Hugo Minari
	 */
	Callbacks.listarPesquisaUsuario = function(data)
	{
		//Popula a lista dos as pesquisas disponiveis
		var tbody = $('#filtro-pesquisas .table tbody');
		tbody.html('');
		$.each(data['dados'], function(index, value) {
			tbody.append(
				'<tr class="cursor-pointer">'
					+ '<td>' + value['titulo'] + '</td>'
					+ '<td class="text-right">'
						+ '<span class="radio radio-success">'
							+ '<input type="radio" id="js-pesquisa-' + index + '" name="pesquisa" value="' + value['id'] + '" class="m-t-5">'
							+ '<label for="js-pesquisa-' + index + '" class="no-margin">&nbsp;</label>'
						+ '</span>'
					+ '</td>'
			  + '</tr>'
			);
		});

		if(tbody.html() == "")
		{
			showMessage('Desculpe! Não encontramos nenhuma pesquisa neste periodo selecionado.', 'error');
		}

		//Popula o select para escolher os usuários
		tbody.find('tr').click(function(){

			$('input[type=radio]',this).attr('checked','checked');
			var pesquisaId = $('input[type=radio]',this).val();
			$('input#pesquisa').val(pesquisaId);

			blockUI('#pesquisas');
			blockUI('#js-filtro-usuarios');
			hideMessage();

			$.get(resolveUrl('~/relatorio/filtra-usuarios/pesquisa:' + pesquisaId), function(data)
			{
				if(data.success)
				{
					var wrapper = $('#js-usuarios-wrapper').empty();
					var usuarios = templateUsuarios.clone();

					$.each(data['dados'], function(index, value) {
						usuarios.append(
							'<option value="' + value['id'] + '"> ' + value['nome'] + ' </option>'
						);
					});

					wrapper.append(usuarios);
					prettySelect(usuarios);

					unblockUI('#pesquisas');
					unblockUI('#js-filtro-usuarios');
					$('#js-filtro-usuarios').addClass('animated flipInX').removeClass('hidden');
					showMessage('Selecione os usuários da pesquisa no campo abaixo.', 'success');
				}
				else
				{
					unblockUI('#pesquisas');
					unblockUI('#js-filtro-usuarios');
					showMessage(data.message || 'Não foi possível resgatar os usuários desta pesquisa. Tente novamente.', data.type || 'error');
				}

			}).error(function(){
				unblockUI('#pesquisas');
				showMessage(data.message || 'Não foi possível executar a ação desejada. Tente novamente.', data.type || 'error');
			});

		});
	};

	/**
	 * Função que desenha o gráfico de acordo com o tipo de grafico a ser gerado
	 * @param {String} tipoGrafico Tipo de gráfico a ser gerado.
	 * @param {String} div Div que contém as filhas com data-chart dos gráficos.
	 * @author Hugo Minari
	 */
	function prepararGrafico(tipoGrafico, div)
	{
		var jsonData = $(div).data('chart');
		var data = new google.visualization.arrayToDataTable(jsonData);

		if(tipoGrafico == 'bar')
		{
			var options = {
				width: '100%',
				height: 430,
				bar: {groupWidth: "95%"},
				legend: { position: "none" },
				chartArea:{left:100, right:100, top:20,bottom: 90, width:"100%",height:"100%"},
				animation: {
					duration: 500,
					easing: 'inAndOut',
					startup: true
				}
			};

			var chart = new google.visualization.ColumnChart(div);
			chart.draw(data, options);
		}
		else if(tipoGrafico == 'bar-h')
		{
			var altura = $(div).data('height');

			var options = {
				width: '100%',
				height: altura,
				bar: {groupWidth: "95%"},
				bars: 'horizontal',
				axisTitlesPosition: 'out',
				legend: {
					position: 'top',
					textStyle:
					{
						color: 'black',
						fontSize: 13
					}
				},
				vAxis: {
				  minValue: 0,
				  textStyle:
				  {
					fontSize: 12
				  }
				},
				hAxis: {
					format: 'decimal',
					minValue: 0,
					textStyle:
					{
					  fontSize: 12
					}
				},
				chartArea: {
				  left: "50",
				  top: "0",
				  bottom: "20",
				  height: "100%",
				  width: "100%"
				},
				animation: {
				  duration: 1000,
				  easing: 'inAndOut',
				  startup: true
				}
			};

			var chart = new google.visualization.BarChart(div);
			chart.draw(data, options);
		}
		else if(tipoGrafico == 'donuts')
		{
			var options = {
				width: '100%',
				height: 320,
				pieHole: 0.3,
				sliceVisibilityThreshold: 0,
				chartArea: {
				  left: "0",
				  right: "0",
				  top: "10",
				  bottom: "10",
				  height: "100%",
				  width: "100%"
				},
				legend: {position: 'left'},
				tooltip: {
					textStyle: {color: 'Black'},
					showColorCode: true
				},
				pieSliceTextStyle: {
					color: 'Black',
					fontName: 'Helvetica Neue',
					fontSize: 14
				}
			};

			var donuts = new google.visualization.PieChart(div);
			donuts.draw(data, options);
		}
		else if(tipoGrafico == 'map')
		{
			var url			= resolveUrl('~/resource/default/img/icon/markers/');
			var latitude	= $(div).data('lat');
			var longitude	= $(div).data('lng');

			var options = {
				zoomLevel: 7,
				showTip: true,
				useMapTypeControl: true,
				enableScrollWheel: false,
				height: 430,
				mapType: 'normal',
				icons: {
				  Homem: {
					normal:   url + 'homem-26.png',
					selected: url + 'homem-26.png'
				  },
				  Mulher: {
					normal:   url + 'mulher-26.png',
					selected: url + 'mulher-26.png'
				  },
				  Masculino: {
					normal:   url + 'homem-26.png',
					selected: url + 'homem-26.png'
				  },
				  Feminino: {
					normal:   url + 'mulher-26.png',
					selected: url + 'mulher-26.png'
				  }
				}
			};

			var map = new google.visualization.Map(div);
			map.draw(data, options);
		}
	}

	/**
	 * Função gera o gráfico com o Google Charts.
	 * @param {String} tipoGrafico Opções [donuts, bar, bar-h, map].
	 * @param {String} div Div que contém as filhas com data-chart declarado.
	 * @author Hugo Minari
	 */
	function gerarGraficos(tipoGrafico, div)
	{
		google.charts.load("current", {packages:["corechart", "bar", "map"]});
		google.charts.setOnLoadCallback(function(){
			$('#' + div + ' [data-chart]').each(function(){
				prepararGrafico(tipoGrafico, this);
			});
		});
	}

	/*
	 * Verifica se existe a variável para desenharGráficos e que tipo de gráfico
	 * vai ser gerado.
	 */
	if(optimuz.desenharGraficos)
	{
		switch(optimuz.grafico)
		{
			case 'analitico':
				gerarGraficos("donuts", "graphics-content");
				break;

			case 'usuario':
				gerarGraficos("bar", "graphics-content");
				break;

			case 'aplicacao':
				gerarGraficos("map", "graphics-content");
				break;

			case 'perfil-amostral':
				gerarGraficos("bar-h", "graphics-content");
				break;
		}
	}

	/*
	 * DataTables configurações
	 */
	try
	{
		setupDataTables();

		$('.js-table').each(function()
		{
			var table = $(this);

			table.dataTable({
				processing : false,
				serverSide : false,
				bPaginate : true,
				bLengthChange : true,
				bSort : true,
				bInfo : true,
				bAutoWidth : false,
				bStateSave : false,
				oLanguage : defaultDataTableLanguage
			});

			var inputFilter = table.parent().find('.dataTables_filter input');
			inputFilter.addClass('input-medium').attr('placeholder', 'Filtro rápido');
			inputFilter.parent()[0].removeChild(inputFilter[0].previousSibling);
		});
	}
	catch(e){}

	/*
	 * Inicializa máscaras para datas
	 */
	try
	{
		$('.js-date').mask('99/99/9999', {placeholder : '__/__/____'});

		$('.datepicker').datepicker({
			format:'dd/mm/yyyy',
			language:'pt-BR'
		}).on('changeDate', function(ev){
          $(this).datepicker('hide');
        });
	}
	catch(e)
	{
		missingPlugin('jquery.inputmask');
	}

	/*
	 * Estilizar os selects com o padrão do sistema.
	 */
	prettySelect('select');

	/*
	 * Botão que seleciona todos os pesquisadores para gerar o relatorio por
	 * usuários.
	 */
	$('[data-check]').click(function()
	{
		//Pega alguns dados do botão
		var button = '#' + $(this).attr('id');
		var select = '#' + $(this).data('select');
		var check  = $(this).data('check');

		if(check == 'all')
		{
			$(select + " > option").prop("selected","selected");
			$(select).trigger("change");
			$(this).data('check', 'none').html('Remover Todos').removeClass('btn-primary').addClass('btn-danger');
		}
		else
		{
			$(select + " > option").removeAttr("selected");
			$(select).trigger("change");
			$(this).data('check', 'all').html('Selecionar Todos').removeClass('btn-danger').addClass('btn-primary');
		}
	});

	/*
	 * Clona o conteudo das informações da pesquisa e exibe para o usuario
	 * ao descer a página.
	 */
	$(document).scroll(function()
	{
		//Div que será exibida quando rolar a página
		$('body').append('<div id="informacoes-pesquisa" style="display:none"></div>');

		var scroll		= $(this).scrollTop();
		var widthMenu	= $("#main-menu").width();
		var content		= $('#js-info-pesquisa').html();

		//Estiliza a div e adiciona as informações da pesquisa
		var clone		= $('#informacoes-pesquisa')
							.html('<div class="row">' + content + '</div>')
							.css({
								'top' : '60px',
								'left' : widthMenu,
								'right' : 0,
								'position' : 'fixed',
								'background' : '#FFF',
								'padding' : '10px 0',
								'-webkit-box-shadow' : '5px 1px 6px -4px rgba(0,0,0,0.87)',
								'-moz-box-shadow' : '5px 1px 6px -4px rgba(0,0,0,0.87)',
								'box-shadow' : '5px 1px 6px -4px rgba(0,0,0,0.87)'
							});
		
		$('#informacoes-pesquisa .row > div:first-child').css('padding-left', '65px');

		//Exibe ou oculta de acordo com o scroll
		if(scroll > 300)
			$('#informacoes-pesquisa').fadeIn();
		else
			$('#informacoes-pesquisa').fadeOut();
	});



});