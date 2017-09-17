<div class="page-title">
	<i class="mdi mdi-gift"></i>
	<h3>Todos os <span class="semi-bold">Prêmios</span></h3>
	<div class="pull-right">
		<a href="~/premio/novo" class="btn btn-success" object-type="HtmlLink"><i class="mdi mdi-plus text-white m-r-5"></i> Nuevo</a>
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
				<table class="table table-hover js-dynamic-table" data-source="~/premio/listar-todos" data-sort="false">
					<thead>
						<tr>
							<th>Título</th>
							<th class="th-80">Data de cadastro</th>
							<th class="th-80">Cadastro por</th>
							<th class="th-80">Status</th>
							<th class="th-80">
								<div object-type="ButtonGroupComponent" class="pull-right"></div>
							</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
            </div>
		</div>
	</div>
</div>