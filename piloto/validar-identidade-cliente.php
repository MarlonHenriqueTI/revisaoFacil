<?php include('header.php'); 

$nome = $_POST['nome'];
$id_cliente = $_POST['id_cliente'];
$email = $_POST['email'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];


?>

<section id="cadastro-dados-validacao">
	<div class="container">
		<form action="cadastrar-endereco-cliente.php" method="post">
		<div class="quadro-branco">
			<div class="container" >
				<div class="row" id="container-meio">
					<div class="col-md-12 text-center" style="padding: 6%;">	
						<img src="imagens/id-card.png" class="img-fluid">
					</div>	
					<div class="col-md-12 text-center">	
						<h4>Agora, vamos validar sua<br>identidade</h4>
						<p>Pediremos alguns dados para garantir que é você. Leva poucos minutos!</p>
					</div>	
					<div class="col-md-12 text-center">
						<input type="hidden" name="nome" value="<?php echo $nome; ?>">
						<input type="hidden" name="email" value="<?php echo $email; ?>">
						<input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
						<input type="hidden" name="sobrenome" value="<?php echo $sobrenome; ?>">
						<input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
						<button class="btn btn-primary" type="submit" id="botao-continuar" >Começar</button>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>

<?php include('footer.php'); ?>