<div class="row">
	<div class="col-md-6">
		<div class="page-title">
			<i class="mdi mdi-puzzle"></i>
			<h3>Gestionar <span class="semi-bold">Perfiles</span></h3>
		</div>
	</div>
	<div class="col-md-6 text-right">
		<a href="javascript:;" id="js-new-user" class="m-l-10 btn btn-primary" object-type="HtmlLink" data-toggle="modal" data-target="#novo-perfil">
			<i class="mdi mdi-plus fa-white"></i>
			Nuevo Perfil
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Perfiles <span class="semi-bold">Añadidos</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<ul class="list-group clickable-list" id="box-profiles"></ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Permisos <span class="semi-bold">Asignados</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">
				<div class="form-group m-b-15">
					<div class="controls">
						<div class="row checklist" id="box-permissions"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success btn-lg btn-block btn-update-profile" type="submit">Actualizar permisos de perfil</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal de novo perfil -->
<div id="novo-perfil" class="modal fade" role="dialog">
	<div class="modal-dialog width-50-percent">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Novo <span class="semi-bold">Perfil</h4>
			</div>
			<div class="modal-body p-b-0">
				<div class="form-group">
					<h5>Nome do <span class="semi-bold">Perfil</h5>
					<div class="help">
						Nome do perfil que será usado para adicionar aos usuários.
					</div>
					<div class="controls">
						<input type="text" name="nome-perfil" id="nome-perfil" class="form-control">
					</div>
				</div>
				<div class="form-group m-b-0">
					<h5>Permissões <span class="semi-bold">Disponiveis</h5>
					<div class="help">
						Permissões que o perfil terá acesso.
					</div>
					<div class="controls">
						<div class="row checklist" id="box-new-permissions"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white btn-cons-md" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-success btn-cons-md js-new-profile">Salvar</button>
			</div>
		</div>
	</div>
</div>