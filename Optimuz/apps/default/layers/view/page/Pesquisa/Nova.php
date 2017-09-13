<div class="page-title">
	<i class="fa fa-plus-circle"></i>
	<h3>Nova <span class="semi-bold">Pesquisa</span></h3>
	<div class="pull-right">
		<a href="~/pesquisa" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="fa fa-arrow-left"></i> Voltar</a>
	</div>
</div>
<form action="~/pesquisa/salvar" class="js-form" method="post" object-type="FormComponent">
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
						<div class="form-group col-md-12">
							<label class="form-label" for="desccricao">Descrição da pesquisa</label>
							<div class="controls">
								<textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple js-box-category">
				<div class="grid-title clickable no-border">
					<h4>Categoria de <span class="semi-bold">Perguntas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="adicionar-categoria">Adicionar categoria</label>
							<div class="controls input-group">
								<input type="text" class="form-control">
								<a name="adicionar-categoria" id="adicionar-categoria" href="javascript:;" class="input-group-addon" title="Adicionar categoria">
									<i class="fa fa-plus text-success"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple js-box-questions hide">
				<div class="grid-title clickable no-border">
					<h4>Questões da <span class="semi-bold">Pesquisa</span></h4>
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
								<select name="tipo-resposta" id="tipo-resposta" class="col-md-12 no-padding" object-type="HtmlSelect">
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
								<select name="categoria" id="categoria" class="col-md-12 no-padding" object-type="HtmlSelect"></select>
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
							<a id="add-question-btn"href="javascript:;" class="btn btn-white btn-cons pull-right js-add-question" object-type="HtmlLink">Adicionar a pesquisa</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Configuração da <span class="semi-bold">Pesquisa</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div>
						<h4>Público Alvo</h4>
						<span class="text-muted text-italic">
							Observação: A faixa etária entre os públicos alvos não podem
							cruzar-se entre si. Elas devem seguir o seguinte padrão.
							10 a 20 anos - 21 a 30 anos...
						</span>
					</div>
					<div class="row js-publico-alvo m-t-10">
						<div class="form-group col-md-3">
							<label class="form-label">Homens</label>
							<div class="controls">
								<input type="number" name="quantidade-homens" id="quantidade-homens-0" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-3">
							<label class="form-label">Mulheres</label>
							<div class="controls">
								<input type="number" name="quantidade-mulheres" id="quantidade-mulheres-0" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label class="form-label">Faixa etária</label>
							<div class="controls">
								<select name="idade-minima" id="idade-minima-0" class="col-md-6 no-padding" data-search="true" object-type="HtmlSelect"></select>
								<select name="idade-maxima" id="idade-maxima-0" class="col-md-6 no-padding" data-search="true" object-type="HtmlSelect"></select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="pull-right m-t-5 js-btns">
								<button type="button" class="btn btn-white btn-small js-add-group"><i class="fa fa-plus"></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Perguntas <span class="semi-bold">Padrões</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border js-questions">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label"><span class="js-number semi-bold"> 1 - </span>Idade</label>
							<div class="controls">
								<input type="number" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="sexo"><span class="js-number semi-bold"> 2 - </span>Sexo</label>
							<div class="controls radio radio-success m-t-0 p-t-0">
								<input type="radio" value="1" id="sexo-m" name="sexo" class="form-control">
								<label class="form-label" for="sexo-m">Masculino</label>
								<input type="radio" value="2" id="sexo-f" name="sexo" class="form-control">
								<label class="form-label" for="sexo-f">Feminino</label>
							</div>
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
					<div class="row form-actions">
						<div class="col-md-7 text-left">
							<p class="text-danger font-12 no-margin no-padding">
								<i class="fa fa-asterisk" aria-hidden="true"></i>
								Perguntas obrigatórias.
							</p>
							<p class="text-warning font-12 no-margin no-padding">
								<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
								Perguntas com exceção.
							</p>
							<p class="text-info font-12 no-margin no-padding">
								<i class="fa fa-paperclip font-15" aria-hidden="true"></i>
								Subpergunta.
							</p>
						</div>
						<div class="col-md-5 text-right">
							<button type="button" class="btn btn-primary js-btn-pre m-t-10" data-toggle="modal" data-target="#pre-visualizar">
								Pré Visualizar
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="pre-visualizar" role="dialog">
				<div class="modal-dialog" style="width: 65%">
					<div class="modal-content">
						<div class="modal-header">
							<div class="row">
								<div class="col-md-6">
									<h4>Formulário de <span class="semi-bold">Perguntas</span></h4>
									<h5>(formulário que será apresentado ao pesquisador)</h5>
								</div>
								<div class="col-md-6">
									<button type="button" class="close pull-right m-t-5" data-dismiss="modal">&times;</button>
								</div>
							</div>
						</div>
						<div class="modal-body">
							<div class="grid simple border-solid">
								<div class="grid-title no-border">
									<h4>Perguntas Padrões</h4>
								</div>
								<div class="grid-body no-border">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="form-label"><span class="semi-bold"> 1 - </span>Idade</label>
											<div class="controls">
												<input type="number" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="form-label" for="sexo"><span class="semi-bold"> 2 - </span>Sexo</label>
											<div class="controls radio radio-success">
												<input type="radio" name="sexo" class="form-control" disabled>
												<label class="form-label" for="sexo-m">Masculino</label>
												<input type="radio" name="sexo" class="form-control" disabled>
												<label class="form-label" for="sexo-f">Feminino</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
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
					<a href="~/pesquisa" class="btn btn-white btn-cons" object-type="HtmlLink">Cancelar</a>
					<button class="btn btn-success btn-cons js-submit" type="submit">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</form>