<?php 	

include('../functions.php');

$id = $_GET['id'];
$img = $_GET['img'];
alterar($id, 'imagens_produtos', $img, '', $conexao);

echo "<script>window.location.href='javascript:history.back()';</script>";