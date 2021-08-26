<?php include('header.php'); 

$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];
$email = $_POST['email'];
$id = $_POST['id'];


?>

<section id="cadastro-dados-amarelo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			    <h2>Pronto, sua conta na Revisão Fácil foi criada!</h2>
			    <p>Agora você já pode vender no marktplace de autopeças que é seu parceiro! <br>Você ganhou X pontos Clube da Revisão por ter feito seu cadastro! <br>Conheça mais sobre o Clube da Revisão, <a href="#" target="_blank">clique aqui</a>!</p>
		    </div>
		    <div class="col-md-4">
			    <div class="redondo-branco">
			    	<img src="imagens/shop.png" alt="icone" class="img-fluid">
			    </div>
		    </div>
		</div>
		<form action="cadastro-lojista-regime-tributario.php" method="post">
		<div class="quadro-branco">
			<div class="container" >
				<div class="row" id="container-meio">
					<div class="col-md-8">
						<input type="hidden" name="cnpj" value="<?php echo $cnpj; ?>">
						<input type="hidden" name="email" value="<?php echo $email; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="razao_social" value="<?php echo $razao_social; ?>">
						<button class="btn btn-primary" type="submit" id="botao-continuar-completo" >Completarei os dados fiscais</button>
					</div>
					<div class="col-md-4">
						<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>">Farei isso depois</a>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>

<?php include('footer.php'); ?>