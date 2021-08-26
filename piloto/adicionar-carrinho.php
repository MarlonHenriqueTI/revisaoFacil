<?php
session_start();
$id = $_POST['id'];
$_SESSION['carrinho'][$id] = array('cod' => $id, 'quantidade' => 1);