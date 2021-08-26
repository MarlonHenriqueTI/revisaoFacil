<?php 
include('header.php');

$cnpj = $_GET['cnpj'];
$razao_social = $_GET['razao_social'];
$email = $_GET['email'];
$id = $_GET['id'];
$regime = $_GET['regime'];
$oferece = $_GET['oferece'];

?>

<section id="cadastro-dados-regime">
		<div class="row" id="dados-regime">
			<div class="col-md-8 bg-cinza-escuro">
				<div class="row">
					<h2>Que tipo de contribuinte você é?</h2>
				</div>
				<div class="quadro-branco-selecao">
					<a href="cadastro-lojista-ie.php?id=<?php echo $id; ?>&cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo $oferece; ?>&contribuinte=Contribuinte de ICMS" class="link-div-clicavel">
						<div class="div-clicavel">
							<p class="texto-div-clicavel">Contribuinte de ICMS</p>
						</div>
					</a>
					<a href="cadastro-lojista-ie.php?id=<?php echo $id; ?>&cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo $oferece; ?>&contribuinte=Não contribuinte" class="link-div-clicavel">
						<div class="div-clicavel">
							<p class="texto-div-clicavel">Não contribuinte</p>
						</div>
					</a>
				</div>
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