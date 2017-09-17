<div class="page-title row">
	<div class="col-md-7 no-padding">
		<i class="fa fa-search"></i>
		<h3><span class="semi-bold" id="title-head"></span> </h3>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/pesquisa" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-arrow-left"></i> Voltar</a>
		<a href="" id="js-history-link" class="btn btn-success" object-type="HtmlLink" title="Histórico" data-toggle="tooltip" data-placement="bottom"><i class="mdi mdi-file-multiple text-white"></i></a>
		<a href="" id="js-edit-research" class="btn btn-success" object-type="HtmlLink" title="Editar" data-toggle="tooltip" data-placement="bottom"><i class="mdi mdi-table-edit text-white"></i></a>
		<a href="~/pesquisa/nova" id="new-research" class="btn btn-success" object-type="HtmlLink" title="Nova" data-toggle="tooltip" data-placement="bottom"><i class="mdi mdi-plus text-white" ></i></a>
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
						<label class="form-label" for="sexo-question">Pesquisa anonima</label>
						<div class="controls radio radio-success m-t-0 p-t-0">
							<input type="radio" value="1" id="anonima-sim" name="pesquisa-anonima" class="form-control" disabled>
							<label class="form-label" for="anonima-sim">Sim</label>
							<input type="radio" value="0" id="anonima-nao" name="pesquisa-anonima" class="form-control" disabled>
							<label class="form-label" for="anonima-nao">Não</label>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label class="form-label" for="sexo-question">Tipo de pesquisa</label>
						<div class="controls radio radio-success m-t-0 p-t-0">
							<input type="radio" value="L" id="pesquisa-livre" name="tipo-pesquisa" class="form-control" disabled>
							<label class="form-label" for="pesquisa-livre">Livre</label>
							<input type="radio" value="E" id="pesquisa-engajamento" name="tipo-pesquisa" class="form-control" disabled>
							<label class="form-label" for="pesquisa-engajamento">Engajamento</label>
						</div>
					</div>
				</div>
				<div class="row">
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
				<div class="form-group">
					<label class="form-label" for="data-inicio">Quantidade de pontos</label>
					<div class="controls">
						<input type="number" name="quantidade-pontos" id="quantidade-pontos" class="form-control" maxlength="255" value="0">
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
				<div class="form-group">
					<label class="form-label" for="sexo">Gênero</label>
					<div class="controls radio radio-success">
						<input type="radio" value="M" id="sexo-m" name="sexo" class="form-control" disabled>
						<label class="form-label" for="sexo-m">Masculino</label>
						<input type="radio" value="F" id="sexo-f" name="sexo" class="form-control" disabled>
						<label class="form-label" for="sexo-f">Feminino</label>
						<input type="radio" value="T" id="sexo-t" name="sexo" class="form-control" disabled>
						<label class="form-label" for="sexo-t">Todos</label>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label" for="sexo">Faixa etária</label>
					<div class="row">
						<div class="controls">
							<div class="form-group col-md-4 m-b-0">
								<label class="form-label">Idade máxima</label>
								<div class="controls">
									<select name="idade-minima" id="idade-minima" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect"></select>
								</div>
							</div>
							<div class="form-group col-md-4 m-b-0">
								<label class="form-label">Idade mínima</label>
								<div class="controls">
									<select name="idade-maxima" id="idade-maxima" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect"></select>
								</div>
							</div>
						</div>
					</div>
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