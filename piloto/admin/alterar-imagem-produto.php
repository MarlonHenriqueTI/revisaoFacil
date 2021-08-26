<?php 	

include('../functions.php');

$id = $_POST['id'];

if(empty($_POST['link'])){
    $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../../images/"; //define o diretorio para onde enviaremos o arquivo
    if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome)){
        echo "sucesso";
        $link = "https://revisaofacil.com.br/".$diretorio.$novo_nome;
    } else {
        echo "falha";
    }
} else {
    $link = $_POST['link'];
}

alterar($id, 'imagens_produtos', $_POST['img'], $link, $conexao);

echo "<script>window.location.href='javascript:history.back()';</script>";