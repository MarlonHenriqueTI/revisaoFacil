<?php 

session_start();
$id = $_POST['id'];
unset($_SESSION['carrinho'][$id]);
echo var_dump($id);