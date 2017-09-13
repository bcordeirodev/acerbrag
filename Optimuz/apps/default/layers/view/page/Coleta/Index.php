<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="fa fa-file-text-o"></i>
		<h3><span class="semi-bold">Coletas</span></h3>
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
				<table class="table table-hover multi-actions js-dynamic-table" data-source="~/coleta/listar" data-sort="false">
					<thead>
						<tr>
							<th class="th-50">
								<span object-type="CheckAllComponent"></span>
							</th>
							<th class="th-90">Nº Pesquisa</th>
							<th class="th-90">Nº Coleta</th>
							<th>Título da Pesquisa</th>
							<th class="th-220">Pesquisador</th>
							<th class="th-120">Data da coleta</th>
							<th class="th-60">
								<div object-type="ButtonGroupComponent">
									<a href="~/coleta/excluir-coleta" data-confirm="true" data-behavior="remove" object-type="HtmlLink"><i class="fa fa-trash-o m-r-5"></i> Remover</a>
									<a href="~/coleta/auditar" data-confirm="true" data-behavior="auditar" object-type="HtmlLink"><i class="fa fa-gavel m-r-5"></i> Auditar</a>
								</div>
							</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
            </div>
		</div>
	</div>
</div>