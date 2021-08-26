<?php

include('../functions.php');

$id = $_POST['id'];
$categoria = $_POST['categoria'];

alterar($id, 'produtos', 'id_categoria', $categoria, $conexao);

echo "<script>alert('Alterado com sucesso...');window.location.href='javascript:history.back()';</script>";
