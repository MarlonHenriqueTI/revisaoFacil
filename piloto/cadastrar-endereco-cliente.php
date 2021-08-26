<?php 
include('header.php');

$nome = $_POST['nome'];
$id_cliente = $_POST['id_cliente'];
$email = $_POST['email'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];

?>

<section id="cadastro-dados-regime">
		<div class="row" id="dados-regime">
			<div class="col-md-8 bg-cinza-escuro">
				<div class="row">
					<h2>Qual é a sua data de nascimento?</h2>
				</div>
				<form action="finalizacao.php" method="POST">
				<div class="quadro-branco">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="date" name="nascimento">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Data de nascimento</label>
							    </div>
							</div>
						</div>
						<input type="hidden" name="nome" value="<?php echo $nome; ?>">
						<input type="hidden" name="email" value="<?php echo $email; ?>">
						<input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
						<input type="hidden" name="sobrenome" value="<?php echo $sobrenome; ?>">
						<input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
					</div>
				</div>
				<div class="row">
					<h2>Qual é o seu endereço?</h2>
				</div>
				<div class="quadro-branco">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="cep" required id="cep" class="mascCEP" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" >
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>CEP</label>
							    </div>
							</div>
							<div class="col-md-6">
								<a href="https://buscacepinter.correios.com.br/app/localidade_logradouro/index.php" target="_blank">Não sei o meu CEP</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="uf" required id="uf" size="2">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Estado</label>
							    </div>
							</div>
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="cidade" required id="cidade">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Cidade</label>
							    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="group">      
							      <input type="text" name="rua" required id="rua">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Rua/Avenida</label>
							    </div>
							</div>					
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="bairro" required id="bairro">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Bairro</label>
							    </div>
							</div>
							<div class="col-md-3">
								<div class="group">      
							      <input type="number" name="numero">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Numero</label>
							    </div>
							</div>
							<div class="col-md-3">
								<div class="form-check">
									  <input class="form-check-input" type="checkbox" id="chekazul" name="sn" value="1">
									  <label class="form-check-label" for="flexCheckChecked" id="checkazul-label">
									    Sem numero
									  </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="complemento">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Complemento</label>
							    </div>
							</div>
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="referencia">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Ponto de referencia</label>
							    </div>
							</div>
						</div>
						<div class="row">	
							<div class="form-check" style="margin-bottom: 30px;">
								  <input class="form-check-input" type="checkbox" id="chk-endereco" name="chkendereco" value="1" onchange="exibirEnderecoEntrega()"  onclick="exibirEnderecoEntrega()">
								  <label class="form-check-label" for="flexCheckChecked" id="checkazul-label">
								    Cadastrar outro endereço para entrega
								  </label>
							</div>
						</div>	
						<div id="oculto-endereco">	
							<div class="row">
								<div class="col-md-6">
									<div class="group">      
								      <input type="text" name="cep_entrega" id="cep_entrega" class="mascCEPentrega" value="" size="10" maxlength="9" onblur="pesquisacepentrega(this.value);" >
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>CEP</label>
								    </div>
								</div>
								<div class="col-md-6">
									<a href="https://buscacepinter.correios.com.br/app/localidade_logradouro/index.php" target="_blank">Não sei o meu CEP</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="group">      
								      <input type="text" name="uf_entrega" id="uf_entrega" size="2">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Estado</label>
								    </div>
								</div>
								<div class="col-md-6">
									<div class="group">      
								      <input type="text" name="cidade_entrega" id="cidade_entrega">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Cidade</label>
								    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="group">      
								      <input type="text" name="rua_entrega" id="rua_entrega">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Rua/Avenida</label>
								    </div>
								</div>					
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="group">      
								      <input type="text" name="bairro_entrega" id="bairro_entrega">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Bairro</label>
								    </div>
								</div>
								<div class="col-md-3">
									<div class="group">      
								      <input type="number" name="numero_entrega">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Numero</label>
								    </div>
								</div>
								<div class="col-md-3">
									<div class="form-check">
										  <input class="form-check-input" type="checkbox" id="chekazul-entrega" name="sn_entrega" value="1">
										  <label class="form-check-label" for="flexCheckChecked" id="checkazul-label">
										    Sem numero
										  </label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="group">      
								      <input type="text" name="complemento_entrega">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Complemento</label>
								    </div>
								</div>
								<div class="col-md-6">
									<div class="group">      
								      <input type="text" name="referencia_entrega">
								      <span class="highlight"></span>
								      <span class="bar"></span>
								      <label>Ponto de referencia</label>
								    </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="celular" class="celular">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Celular para contato</label>
							    </div>
							</div>
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="telefone" class="telefone">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Telefone fixo para contato</label>
							    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" id="flexCheckChecked" checked name="receber_informacoes" value="1">
								  <label class="form-check-label" for="flexCheckChecked" id="receber-informações">
								    Quero receber descontos, ofertas e informações por SMS ou Whatsapp.
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-secondary" type="submit" id="botao-continuar">Salvar</button>
						<a href="#">Cancelar</a>
					</div>
				</div>
				</form>				
			</div>
			<!-- Dados da empresa -->
			<div class="col-md-4 bg-cinza-claro">
				<p><b>Seus dados</b></p>
				<div class="row">
					<div class="col-12">
						<small class="apagadim">Nome</small>
						<p class="caixa-alta"><b><?php echo $nome; ?></b></p>
					</div>
					<div class="col-12">
						<small class="apagadim">E-mail</small>
						<p class="caixa-alta"><?php echo $email; ?></p>
					</div>
					<div class="col-12">
						<small class="apagadim">CPF</small>
						<p class="caixa-alta"><?php echo $cpf?></p>
					</div>
				</div>
			</div>
		</div>
</section>

<?php include('footer.php'); ?>