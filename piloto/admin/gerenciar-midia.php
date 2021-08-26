<?php include('header.php') ;

$id_produto = $_GET['id'];
$produto = selecionarProdutoId($conexao, $id_produto);
$imagens = selecionarImagensProduto($conexao, $produto['codigo']);
?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md text-start">
                <h4 id="titulo-painel">Imagens do <?php echo $produto['nome']; ?></h4>
            </div>
            <div class="col-md text-end">
                <button class="btn btn-danger" onclick="history.back()">
                   Voltar 
                </button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 mb-3">
                <small>Você pode clicar nas imagens para alterar, adicionar ou excluir uma imagem do produto</small>
            </div>
            <hr>
            <div class="col-4 mt-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#img01"><img id="galeria-midia" src="<?php if(!empty($imagens['imagem01'])){echo $imagens['imagem01'];} else { echo '../imagens/faça upload.png';} ?>" alt="imagem 1" class="img-fluid"></a>
            </div>
            <div class="col-4 mt-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#img02"><img id="galeria-midia" src="<?php if(!empty($imagens['imagem02'])){echo $imagens['imagem02'];} else { echo '../imagens/faça upload.png';} ?>" alt="imagem 2" class="img-fluid"></a>
            </div> 
            <div class="col-4 mt-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#img03"><img id="galeria-midia" src="<?php if(!empty($imagens['imagem03'])){echo $imagens['imagem03'];} else { echo '../imagens/faça upload.png';} ?>" alt="imagem 3" class="img-fluid"></a>
            </div> 
            <div class="col-4 mt-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#img04"><img id="galeria-midia" src="<?php if(!empty($imagens['imagem04'])){echo $imagens['imagem04'];} else { echo '../imagens/faça upload.png';} ?>" alt="imagem 4" class="img-fluid"></a>
            </div>
            <div class="col-4 mt-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#img05"><img id="galeria-midia" src="<?php if(!empty($imagens['imagem05'])){echo $imagens['imagem05'];} else { echo '../imagens/faça upload.png';} ?>" alt="imagem 5" class="img-fluid"></a>
            </div>
            <div class="col-4 mt-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#img06"><img id="galeria-midia" src="<?php if(!empty($imagens['imagem06'])){echo $imagens['imagem06'];} else { echo '../imagens/faça upload.png';} ?>" alt="imagem 6" class="img-fluid"></a>
            </div>
          </div>  
        </form>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="img01" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a imagem 01</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-imagem-produto.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <p>Você pode adicionar um link ou uma imagem do seu computador, o tamanho recomendado é de 1000x1000px</p>
                  <small style="color: red;">Esta será a imagem principal do seu produto</small>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Selecione uma imagem</label>
                    <input type="file" class="form-control" name="imagem" accept="image/*">
                    <input type="hidden" value="imagem01" name="img">
                    <input type="hidden" value="<?php echo $imagens['id']; ?>" name="id">
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group">
                      <label>Ou cole o link para uma imagem aqui</label>
                      <input type="text" class="form-control" name="link">
                  </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="excluir-imagem.php?id=<?php echo $imagens['id']; ?>&img=imagem01" class="btn btn-danger">Excluir Imagem</a>
        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img02" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a imagem 02</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-imagem-produto.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <p>Você pode adicionar um link ou uma imagem do seu computador, o tamanho recomendado é de 1000x1000px</p>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Selecione uma imagem</label>
                    <input type="file" class="form-control" name="imagem" accept="image/*">
                    <input type="hidden" value="<?php echo $imagens['id']; ?>" name="id">
                    <input type="hidden" value="imagem02" name="img">
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group">
                      <label>Ou cole o link para uma imagem aqui</label>
                      <input type="text" class="form-control" name="link">
                  </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="excluir-imagem.php?id=<?php echo $imagens['id']; ?>&img=imagem02" class="btn btn-danger">Excluir Imagem</a>
        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img03" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a imagem 03</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-imagem-produto.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <p>Você pode adicionar um link ou uma imagem do seu computador, o tamanho recomendado é de 1000x1000px</p>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Selecione uma imagem</label>
                    <input type="file" class="form-control" name="imagem" accept="image/*">
                    <input type="hidden" value="<?php echo $imagens['id']; ?>" name="id">
                    <input type="hidden" value="imagem03" name="img">
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group">
                      <label>Ou cole o link para uma imagem aqui</label>
                      <input type="text" class="form-control" name="link">
                  </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="excluir-imagem.php?id=<?php echo $imagens['id']; ?>&img=imagem03" class="btn btn-danger">Excluir Imagem</a>
        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img04" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a imagem 04</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-imagem-produto.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <p>Você pode adicionar um link ou uma imagem do seu computador, o tamanho recomendado é de 1000x1000px</p>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Selecione uma imagem</label>
                    <input type="file" class="form-control" name="imagem" accept="image/*">
                    <input type="hidden" value="<?php echo $imagens['id']; ?>" name="id">
                    <input type="hidden" value="imagem04" name="img">
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group">
                      <label>Ou cole o link para uma imagem aqui</label>
                      <input type="text" class="form-control" name="link">
                  </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="excluir-imagem.php?id=<?php echo $imagens['id']; ?>&img=imagem04" class="btn btn-danger">Excluir Imagem</a>
        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img05" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a imagem 05</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-imagem-produto.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <p>Você pode adicionar um link ou uma imagem do seu computador, o tamanho recomendado é de 1000x1000px</p>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Selecione uma imagem</label>
                    <input type="file" class="form-control" name="imagem" accept="image/*">
                    <input type="hidden" value="<?php echo $imagens['id']; ?>" name="id">
                    <input type="hidden" value="imagem05" name="img">
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group">
                      <label>Ou cole o link para uma imagem aqui</label>
                      <input type="text" class="form-control" name="link">
                  </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="excluir-imagem.php?id=<?php echo $imagens['id']; ?>&img=imagem05" class="btn btn-danger">Excluir Imagem</a>
        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="img06" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a imagem 06</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-imagem-produto.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-12">
                  <p>Você pode adicionar um link ou uma imagem do seu computador, o tamanho recomendado é de 1000x1000px</p>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Selecione uma imagem</label>
                    <input type="file" class="form-control" name="imagem" accept="image/*">
                    <input type="hidden" value="<?php echo $imagens['id']; ?>" name="id">
                    <input type="hidden" value="imagem06" name="img">
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group">
                      <label>Ou cole o link para uma imagem aqui</label>
                      <input type="text" class="form-control" name="link">
                  </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="excluir-imagem.php?id=<?php echo $imagens['id']; ?>&img=imagem06" class="btn btn-danger">Excluir Imagem</a>
        <button type="submit" class="btn btn-primary">Alterar Imagem</button>
    </form>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

