<?php

include('../functions.php');

$id = $_POST['id'];
$link = $_POST['link'];

alterar($id, 'video_produtos', 'link', $link, $conexao);

echo "<script>alert('Alterado com sucesso...');window.location.href='javascript:history.back()';</script>";
