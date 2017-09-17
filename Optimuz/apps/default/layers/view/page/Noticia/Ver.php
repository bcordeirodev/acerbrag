<div class="page-title row">
	<div class="col-md-7 no-padding">
		<i class="mdi mdi-newspaper"></i>
		<h3></h3>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/noticia" id="js-back-link" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-arrow-left"></i> Voltar</a>
		<a href="~/noticia/nova" id="js-new-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-plus text-white"></i> Nova</a>
		<a href="" id="js-edit-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file-multiple text-white"></i> Editar</a>
		<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file text-white"></i> Histórico</a>
	</div>
</div>
<form action="javascript:;" class="js-form" method="post" object-type="FormComponent">
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
							<div class="form-group">
								<label class="form-label" for="uf">Lugar a apresentar</label>
								<i object-type="RequiredFieldIndicatorComponent"></i>
								<span class="help">Instituição ou filiais em que o conteúdo será apresentado</span>
								<div class="controls">
									<select name="igrejas[]" id="igrejas" class="col-md-12 no-padding" data-search="true" multiple object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="razaoSocial" object-datasource="igrejas"></select>
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
</form>