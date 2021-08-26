<?php

include('../functions.php');

$id = $_POST['id'];
$status = $_POST['status'];

alterar($id, 'produtos', 'status', $status, $conexao);

echo "<script>alert('Alterado com sucesso...');window.location.href='javascript:history.back()';</script>";
