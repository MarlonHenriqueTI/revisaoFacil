<?php 
include('header.php');

$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];
$email = $_POST['email'];
$id = $_POST['id'];


?>

<section id="cadastro-dados-regime">
		<div class="row" id="dados-regime">
			<div class="col-md-8 bg-cinza-escuro">
				<div class="row">
					<small>Tipo de contribuinte</small><br>
					<h2>Qual é o regime tributário?</h2>
				</div>
				<div class="quadro-branco-selecao">
					<a href="cadastro-lojista-oferecer.php?id=<?php echo $id; ?>&cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&regime=Regime Normal" class="link-div-clicavel">
						<div class="div-clicavel">
							<p class="texto-div-clicavel">Regime Normal</p>
						</div>
					</a>
					<a href="cadastro-lojista-oferecer.php?id=<?php echo $id; ?>&cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&regime=Simples Nacional" class="link-div-clicavel">
						<div class="div-clicavel">
							<p class="texto-div-clicavel">Simples Nacional</p>
						</div>
					</a>
					<a href="cadastro-lojista-oferecer.php?id=<?php echo $id; ?>&cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&regime=Simples Nacional - excesso de sublimite da receita bruta" class="link-div-clicavel">
						<div class="div-clicavel">
							<p class="texto-div-clicavel">Simples Nacional - excesso de sublimite da receita bruta</p>
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