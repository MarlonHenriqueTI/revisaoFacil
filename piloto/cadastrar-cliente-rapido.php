<?php

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];

cadastrarClienteConsumidorCR($conexao, $cpf, $nome, $sobrenome, $email, $celular, $cep);

echo "<script>window.location.href='resultado.php?marca=".$marca."&modelo=".$modelo."&ano=".$ano."&km=".$km."';</script>";