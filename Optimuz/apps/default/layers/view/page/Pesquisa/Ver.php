<div class="page-title row">
	<div class="col-md-7 no-padding">
		<i class="fa fa-search"></i>
		<h3><span class="semi-bold" id="title-head"></span> </h3>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/pesquisa" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="fa fa-arrow-left"></i> Voltar</a>
		<a href="" id="js-assign-user" class="btn btn-success" object-type="HtmlLink" title="Atribuir Usuário" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-user-plus fa-white"></i></a>
		<a href="" id="js-history-link" class="btn btn-success" object-type="HtmlLink" title="Histórico" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-file-text-o fa-white"></i></a>
		<a href="" id="js-edit-research" class="btn btn-success" object-type="HtmlLink" title="Editar" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-edit fa-white"></i></a>
		<a href="~/pesquisa/nova" id="new-research" class="btn btn-success" object-type="HtmlLink" title="Nova" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-plus fa-white" ></i></a>
	</div>
</div>
<div class="row">
		<div class="col-md-12 m-b-20">
			<div id="map" style="height: 350px"></div>
		</div>
</div>
<div class="row">
	<div class="col-md-6">

		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Dados <span class="semi-bold">Básicos</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<input type="hidden" id="pesquisa-id" name="pesquisa-id" class="hide">
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
						<label class="form-label" for="criador">Criador</label>
						<div class="controls">
							<input type="text" name="criador" id="criador" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label class="form-label" for="data-criacao">Data de criação</label>
						<div class="controls">
							<input type="text" name="data-criacao" id="data-criacao" class="form-control" readonly>
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

	</div>
	<div class="col-md-6">

		<div class="grid simple">
			<div class="grid-title no-border">
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
							<select name="abrangencia" id="abrangencia" class="col-md-12 no-padding">
								<option value="n">Nacional</option>
								<option value="e">Estadual</option>
								<option value="m">Munícipal</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6 hide" id="box-uf">
						<label class="form-label" for="uf">UF</label>
						<div class="controls">
							<select name="uf" id="uf" class="col-md-12 no-padding" data-search="true" required object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="sigla" object-datasource="ufs"></select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6 hide" id="box-cidade">
						<label class="form-label" for="cidade">Cidade</label>
						<div class="controls">
							<input type="hidden" name="cidade" id="cidade" class="col-md-12 no-padding js-select" data-source="pesquisa/filtrar/cidades" data-second="#uf">
						</div>
					</div>
				</div>
				<div class="row">
					<div id="target-audience" object-type="TargetAudienceComponent" class="col-md-12"></div>
				</div>
			</div>
		</div>

		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Perguntas <span class="semi-bold">Adicionadas</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<div class="row">
					<div class="col-md-12">
						<button type="button" class="btn btn-primary btn-large btn-block p-t-10 p-b-10" data-toggle="modal" data-target="#pre-visualizar">
							Visualizar perguntas adicionadas
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="pre-visualizar" role="dialog">
			<div class="modal-dialog width-65-percent">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-md-6">
								<h4> Formulário de <span class="semi-bold">Perguntas</span></h4>
							</div>
							<div class="col-md-6">
								<button type="button" class="close pull-right m-t-5" data-dismiss="modal">&times;</button>
							</div>
						</div>
					</div>
					<div class="modal-body" object-type="FormResearchComponent" id="questions-added"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>