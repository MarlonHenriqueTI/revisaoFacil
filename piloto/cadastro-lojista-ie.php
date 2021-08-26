<?php 
include('header.php');

$cnpj = $_GET['cnpj'];
$razao_social = $_GET['razao_social'];
$email = $_GET['email'];
$id = $_GET['id'];
$regime = $_GET['regime'];
$oferece = $_GET['oferece'];
$contribuinte = $_GET['contribuinte'];

?>

<section id="cadastro-dados-regime">
		<div class="row" id="dados-regime">
			<div class="col-md-8 bg-cinza-escuro">
				<div class="row">
					<h2>Adicione os dados de inscrição</h2>
				</div>
				<form action="cadastro-lojista-faturamento.php" method="POST">
				<div class="quadro-branco">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="ie" id="ie" onblur="validarCampos()" onkeyup="validarCampos()">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Numero da Inscrição Estadual</label>
							    </div>
							</div>
							<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="im">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>Numero da Inscrição Municipal</label>
							    </div>
							</div>
						</div>
							<div class="form-check">
								  <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="isento" value="1" onchange="validarCampos()">
								  <label class="form-check-label" for="flexCheckChecked" id="isento-check">
								    Isento de Inscrição Estadual
								  </label>
							</div>
							<input type="hidden" value="<?php echo $cnpj; ?>" name="cnpj">
							<input type="hidden" value="<?php echo $razao_social; ?>" name="razao_social">
							<input type="hidden" value="<?php echo $email; ?>" name="email">
							<input type="hidden" value="<?php echo $id; ?>" name="id">
							<input type="hidden" value="<?php echo $regime; ?>" name="regime">
							<input type="hidden" value="<?php echo $oferece; ?>" name="oferece">
							<input type="hidden" value="<?php echo $contribuinte; ?>" name="contribuinte">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-end">
						<button class="btn btn-secondary" type="submit" id="botao-continuar" disabled="">CONTINUAR</button>
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