<?php

session_start();
$quantidade = $_POST['quantidade'];
$id = $_POST['id'];
$_SESSION['carrinho'][$id] = array('cod' => $id, 'quantidade' => $quantidade);