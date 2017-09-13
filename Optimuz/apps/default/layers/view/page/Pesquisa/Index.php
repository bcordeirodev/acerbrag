<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="fa fa-search"></i>
		<h3>Todas as <span class="semi-bold">Pesquisas</span></h3>
	</div>
	<div class="col-md-4 text-right no-padding">
		<a href="~/pesquisa/nova" class="btn btn-success" object-type="HtmlLink"><i class="mdi mdi-plus fa-white m-r-5"></i> Nueva</a>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div object-type="FilterContainerComponent"></div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="grid simple">
            <div class="grid-title no-border"></div>
            <div class="grid-body no-border">
				<table class="table table-hover js-dynamic-table" data-source="~/pesquisa/listar">
					<thead>
						<tr>
							<th>Título</th>
							<th class="th-100">Data de Início</th>
							<th class="th-100">Data Final</th>
							<th class="th-250">Descrição</th>
							<th class="th-70">Situação</th>
							<th class="th-150">Ações</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
            </div>
		</div>
	</div>
</div>