$(document).ready(function(){
	/*
	 * Botão que remove coleta.
	 */
	$('body').delegate('.excluir', 'click', function()
	{
		var collectId = $(this).data('coleta-id');
		var button = $(this);
		var row = button.closest('.content');

		$title = 'Confirmação de exclusão';
		$button = 'Sim, <b>prosseguir</b>';
		$mensage = '<p><b class="text-error">Aviso:</b> Toda informação desta coleta será removida permanentemente. Deseja prosseguir?</p>'
				 + '<p class="text-danger no-margin no-padding"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Esta ação não poderá ser desfeita .</p>';

		$callback = function()
		{
			showMessage('Excluindo a coleta #' + collectId + ', isto pode levar alguns minutos, Aguarde!', 'info');
			blockUI(row);

			$.get(resolveUrl('~/coleta/excluir-coleta/' + collectId), function(data)
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
				showMessage('Ocorreu um erro ao excluir a coleta, por favor tente novamente!', 'error');
			});
		};

		showConfirm($title, $mensage, $button, $callback);
	});

	/*
	 * Botão que marca coleta para auditoria.
	 */
	$('body').delegate('.auditar', 'click', function()
	{
		var collectId = $(this).data('coleta-id');
		var status = $(this).data('status');
		var button = $(this);
		var row = button.closest('.content');

		var text = '<p>Você tem certeza que deseja marcar esta coleta para posterior auditoria?!</p>';
		var textAudited = '<p>Você tem certeza que deseja marcar esta coleta como auditada?!</p>';
		var method = (status != 'close') ? '' : '/auditada';

		$button = 'Sim';
		$title = 'Confirmar Auditoria';
		$message = (status != 'close') ? text : textAudited;
		$callback = function()
		{
			blockUI(row);

			$.get(resolveUrl('~/coleta/auditar/' + collectId + method), function(data)
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
				showMessage('Ocorreu um erro ao excluir a coleta, por favor tente novamente!', 'error');
			});
		};

		showConfirm($title, $message, $button, $callback);
	});

	/**
	* Apresenta o mapa com a localidade e nome do pesquisador.
	* @param Object collect Contem as informações da pesquisa e dos
	* pesquidadores.
	*/
	if(optimuz.collect)
	{
		google.charts.load("current", {packages:["map"]});
		google.charts.setOnLoadCallback(function(){
			drawMap(optimuz.collect);
		});

		function drawMap(collect)
		{
			var data = google.visualization.arrayToDataTable([
				['Lat', 'Long', 'Name'],
				[parseFloat(collect.latitude), parseFloat(collect.longitude), collect.nome]
			]);

			var options = {
				mapType: 'styledMap',
				zoomLevel: 15,
				showTip: true,
				useMapTypeControl: true,
				icons: {
					default: {
							normal: resolveUrl('~/resource/default/img/icon/marker.png'),
							selected: resolveUrl('~/resource/default/img/icon/marker.png')
						}
				},
				maps: {
					styledMap: {
						name: 'Styled Map',
						styles: [{
							featureType: 'landscape',
							stylers: [{hue: '#259b24'}, {saturation: 10}, {lightness: -22}]
						}]
					}
				}
			};

		  var map = new google.visualization.Map(document.getElementById('map'));

		  map.draw(data, options);
		}
	};

});