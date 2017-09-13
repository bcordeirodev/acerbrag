<div class="page-title row">
	<div class="col-md-7 no-padding">
		<i class="fa fa-file-text-o"></i>
		<h3>Coleta - <span id="research-title" class="semi-bold"></span></h3>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/coleta" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="fa fa-arrow-left"></i> Voltar</a>
		<a href="" id="js-research-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-search fa-white"></i> Ver Pesquisa</a>
		<a href="" id="js-user-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-user fa-white"></i> Ver Pesquisador</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Informações da <span class="semi-bold">Coleta</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="grid-body no-border">

				<div class="row">
					<div class="col-md-7">
						<h3>Pesquisador:
							<span id="user-name" class="semi-bold"></span>
						</h3>
					</div>
					<div class="col-md-5 text-right">
						<button type="button" class="btn btn-primary btn-large p-t-10 p-b-10" data-toggle="modal" data-target="#pre-visualizar">
							Ver Respostas
						</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="map" style="height: 425px"></div>
					</div>
				</div>
				<div class="row" id="box-gravacao">
					<div class="col-md-12 m-t-10">
						<div class="row">
							<div class="col-md-6">
								<h4><span class="semi-bold">Gravação</span></h4>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<h4> Começou as: <span id="time-start" class="semi-bold"></span></h4>
									</div>
									<div class="col-md-6">
										<h4> Terminou as: <span id="time-final" class="semi-bold"></span></h4>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<audio controls class="width-100-percent">
									<source type="audio/mpeg" />
								</audio>
							</div>
						</div>
					</div>
				</div>
				<div class="text-right">
					<h5> Coleta feita em <span id="date-collect" class="semi-bold"></span></h5>
				</div>
			</div>
		</div>
	</div>

	</div>

<div class="row">
	<div class="col-md-12 ">
		<div class="modal fade" id="pre-visualizar" role="dialog">
			<div class="modal-dialog width-65-percent">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-md-6">
								<h4> Formulário <span class="semi-bold">Respondido</span></h4>
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
