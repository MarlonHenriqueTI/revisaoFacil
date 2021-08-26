<?php 
include('header.php');

$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];
$email = $_POST['email'];
$id = $_POST['id'];
$regime = $_POST['regime'];
$oferece = $_POST['oferece'];
$contribuinte = $_POST['contribuinte'];
$ie = $_POST['ie'];
$im = $_POST['im'];
$isento = $_POST['isento'];

?>

<section id="cadastro-dados-regime">
		<div class="row" id="dados-regime">
			<div class="col-md-8 bg-cinza-escuro">
				<div class="row">
					<h2>Qual é a data de fundação da sua empresa?</h2>
				</div>
				<form action="cadastro-lojista-confirmar.php" method="POST">
				<div class="quadro-branco">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="date" name="fundacao">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Data de fundação da empresa</label>
							    </div>
							</div>
						</div>
							<input type="hidden" value="<?php echo $cnpj; ?>" name="cnpj">
							<input type="hidden" value="<?php echo $razao_social; ?>" name="razao_social">
							<input type="hidden" value="<?php echo $email; ?>" name="email">
							<input type="hidden" value="<?php echo $id; ?>" name="id">
							<input type="hidden" value="<?php echo $regime; ?>" name="regime">
							<input type="hidden" value="<?php echo $oferece; ?>" name="oferece">
							<input type="hidden" value="<?php echo $contribuinte; ?>" name="contribuinte">
							<input type="hidden" value="<?php echo $ie; ?>" name="ie">
							<input type="hidden" value="<?php echo $im; ?>" name="im">
							<input type="hidden" value="<?php echo $isento; ?>" name="isento">
					</div>
				</div>
				<div class="row">
					<h2>Qual é o endereço de faturamento?</h2>
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
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="celular" required class="celular">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Celular para contato</label>
							    </div>
							</div>
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="telefone" required class="telefone">
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
								    Quero receber informações por SMS ou Whatsapp.
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-end">
						<button class="btn btn-secondary" type="submit" id="botao-continuar">Salvar</button>
					</div>
				</div>
				</form>				
			</div>
			<!-- Dados da empresa -->
			<div class="col-md-4 bg-cinza-claro">
				<p><b>Dados da empresa</b></p>
				<div class="row">
					<div class="col-12">
						<small class="apagadim">E-mail</small>
						<p class="caixa-alta"><b><?php echo $email; ?></b></p>
					</div>
					<div class="col-12">
						<small class="apagadim">Razão Social</small>
						<p class="caixa-alta"><?php echo $razao_social; ?></p>
					</div>
					<div class="col-12">
						<small class="apagadim">CNPJ</small>
						<p class="caixa-alta"><?php echo $cnpj?></p>
					</div>
				</div>
			</div>
		</div>
</section>

<?php include('footer.php'); ?>