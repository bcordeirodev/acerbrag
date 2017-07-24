<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="mdi mdi-church"></i>
		<h3></h3>
	</div>
	<div class="col-md-4 ">
		<div class="pull-right">
			<a href="javascript:;" id="js-edit-link" class="m-l-10 btn btn-success hide" object-type="HtmlLink"><i class="mdi mdi-file-multiple fa-white"></i> Editar</a>
			<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file text-white"></i> Histórico</a>
		</div>
	</div>
</div>
<form action="javascript:;" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-12 m-b-20">
			<div id="map" class="box-map"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title no-border clickable">
					<h4>Informações <span class="semi-bold">Básicas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-8">
							<label class="form-label" for="nome-fantasia">Nome fantasia</label>
							<div class="controls">
								<input type="text" name="nome-fantasia" id="nome-fantasia" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label class="form-label" for="data-cadastro">Data de cadastro</label>
							<div class="controls">
								<input type="text" name="data-cadastro" id="data-cadastro" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="razao-social">Razão social</label>
						<div class="controls">
							<input type="text" name="razao-social" id="razao-social" class="form-control" readonly>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="email">E-mail</label>
							<div class="controls">
								<input type="email" name="email" id="email" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="telefone">Telefone</label>
							<div class="controls">
								<input type="text" name="telefone" id="telefone" class="form-control" readonly>
							</div>
						</div>
					</div>
<!--					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="responsavel-legal">Responsável legal</label>
							<div class="controls">
								<input type="hidden" name="responsavel-legal" id="responsavel-legal" class="col-md-12 no-padding js-select" data-source="insituicao/filtrar/usuarios" placeholder="RESPONSÁVEL LEGAL">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="responsavel-comunicacao">Responsável pela comunicação</label>
							<div class="controls">
								<input type="hidden" name="responsavel-comunicacao" id="responsavel-comunicacao" class="col-md-12 no-padding js-select" data-source="insituicao/filtrar/usuarios" placeholder="RESPONSÁVEL PELA COMUNICAÇÃO">
							</div>
						</div>
					</div>-->
					<div class="row">
						<div class="col-md-6 form-group">
							<label class="form-label" for="cnpj">CNPJ</label>
							<div class="controls">
								<input type="text" name="cnpj" id="cnpj" class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-6 form-group">
							<label class="form-label" for="cnpj">Site</label>
							<div class="controls">
								<input type="text" name="site" id="site" class="form-control" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title no-border clickable">
					<h4>Informações <span class="semi-bold">Adicionais</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="form-group">
						<label class="form-label" for="sobre-nos">Sobre nós</label>
						<div class="controls">
							<textarea id="sobre-nos" name="sobre-nos" class="form-control" rows="2" readonly></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="sobre-nos">Missão</label>
						<div class="controls">
							<textarea id="missao" name="missao" class="form-control" rows="2" readonly></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="visao">Visão</label>
						<div class="controls">
							<textarea id="visao" name="visao" class="form-control" rows="2" readonly></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="valores">Valores</label>
						<div class="controls">
							<textarea id="valores" name="valores" class="form-control" rows="2" readonly></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row m-b-25">
				<div class="col-md-12 text-center">
					<img id="image-institute" style="max-width: 100%">
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4> <span class="semi-bold">Endereço</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border" id="endereco-box">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="cep">CEP</label>
							<div class="controls">
								<input type="text" name="cep" id="cep" class="form-control" maxlength="9" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="latitude">Latitude</label>
							<div class="controls">
								<input type="text" name="latitude" id="latitude" class="form-control" maxlength="9" readonly>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="longitude">Longitude</label>
							<div class="controls">
								<input type="text" name="longitude" id="longitude" class="form-control" maxlength="9" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="logradouro">Logradouro</label>
						<div class="controls">
							<input type="text" name="logradouro" id="logradouro" class="form-control" readonly>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label class="form-label" for="numero">Número</label>
							<div class="controls">
								<input type="number" name="numero" id="numero" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group col-md-9">
							<label class="form-label" for="complemento">Complemento</label>
							<div class="controls">
								<input type="text" name="complemento" id="complemento" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label class="form-label" for="uf">UF</label>
							<div class="controls">
								<select name="uf" id="uf" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="sigla" object-datasource="ufs" disabled></select>
							</div>
						</div>
						<div class="form-group col-md-5">
							<label class="form-label" for="cidade">Cidade</label>
							<div class="controls">
								<input type="hidden" name="cidade" id="cidade" class="col-md-12 no-padding js-select" data-source="instituicao/filtrar/cidades" data-second="#uf" disabled>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label class="form-label" for="bairro">Bairro</label>
							<div class="controls">
								<input type="text" name="bairro" id="bairro" class="form-control" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>