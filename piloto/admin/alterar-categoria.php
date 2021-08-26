<?php

include('../functions.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$posicao = $_POST['posicao'];

alterar($id, 'categorias', 'nome', $nome, $conexao);
alterar($id, 'categorias', 'descricao', $descricao, $conexao);
alterar($id, 'categorias', 'posicao', $posicao, $conexao);

echo "<script>alert('Alterado com sucesso...');window.location.href='javascript:history.back()';</script>";
