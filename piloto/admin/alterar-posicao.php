<?php

include('../functions.php');

$id = $_POST['id'];
$posicao = $_POST['posicao'];

alterar($id, 'categorias', 'posicao', $posicao, $conexao);

echo "<script>alert('Alterado com sucesso...');window.location.href='javascript:history.back()';</script>";
