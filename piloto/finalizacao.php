<?php include('header.php'); 

$nome = $_POST['nome'];
$id_cliente = $_POST['id_cliente'];
$email = $_POST['email'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$sn = $_POST['sn'];
$referencia = $_POST['referencia'];
$complemento = $_POST['complemento'];
$celular = $_POST['celular'];
$telefone = $_POST['telefone'];
$receber_informacoes = $_POST['receber_informacoes'];
cadastrarEnderecoClienteConsumidor($conexao, $id_cliente, $cep, $uf, $cidade, $bairro, $rua, $numero, $referencia);
if(!empty($_POST['celular'])){
	alterar($id_cliente, 'cliente_consumidor', 'celular', $celular, $conexao);
}
if(!empty($_POST['telefone'])){
	alterar($id_cliente, 'cliente_consumidor', 'telefone', $telefone, $conexao);
}
if(!empty($_POST['nascimento'])){
	alterar($id_cliente, 'cliente_consumidor', 'nascimento', $nascimento, $conexao);
}
$chkendereco = $_POST['chkendereco'];
if($chkendereco == 1){
	$cep_entrega = $_POST['cep_entrega'];
	$uf_entrega = $_POST['uf_entrega'];
	$cidade_entrega = $_POST['cidade_entrega'];
	$rua_entrega = $_POST['rua_entrega'];
	$bairro_entrega = $_POST['bairro_entrega'];
	$numero_entrega = $_POST['numero_entrega'];
	$sn_entrega = $_POST['sn_entrega'];
	$referencia_entrega = $_POST['referencia_entrega'];
	$complemento_entrega = $_POST['complemento_entrega'];
	cadastrarEnderecoEntregaClienteConsumidor($conexao, $id_cliente, $cep_entrega, $uf_entrega, $cidade_entrega, $bairro_entrega, $rua_entrega, $numero_entrega, $referencia_entrega);
}

?>

<section id="cadastro-dados-amarelo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			    <h2>Pronto, sua conta na Revisão Fácil foi criada!</h2>
			    <p>Agora você já pode comprar peças para sua revisão! <br>Você ganhou X pontos Clube da Revisão por ter feito seu cadastro! <br>Conheça mais sobre o Clube da Revisão, <a href="em-construcao.php" target="_blank">clique aqui</a>!</p>
		    </div>
		    <div class="col-md-4">
			    <div class="redondo-branco">
			    	<img src="imagens/shop.png" alt="icone" class="img-fluid">
			    </div>
		    </div>
		</div>
		<div class="quadro-branco">
			<div class="container" >
				<div class="row" id="container-meio">
					<div class="col-md-8">
						<a class="btn btn-primary" href="cadastro-lojista-mecanico-fabricante.php?email=<?php echo $email; ?>" id="botao-continuar-completo">Sim. sou um mecânico/oficina mecânica!</a>
					</div>
					<div class="col-md-4">
						<a  class="btn btn-primary" href="index.php?login=true&id=<?php echo $id_cliente; ?>&email=<?php echo $email; ?>" id="botao-continuar-completo">Não!</a>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>

<?php include('footer.php'); ?>