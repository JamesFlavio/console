            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cadastro de fornecedores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Cadastros
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Fornecedores
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form role="form">
						
							<div class="form-group has-warning">
								<label>Tipo de fornecedor.</label>
								<select class="form-control">
									<option>PF - Pessoa Física</option>
									<option>PJ - Pessoa Jurídica</option>
								</select>
							</div>
						
							<div class="form-group has-warning">
								<label>UF</label>
								<select class="form-control">
									<option>DF - Distrito Federal</option>
									<option>GO - Goiás</option>
								</select>
							</div>

							<div class="form-group has-warning">
								<label> CPF</label>
								<input type="text" class="form-control" placeholder="CPF">
							</div>
							
							<div class="form-group has-warning">
								<label for="rg"> RG</label>
								<input type="text" name="rg" class="form-control" placeholder="RG">
							</div>
							
							<div class="form-group has-warning">
								<label> Nome</label>
								<input type="text" class="form-control" placeholder="Nome">
							</div>
							
							<div class="form-group">
								<label> Sobrenome</label>
								<input type="text" class="form-control" placeholder="Sobrenome">
							</div>

							<div class="form-group">
								<label>Apelido</label>
								<input type="text" class="form-control" placeholder="Apelido">
							</div>
<hr>
							<div class="form-group has-warning">
								<label>CEP</label>
								<input type="text" class="form-control" placeholder="CEP">
							</div>

							<div class="form-group has-warning">
								<label>Endereço</label>
								<input type="text" class="form-control" placeholder="Endereço">
							</div>

							<div class="form-group has-warning">
								<label>Número</label>
								<input type="text" class="form-control" placeholder="Número">
							</div>

							<div class="form-group has-warning">
								<label>Bairro</label>
								<input type="text" class="form-control" placeholder="Bairro">
							</div>

							<div class="form-group">
								<label>Complemento</label>
								<input type="text" class="form-control" placeholder="Complemento">
							</div>
<hr>
							<div class="form-group has-warning">
								<label>Telefone fixo</label>
								<input type="text" class="form-control" placeholder="Telefone fixo">
							</div>
							
							<div class="form-group">
								<label>Fax</label>
								<input type="text" class="form-control" placeholder="Fax">
							</div>

							<div class="form-group">
								<label>Celular</label>
								<input type="text" class="form-control" placeholder="Celular">
							</div>

							<div class="form-group">
								<label>Responsável</label>
								<input type="text" class="form-control" placeholder="Responsável">
							</div>

							<div class="form-group">
								<label>Site</label>
								<input type="text" class="form-control" placeholder="Site">
							</div>

							<div class="form-group input-group has-warning">
								<span class="input-group-addon">@</span>
								<input type="text" class="form-control" placeholder="E-mail">
							</div>

							<div class="form-group">
								<label>Tabela de preços</label>
								<select class="form-control">
									<option>01 - Consumidor Final</option>
									<option>02 - Revenda</option>
								</select>
							</div>

							<div class="form-group">
								<label>Vendedor</label>
								<select class="form-control">
									<option>Selecione um vendedor</option>
									<option>01 - João</option>
									<option>02 - Pedro</option>
								</select>
							</div>

                            <div class="form-group">
                                <label>Arquivos</label>
                                <input type="file">
                            </div>

                            <div class="form-group">
                                <label>Observações</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Assinaturas</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Novidades
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Promoções
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
