$(document).ready(function(){
	/*
	 * Formatação dos campos de entrada.
	 */
	try
	{
		$('#hora').mask('00:00', {placeholder : ''});
	}
	catch(e)
	{
		missingPlugin('jquery.inputmask');
	}

	/**
	 *  Faz o upload dos arquivos de Imagem/Video e salva
	 *  no banco de dados.
	 */
	function setFilesUploader()
	{
		var queue = $('#upload-queue');
		var dzObj = new Dropzone('#dz-upload-file', {
			url : resolveUrl($('#dz-upload-file').data('url')),
			uploadMultiple : false,
			parallelUploads : 1,
			autoProcessQueue : true,
			addRemoveLinks : false,
			clickable : true,

			init : function(){
				var dz = $(this.element);

				this.on('sending', function(file){
					file.id = file.name.replace(/\W/g, '-') + (new Date()).getTime();
					dz.find('.dz-preview').remove();
					queue.append(
						'<div id="' + file.id + '" class="m-t-10 m-b-10 col-md-12 js-box-file p-r-30 p-l-30">'
							+ '<span class="semi-bold"> '+ file.name +'</span>'
							+ '<div class="progress progress-striped active m-t-20" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">'
									+'<div class="progress-bar progress-bar-success"></div>'
							+ '</div>'
						+'</div>'
					);

					var cidade = $('#' + file.id).find('input[name="cidade"]');
					prettySelect('#' + file.id + ' select');
					prettySelect(cidade);
				});

				this.on('error', function(file, data, xhr){
					var e = $('#' + file.id);
					e.remove();
					showMessage(data.message, data.type);
				});

				this.on('success', function(file, data){
					var e = $('#' + file.id);

					var inputs = "<input type='hidden' name='nome-arquivo' value='" + data.originalName + "'>"
								+ "<input type='hidden' name='arquivo' value='" + data.currentName + "'>";

					e.append(inputs);

					e.find('a').click(function(){
						e.hide("slide", { direction: "left" }, 1000, function(){
							e.remove();
						});
					});

					$('#dz-upload-file').hide();
				});

				/**
				 * Informa que o arquivo foi enviado com sucesso.
				 */
				this.on('complete', function(file){
					var e = $('#' + file.id);
					e.removeClass('white').addClass('blue').find('.js-progress').slideUp('fast');
					e.find('.progress').remove();
					e.find('button:first').removeClass('hide');

					e.find('button:first').on("click", function(){
						e.find('.tile-footer').toggleClass('hide');
					});
				});

				this.on('uploadprogress', function(file, progress){
					var e = $('#' + file.id);
					e.find('progress-stripped').attr('aria-valuenow', progress);
					e.find('.progress-bar-success').attr('style','width:'+ progress +'%' );
				});
			},

			dictDefaultMessage : '<i class="fa fa-upload"></i> Jogue seu arquivo aqui ou clique para selecionar',
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
	}

	setFilesUploader();
});
