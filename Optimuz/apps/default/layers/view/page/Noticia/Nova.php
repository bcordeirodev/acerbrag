<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="mdi mdi-newspaper"></i>
		<h3>Nova <span class="semi-bold">Noticia</span></h3>
	</div>
</div>
<form action="~/noticia/salvar" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="grid simple">
				<div class="grid-title no-border clickable">
					<h4>Informações <span class="semi-bold">Básicas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label" for="titulo">Título</label>
								<i object-type="RequiredFieldIndicatorComponent"></i>
								<span class="help">Título descritivo da notícia</span>
								<div class="controls">
									<input type="text" name="titulo" id="titulo" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="sub-titulo">Sub título</label>
								<i object-type="RequiredFieldIndicatorComponent"></i>
								<span class="help">Descrição breve do que você deseja informar</span>
								<div class="controls">
									<textarea name="sub-titulo" id="sub-titulo" class="form-control" rows="2"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="descricao">Descrição</label>
								<i object-type="RequiredFieldIndicatorComponent"></i>
								<span class="help">Descrição completa da noticia.</span>
								<div class="controls">
									<textarea name="descricao" id="descricao" class="form-control" rows="9"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="dz-upload-file" class="dropzone-custom height-70 no-margin" data-url="~/noticia/upload-file" data-autostart="false">
										<div class="dz-default dz-message">
											<span><i class="mdi mdi-upload"></i>Adicionar imagem da noticia</span>
										</div>
										<div class="fallback">
											<input type="file" name="file" id="file">
										</div>
									</div>
								</div>
								<div class="row" id="upload-queue"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-actions">
				<div class="pull-right">
					<a href="~/agenda" class="btn btn-white btn-cons" object-type="HtmlLink">Cancelar</a>
					<button class="btn btn-success btn-cons js-submit" type="submit">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</form>