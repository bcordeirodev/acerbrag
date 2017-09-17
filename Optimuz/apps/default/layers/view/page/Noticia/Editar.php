<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="mdi mdi-newspaper"></i>
		<h3>Nova <span class="semi-bold">Agenda</span></h3>
	</div>
	<div class="col-md-4 text-right no-padding">
		<a href="~/noticia" id="js-back-link" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-arrow-left"></i> Voltar</a>
		<a href="~/noticia/nova" id="js-new-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-plus text-white"></i> Nova</a>
		<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file text-white"></i> Histórico</a>
	</div>
</div>
<form action="~/noticia/atualizar" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-12">
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
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Status</label>
										<i object-type="RequiredFieldIndicatorComponent"></i>
										<span class="help">O status da notícia definirá se ela será visualizada ou não pelos usuários</span>
										<div class="form-group">
											<div class="controls radio radio-success">
												<input id="ativo" name="status" type="radio" value="1">
												<label class="form-label" for="ativo">Ativo</label>
												<input id="inativo" name="status" type="radio" value="0">
												<label class="form-label" for="inativo">Inativo</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row m-t-15 m-b-15">
								<div class="col-md-12 text-center">
									<img id="imagem" style="max-width: 100%">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="dz-upload-file" class="dropzone-custom height-70 no-margin" data-url="~/noticia/upload-file" data-autostart="false">
										<div class="dz-default dz-message">
											<span><i class="mdi mdi-upload"></i>Adicionar nova imagem na noticia</span>
										</div>
										<div class="fallback">
											<input type="file" name="file" id="file">
										</div>
									</div>
								</div>
								<div class="row" id="upload-queue"></div>
							</div>
							<div class="row m-t-15">
								<div class="form-group col-md-8">
									<label class="form-label" for="cadastrado-por">Cadastrado por</label>
									<div class="controls">
										<input type="text" name="cadastrado-por" id="cadastrado-por" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group col-md-4">
									<label class="form-label" for="data-cadastro">Data de cadastro</label>
									<div class="controls">
										<input type="text" name="data-cadastro" id="data-cadastro" class="form-control" readonly>
									</div>
								</div>
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
					<input type="hidden" name="id" id="id">
					<a href="~/noticia" class="btn btn-white btn-cons" object-type="HtmlLink">Cancelar</a>
					<button class="btn btn-success btn-cons js-submit" type="submit">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</form>