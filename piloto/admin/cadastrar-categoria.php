<?php

include('../functions.php');

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$posicao = $_POST['posicao'];
cadastrarCategoria($conexao, $nome, $descricao, $posicao);
