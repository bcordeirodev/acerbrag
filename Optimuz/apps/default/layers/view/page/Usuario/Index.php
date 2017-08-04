<div class="page-title">
	<i class="mdi mdi-account"></i>
	<h3>Todos os <span class="semi-bold">Usuários</span></h3>
	<div class="pull-right">
		<a href="~/usuario/novo" id="js-new-user" class="btn btn-success" object-type="HtmlLink"><i class="fa fa-plus fa-white m-r-5"></i> Novo</a>
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
				<table class="table table-hover js-dynamic-table" data-source="~/usuario/listar" data-sort="false">
					<thead>
						<tr>
							<th class="th-70">&nbsp;</th>
							<th>Nombre</th>
							<th class="th-200">E-mail</th>
							<th class="th-80">Perfil</th>
							<th class="th-80">Status</th>
							<th class="th-60">
								<div object-type="ButtonGroupComponent" class="pull-right">
									<a href="~/usuario/remover" data-confirm="true" data-behavior="remove" object-type="HtmlLink"><i class="fa fa-trash-o m-r-5"></i> Remover</a>
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