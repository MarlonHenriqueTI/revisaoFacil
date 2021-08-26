<?php

include('header.php');

$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];
$tipo = $_POST['tipo'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$receber_informacoes = $_POST['receber_informacoes'];

$lojista = cadastrarLojista($conexao, $cnpj, $razao_social, $tipo, $email, $senha, $receber_informacoes);

$numero_verificacao = rand(100000,999999);

$destinatario = $email; //Seu e-mail vai aqui

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . $razao_social . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Seu código é :" . $numero_verificacao . "\n"; 
$body = $body . "===================================" . "\n";
$body = $body . "Para confirmar que ". $email ." pertence a você, copie o código e continue a configurar sua conta.\n";


// envia o email
mail($destinatario, 'Revisão Fácil - Confirme seu e-mail' , $body, "From:contato@revisaofacil.com.br\r\n");

?>

<section id="cadastro-dados">
	<div class="container">
		<form action="conta-criada-cliente-lojista.php" method="post">
			<div class="quadro-branco">
				<div class="container">
					<h2>Digite o código que enviamos por e-mail</h2>
					<p id="confirmar-email-texto">Para confirmar de que se trata do seu e-mail, enviamos para <?php echo $email; ?>. Caso não o encontre, confira sua pasta de spam.</p>
					<div class="row">
						<div class="col-md-12">
							<div class="group">      
						      <input type="text" required name="confirma_email" onblur="validarnumero(this.value, <?php echo $numero_verificacao; ?>)" onkeyup="validarnumero(this.value, <?php echo $numero_verificacao; ?>)">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						    </div>
						</div>
					</div>
					<input type="hidden" name="cnpj" value="<?php echo $cnpj; ?>">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<input type="hidden" name="razao_social" value="<?php echo $razao_social; ?>">
					<input type="hidden" name="id" value="<?php echo $lojista['id']; ?>">
					<div class="col-md-6 text-end">
						<button class="btn btn-secondary" type="submit" id="botao-continuar" disabled="">CONTINUAR</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<?php include('footer.php'); ?>