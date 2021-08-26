<?php 
	
session_start();

include('banco-de-dados/conecta-db.php');



$usuario = $_POST["email"];

$senha = md5($_POST["senha"]);



$login = "SELECT * ";

$login .= "FROM admin ";

$login.= "WHERE email = '{$usuario}' and senha = '{$senha}'";



$acesso = mysqli_query($conexao,$login);

if(!$acesso) {

	die("Falha na consulta ao banco");

}



$informacao = mysqli_fetch_assoc($acesso);

if(empty($informacao)){
    $login = "SELECT * ";

    $login .= "FROM cliente_consumidor ";
    
    $login.= "WHERE email = '{$usuario}' and senha = '{$senha}'";
    
    
    
    $acesso = mysqli_query($conexao,$login);
    
    if(!$acesso) {
    
        die("Falha na consulta ao banco");
    
    }
    
    
    
    $informacao = mysqli_fetch_assoc($acesso);
    
    if(empty($informacao)){
            $login = "SELECT * ";
        
            $login .= "FROM cliente_lojista_mecanico ";
            
            $login.= "WHERE email = '{$usuario}' and senha = '{$senha}'";
            
            
            
            $acesso = mysqli_query($conexao,$login);
            
            if(!$acesso) {
            
                die("Falha na consulta ao banco");
            
            }
            
            
            
            $informacao = mysqli_fetch_assoc($acesso);
            
            if(empty($informacao)){
            
                
                    echo"<script language='javascript' type='text/javascript'>alert('Opssss... tem algo errado, confira seu login e senha por favor e tente novamente...');window.location.href='login.php';</script>";
            
            } else {
            
            
                $_SESSION["user_portal"] = $informacao["email"];
                header("Location: admin-lojista/index.php");
                
            
            }
    
        } else {
        
        
            $_SESSION["user_portal"] = $informacao["email"];
            header("Location: admin-cliente/index.php");
            
        
        }

}  else {


    $_SESSION["user_portal"] = $informacao["email"];
    header("Location: admin/index.php");


}