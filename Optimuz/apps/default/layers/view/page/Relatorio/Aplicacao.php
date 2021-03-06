<div class="page-title">
	<i class="mdi mdi-chart-bar"></i>
	<h3>Relatório <span class="semi-bold">por Aplicação</span></h3>
<!--	<div class="pull-right">
		<a href="~/relatorio" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="fa fa-arrow-left"></i> Voltar</a>
	</div>-->
</div>
<form action="~/relatorio/filtra-pesquisas-data" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Selecione um <span class="semi-bold">Período</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<p>O sistema irá buscar pelas pesquisas que tenham coletas e sua data de inicio esteja dentro do periodo inserido.</p>
					<div class="form-group">
						<label class="form-label" for="data-inicio">Data de início</label>
						<div class="controls">
							<input type="text" name="data-inicio" id="data-inicio" class="form-control datepicker" maxlength="10" required value="11/08/2016">
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="data-fim">Data de término</label>
						<div class="controls">
							<input type="text" name="data-fim" id="data-fim" class="form-control datepicker" maxlength="10" required value="11/08/2016">
						</div>
					</div>
					<div class="form-group text-right">
						<input type="hidden" name="view" id="view" value="aplicacao" />
						<button class="btn btn-success btn-cons-md js-submit" type="submit">Filtrar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Pesquisas <span class="semi-bold">Encontradas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div id="filtro-pesquisas">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Pesquisa</th>
									<th class="w-100">Ações</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>