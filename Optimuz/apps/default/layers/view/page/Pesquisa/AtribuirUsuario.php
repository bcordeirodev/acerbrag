<div class="page-title row">
	<div class="col-md-7 no-padding">
			<h3>Atruibuição de <span class="semi-bold">Pesquisadores</span></h3>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/pesquisa" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="fa fa-arrow-left"></i> Voltar</a>
		<a href="~/pesquisa" id="js-edit-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-pencil fa-white"></i> Editar</a>
		<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-file-text-o fa-white"></i> Histórico</a>
		<a href="~/pesquisa/nova" id="js-new-research" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-plus fa-white"></i> Nova</a>
	</div>
</div>

<div class="row">
	<input type="hidden" id="pesquisa-id" name="pesquisa-id">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Informações da <span class="semi-bold"> Pesquisa</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<ol class="list-unstyled">
					<li class="col-md-12">
						<h3><span class="semi-bold" id="pesquisa-title"></span></h3>
					</li>
					<li class="col-md-6">
						<h4>
							Inicia em: <span class="semi-bold" id="start-date"></span>
						</h4>
					</li>
					<li class="col-md-6">
						<h4>
							Termina em: <span class="semi-bold" id="date-end"></span>
						</h4>
					</li>
					<li class="col-md-12">
						<h4 id="description">
							Descrição: <br>
						</h4>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Usuários <span class="semi-bold">Adicionados</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<table class="table table-hover" data-sort="false">
					<thead>
						<tr>
							<th class="th-50">&nbsp;</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="usuarios-adicionados">
						<tr class="js-tr-temp">
							<td colspan="3"> Nenhum usuário adicionado</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Adicionar <span class="semi-bold">Pequisadores</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
<!--				<div class="row">
					<div class="form-group col-md-12">
						<div class="controls">
							<input type="text" id="busca-usuario" name="busca-usuario" class="form-control text-center" placeholder="Nome ou CPF do pesquisador">
						</div>
					</div>
				</div>-->
<!--				<table class="table table-hover" data-sort="false">
					<thead>
						<tr>
							<th class="th-200">Nome</th>
							<th class="th-200">CPF</th>
							<th>Remover</th>
						</tr>
					</thead>
					<tbody id="lista-usuarios">
						<tr>
						   <td colspan="3">Nenhum usuário encontrado</td>
						</tr>
					</tbody>
				</table>-->
				<table class="table table-hover js-dynamic-table multi-actions" data-source="" data-sort="false">
					<thead>
						<tr>
							<th class="th-50">&nbsp;</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

