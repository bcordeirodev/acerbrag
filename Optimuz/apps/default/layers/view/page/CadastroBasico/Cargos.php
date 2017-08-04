<div class="page-title">
	<i class="mdi mdi-puzzle"></i>
	<h3><span class="semi-bold">Cargos</span></h3>
</div>
<div class="row">
	<div class="col-md-6">
		<form action="~/cadastro-basico/salvar" class="js-form" method="post" object-type="FormComponent">
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Nuevo <span class="semi-bold">Cargo</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="form-group">
						<label class="form-label" for="nome">Nombre</label>
						<div class="controls">
							<input type="text" name="nome" id="nome" class="form-control" required>
						</div>
					</div>
					<div class="form-actions">
						<div class="pull-right">
							<input type="hidden" name="cadastro" value="cargos" required>
							<input type="hidden" name="id" value="">
							<button class="btn btn-white btn-cons" type="reset">Reiniciar</button>
							<button class="btn btn-success btn-cons js-submit" type="submit">Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div>
			<h4 class="no-padding no-margin">
				<i class="mdi mdi-information m-r-5"></i> Edición de registros
			</h4>
			<p class="m-t-10">
				Para editar un registro de la tabla, haga doble clic en el
				nombre o el valor. Al finalizar los cambios, pulse ENTER para
				confirmar. Para cancelar la edición, presione ESC o haga clic
				fuera del campo.
			</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Cargos <span class="semi-bold">Cadastrados</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<table class="table table-hover js-dynamic-table" data-source="listar/cargos" data-sort="false">
					<thead>
						<tr>
							<th>Nombre</th>
							<th class="th-100">Acciones</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>