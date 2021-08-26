<?php include('header.php');

$id_categoria = $_GET['id'];
$categoria = selecionarCategoria($conexao, $id_categoria);
?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md text-start">
                <h2 id="titulo-painel">Editar <?php echo $categoria['nome']; ?></h2>
            </div>
            <div class="col-md text-end">
                <button class="btn btn-danger" onclick="history.back()">
                   Voltar
                </button>
            </div>
        </div>
        <hr>
        <form action="alterar-categoria.php" method="post">
        <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="nome" required placeholder="Nome" value="<?php echo $categoria['nome']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <textarea name="descricao" class="form-control" rows="3"><?php echo $categoria['descricao']; ?></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <select name="posicao" class="form-control" required>
                        <option value="<?php echo $categoria['posicao']; ?>" disabled selected><?php echo $categoria['posicao']; ?></option>
                        <option value="principal">Menu Principal</option>
                        <option value="submenu">Submenu</option>
                    </select>
                </div>
              </div>
              <input type="hidden" value="<?php echo $categoria['id']; ?>" name="id">
              <div class="col-12 mt-2 text-end">
                  <button class="btn btn-primary" type="submit">Editar</button>
              </div>
          </div>  
        </form>
    </div>
</section>


<?php include('footer.php'); ?>

