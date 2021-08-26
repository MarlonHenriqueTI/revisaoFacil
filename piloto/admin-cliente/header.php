<?php 
session_start();
if(!isset($_SESSION["user_portal"])){
  header("location:../index.php");
}


// atribui a variável $paginaLink apenas o nome da página
$paginaLink = basename($_SERVER['SCRIPT_NAME']); 

include('../functions.php');

$consulta = "SELECT * from cliente_consumidor where email = '$email'";
$query = mysqli_query($conexao, $consulta);
if(!$query){
  echo "<script>Falha ao capturar email</script>";
  die();
}

while($administrador = mysqli_fetch_array($query)){
  $email = $administrador["email"];
  $nome = $administrador["nome"];
  $id = $administrador["id"];
  $senha = $administrador["senha"];
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="../estilo/style.css">

    <title>Painel Revisão Fácil</title>
  </head>
  <body>
    
<?php include('cabecalho.php'); ?>