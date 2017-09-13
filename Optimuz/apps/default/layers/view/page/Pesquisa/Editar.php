<div class="page-title row">
	<div class="col-md-7 no-padding">
		<i class="fa fa-edit"></i>
		<h3> Editar <span class="semi-bold" id="title-head"></span> </h3>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/pesquisa" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="fa fa-arrow-left"></i> Voltar</a>
		<a href="" id="js-assign-user" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-user-plus fa-white"></i> Atribuir Usuário</a>
		<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-file-text-o fa-white"></i> Histórico</a>
		<a href="~/pesquisa/nova" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-plus fa-white"></i> Nova</a>
	</div>
</div>

<form action="~/pesquisa/atualizar" id="form-pesquisa-editar" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-12 m-b-20">
			<div id="map" style="height: 300px"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Dados <span class="semi-bold">Básicos</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<input type="hidden" id="pesquisa-id" name="pesquisa-id">
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="titulo">Título</label>
							<div class="controls">
								<input type="text" name="titulo" id="titulo" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="data-inicio">Data de início</label>
							<div class="controls">
								<input type="text" name="data-inicio" id="data-inicio" class="form-control datepicker" maxlength="10" required>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="data-fim">Data de término</label>
							<div class="controls">
								<input type="text" name="data-fim" id="data-fim" class="form-control datepicker" maxlength="10" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="latitude">Latitude</label>
							<span class="help"> ex. 7.569 </span>
							<div class="controls">
								<input type="text" id="latitude" name="latitude" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="longitude">Longitude</label>
							<span class="help"> ex. -45.889 </span>
							<div class="controls">
								<input type="text" id="longitude" name="longitude" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="area-limite">Aréa limite</label>
							<span class="help"> ex. -2.3 (km) </span>
							<div class="controls">
								<input type="text" id="area-limite" name="area-limite" class="form-control" required>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="status">Status</label>
							<div class="controls">
								<select name="status" id="status" class="col-md-12 no-padding">
									<option value="1">Ativa</option>
									<option value="0">Inativa</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="desccricao">Descrição da pesquisa</label>
							<div class="controls">
								<textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Configuração da <span class="semi-bold">Pesquisa</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="abrangencia">Abrangência</label>
							<div class="controls">
								<select name="abrangencia" id="abrangencia" class="col-md-12 no-padding" disabled="disabled">
									<option value="n">Nacional</option>
									<option value="e">Estadual</option>
									<option value="m">Munícipal</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6 hide" id="box-uf">
							<label class="form-label" for="uf">UF</label>
							<div class="controls">
								<select name="uf" id="uf" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="sigla" object-datasource="ufs" disabled="disabled"></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 hide" id="box-cidade">
							<label class="form-label" for="cidade">Cidade</label>
							<div class="controls">
								<input type="hidden" name="cidade" id="cidade" class="col-md-12 no-padding js-select" data-source="pesquisa/filtrar/cidades" data-second="#uf" disabled="disabled">
							</div>
						</div>
					</div>
					<div class="row">
						<div id="target-audience" object-type="TargetAudienceComponent" class="col-md-12"></div>
					</div>
				</div>
			</div>

			<div class="grid simple js-box-category">
				<div class="grid-title clickable no-border">
					<h4>Adicionar <span class="semi-bold">Categoria</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-12">
							<div class="controls input-group row">
								<input type="text" class="form-control" placeholder="Nome da categoria">
								<a name="adicionar-categoria" id="adicionar-categoria" href="javascript:;" class="input-group-addon" title="Adicionar categoria">
									<i class="fa fa-plus text-success"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="disable-box-questions" class="grid simple js-box-questions">
				<div class="grid-title clickable no-border">
					<h4>Adicionar <span class="semi-bold">Pergunta</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="pergunta">Pergunta</label>
							<div class="controls">
								<input type="text" name="pergunta" id="pergunta" class="form-control height-50 font-18">
							</div>
						</div>
					</div>

					<div class="row js-selects">
						<div class="form-group col-md-6">
							<label class="form-label" for="tipo-resposta">Tipo de resposta</label>
							<div class="controls">
								<select id="tipo-resposta" class="col-md-12 no-padding" object-type="HtmlSelect">
									<option value="1">Texto</option>
									<option value="2">Número</option>
									<option value="3">Múltipla Escolha</option>
									<option value="5">Múltipla Escolha c/ Imagem</option>
									<option value="4">Opção Única</option>
									<option value="6">Opção Única c/ Imagem</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="categoria">Categoria</label>
							<div class="controls">
								<select name="categoria" id="categoria" class="col-md-12 no-padding" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="nome" object-datasource="categorias"></select>
							</div>
						</div>
					</div>

					<div class="row js-excecao hide">
						<div class="form-group col-md-6">
							<label class="form-label" for="tipo-excecao">Tipo de exceção</label>
							<div class="controls">
								<select name="tipo-excecao" id="tipo-excecao" class="col-md-12 no-padding" object-type="HtmlSelect">
									<option value="">Sem exceção</option>
									<option value="1">Encerrar Pesquisa</option>
									<option value="2">Exibir Subperguntas</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6 js-opcao-excecao hide">
							<label class="form-label" for="opcao-excecao">Opção que ativa exceção</label>
							<div class="controls">
								<select name="opcao-excecao" id="opcao-excecao" class="col-md-12 no-padding" object-type="HtmlSelect">
									<option value="">Escolha a opção</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row js-subpergunta hide">
						<div class="form-group col-md-6">
							<label class="form-label" for="sub-pergunta">Sub Pergunta</label>
							<div class="controls">
								<select name="sub-pergunta" id="sub-pergunta" class="col-md-12 no-padding" object-type="HtmlSelect">
									<option value="0">Não</option>
									<option value="1">Sim</option>
								</select>
							</div>
						</div>
						<div class="form-group col-md-6 js-pergunta-mae hide">
							<label class="form-label" for="pergunta-mae">Pergunta Mãe</label>
							<div class="controls">
								<select name="pergunta-mae" id="pergunta-mae" class="col-md-12 no-padding" object-type="HtmlSelect">
									<option value="">Escolha a pergunta</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row js-present-response">
						<div class="form-group col-md-12">
							<label for="desccricao" class="form-label">TIPO DE RESPOSTA</label>
							<div class="controls">
								<input type="text" readonly="" placeholder="RESPOSTA DE TIPO TEXTO" class="form-control text-center">
							</div>
						</div>
					</div>
					<div class="row js-input-response"></div>
					<div class="row form-actions">
						<div class="controls col-md-7 m-t-5">
							<div class="controls checkbox check-success js-tip-obrigatoria" data-toggle="tooltip" data-placement="top" title="Desmarcado significa que esta pergunta não será obrigatória.">
								<input type="checkbox" name="obrigatoria" id="obrigatoria" class="js-option" value="1" checked>
								<label class="form-label" for="obrigatoria">Pergunta Obrigatória</label>
							</div>
						</div>
						<div class="controls col-md-5 m-t-5">
							<a id="add-question-btn"href="javascript:;" class="btn btn-white btn-cons pull-right js-add-question" object-type="HtmlLink">Adicionar</a>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple box-questions-added hide">
				<div class="grid-title no-border">
					<h4>Perguntas <span class="semi-bold">Adicionadas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border clearfix">
					<div class="js-questions-added"></div>
					<div class="row form-actions text-center">
						<p class="text-danger font-12 no-margin no-padding col-md-4">
							<i class="fa fa-asterisk" aria-hidden="true"></i>
							Perguntas obrigatórias.
						</p>
						<p class="text-warning font-12 no-margin no-padding col-md-4">
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
							Perguntas com exceção.
						</p>
						<p class="text-info font-12 no-margin no-padding col-md-4">
							<i class="fa fa-paperclip font-15" aria-hidden="true"></i>
							Subpergunta.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="grid simple box-questions-added">
				<div class="grid-title clickable no-border">
					<h4>Perguntas <span class="semi-bold">Cadastradas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div id="listagem-pesquisa" class="grid-body no-border" object-type="FormResearchComponent">
					<p id="aviso"></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-actions">
				<div class="pull-right">
					<a href="~/pesquisa" class="btn btn-white btn-cons" object-type="HtmlLink">Cancelar</a>
					<button class="btn btn-success btn-cons js-submit" type="submit">Salvar Alterações</button>
				</div>
			</div>
		</div>
	</div>

	<div id="removeds-options" class="hide"></div>
	<div id="removeds-questions" class="hide"></div>

</form>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Anexar imagem da alternativa</h4>
      </div>
      <div class="modal-body">
		<form action="~/pesquisa/upload-imagem" id="upload-image" class="js-form dropzone my-upload" method="post" object-type="FormComponent" enctype="multipart/form-data">
			<div id="js-add-imagem" class="text-center">
				<div class="no-margin col-md-12 text-center">
					<div class="fallback">
						<input type="file" name="file" id="file">
					</div>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary js-image-done">Concluir</button>
      </div>
    </div>
  </div>
</div>