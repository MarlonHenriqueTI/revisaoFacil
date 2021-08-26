<?php include('header.php') ;

$id_produto = $_GET['id'];
$produto = selecionarProdutoId($conexao, $id_produto);
$video = selecionarVideoProduto($conexao, $produto['codigo']);
?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md text-start">
                <h4 id="titulo-painel">Editar video <?php echo $produto['nome']; ?></h4>
            </div>
            <div class="col-md text-end">
                <button class="btn btn-danger" onclick="history.back()">
                   Voltar 
                </button>
            </div>
        </div>
        <hr>
        <form action="alterar-video.php" method="post">
        <div class="row">
            <div class="col-12">
                <p>Video atual:</p>
            </div>
            <div class="col-12">
            <iframe width="100%" height="600"
                src="<?php echo $video['link']; ?>">
                </iframe>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Link do video</label>
                    <input type="text" class="form-control" name="link" required value="<?php echo $video['link']; ?>">
                </div>
            </div>
              <input type="hidden" value="<?php echo $video['id']; ?>" name="id">
              <div class="col-12 mt-2 text-end">
                  <button class="btn btn-primary" type="submit">Editar</button>
              </div>
          </div>  
        </form>
    </div>
</section>


<?php include('footer.php'); ?>

