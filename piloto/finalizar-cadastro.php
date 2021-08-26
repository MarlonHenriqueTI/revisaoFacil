<?php include('header.php'); 

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
$fundacao = $_POST['fundacao'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$sn = $_POST['sn'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];
$celular = $_POST['celular'];
$telefone = $_POST['telefone'];
$receber_informacoes = $_POST['receber_informacoes'];
cadastrarEnderecoLojista($conexao, $id, $cep, $uf, $cidade, $bairro, $rua, $numero, $referencia, $celular, $telefone, $receber_informacoes);
cadastrarDadosFiscais($conexao, $id, $regime, $oferece, $contribuinte, $ie, $im, $isento, $fundacao);

?>

<section id="cadastro-dados-amarelo">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6" style="padding-top: 3%;">
			    <h2>Pronto! Sua conta está criada!</h2>
		    </div>
		    <div class="col-md-4">
			    <div class="redondo-branco">
			    	<img src="imagens/shop.png" alt="icone" class="img-fluid">
			    </div>
		    </div>
		</div>
		<form action="#">
		<div class="quadro-branco">
			<div class="container" >
				<div class="row">
					<div class="col-md-12" style="margin-bottom:20px;">
						Comece a vender agora na Revisão Fácil, cadastre os seus produtos ou sua agenda de serviços. É simples e rápido!
					</div>
					<br>
					<div class="col-md-6">
						<a class="btn btn-primary" class="btn btn-primary" id="botao-continuar-completo" href="#">Cadastre produtos e serviços</a>
					</div>
					<div class="col-md-6">
						<a class="btn btn-primary" class="btn btn-primary" id="botao-continuar-completo" href="index.php?login=true&id=<?php echo $id; ?>&email=<?php echo $email; ?>">Cadastre mais tarde!</a>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>

<?php include('footer.php'); ?>