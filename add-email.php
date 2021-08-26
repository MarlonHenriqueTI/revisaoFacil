<?php

include('banco-de-dados/conecta-db.php');

$email = $_POST['email'];

function cadastrarListaDeEspera($conexao, $email){
	$senha = md5($senha);
	$query = "INSERT INTO `lista_espera`( `email`) VALUES ('$email')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Ocorreu um erro ao cadastrar seu e-mail");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso, quando o sistema estiver no ar você vai receber um e-mail avisando!');window.location.href='index.html';</script>";
	}
}

cadastrarListaDeEspera($conexao, $email);