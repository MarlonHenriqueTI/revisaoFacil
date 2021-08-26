<?php include('header.php');
if(!isset($_GET['pesquisa'])){
    $quantidade = 20;

    $numTotal = contarCategorias($conexao);
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $categorias = selecionarCategoriasPaginacao($conexao, $quantidade, $pagina-1);

    $num_pagina = ceil($numTotal/$quantidade);

    $inicio = ($pagina * $quantidade) - $quantidade;
} else {
    $pesquisa = $_GET['pesquisa'];
    $quantidade = 20;
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $categorias = selecionarCategoriasLojaPesquisa($conexao, $quantidade, $pagina-1, $pesquisa);
    if(empty($categorias)){
        $numTotal = 0;
        $num_pagina = 1;
    }  else {
        $numTotal = contarCategoriasPesquisa($conexao, $pesquisa);
        $num_pagina = ceil($numTotal/$quantidade);
    }
    
    
    $inicio = ($pagina * $quantidade) - $quantidade;

}


$pagina_posterior = $pagina + 1;
$pagina_anterior = $pagina - 1;
?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md text-start">
                <h2 id="titulo-painel">Gerenciar Categorias</h2>
            </div>
            <div class="col-md text-end">
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Criar Categoria
                </button>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-md-3">
                <p class="d-flex align-middle" id="p-centralizado">Página <a href="gerenciar-produtos.php?pagina=<?php echo $pagina_anterior; ?>" class="btn btn-primary" style="margin-left: 10px; <?php if($pagina == 1){ echo "display:none;";} ?>" > < </a> <input type="number" class="form-control" id="numero-pagina" name="pagina" value="<?php echo $pagina; ?>"> <a href="gerenciar-produtos.php?pagina=<?php echo $pagina_posterior; ?>" class="btn btn-primary" style="margin-right: 10px;"> > </a> de <?php echo $num_pagina; ?></P>
            </div>
            <div class="col-md-3">
                <p id="p-centralizado">Ver <select name="quantidade-pagina" id="quantidade-pagina" class="form-control">
                    <option value="20" selected>20</option>
                    <option value="40">40</option>
                    <option value="100">100</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                </select> Por Página</p>
            </div>
            <div class="col-md-3">
                <p id="p-centralizado" style="margin-top: 9px;"><?php echo $numTotal; ?> categorias encontradas</p>
            </div>
            <div class="col-md-3">
                <p id="p-centralizado">Exportar para <select name="exportar" id="exportar" class="form-control">
                    <option value="CSV" selected>CSV</option>
                    <option value="PDF">PDF</option>
                    <option value="Excell">Excell</option>
                </select> <button class="btn btn-primary">Exportar</button></p>
            </div>
        </div>
        <script>
            $(function(){
                $("#tabela input").keyup(function(){       
                    var index = $(this).parent().index();
                    var nth = "#tabela td:nth-child("+(index+1).toString()+")";
                    var valor = $(this).val().toUpperCase();
                    $("#tabela tbody tr").show();
                    $(nth).each(function(){
                        if($(this).text().toUpperCase().indexOf(valor) < 0){
                            $(this).parent().hide();
                        }
                    });
                });
            
                $("#tabela input").blur(function(){
                    $(this).val("");
                });
            });
        </script>
        <div class="row table-responsive">
            <table class="table table-hover table-striped" id="tabela">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Posição</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                    <tr>
                        <th><input type="text" id="txtColuna1" class="form-control"/></th>
                        <th><input type="text" id="txtColuna2" class="form-control"/></th>
                        <th><input type="text" id="txtColuna3" class="form-control"/></th>
                        <th><input type="text" id="txtColuna4" class="form-control"/></th>
                        <th><input type="text" id="txtColuna5" class="form-control"/></th>
                    </tr>  
                </thead>
                <tbody>
                    <?php if(!empty($categorias)){
                    foreach ($categorias as $cat) {    
                    ?>
                    <tr>
                    <th scope="row"><?php echo $cat['id']; ?></th>
                    <td><?php echo $cat['nome']; ?></td>
                    <td><a  data-bs-toggle="modal" data-bs-target="#alterar<?php echo $cat['id']; ?>"><?php echo $cat['posicao']; ?></a></td>
                    <td><a  data-bs-toggle="modal" data-bs-target="#descricao<?php echo $cat['id']; ?>">Clique para ver</a></td>
                    <td><a href="editar-categoria.php?id=<?php echo $cat['id']; ?>">Editar</a> | <a onclick="deletar(<?php echo $cat['id'];?>, 'categorias')" style="color: red;">Excluir</a></td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="cadastrar-categoria.php" method="POST">
          <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="nome" required placeholder="Nome">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <textarea name="descricao" class="form-control" rows="3">Digite uma descrição para a categoria</textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <select name="posicao" class="form-control" required>
                        <option value="" disabled selected>Selecione a posição que esta categoria ocupara no menu</option>
                        <option value="principal">Menu Principal</option>
                        <option value="submenu">Submenu</option>
                    </select>
                </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
      </div>
    </div>
  </div>
</div>

<?php foreach($categorias as $key){ ?>
<!-- Modal -->
<div class="modal fade" id="alterar<?php echo $key['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar posição de <?php echo $key['nome']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="alterar-posicao.php" method="POST">
          <div class="row">
              <div class="col-12 mt-2">
                <div class="form-group">
                    <select name="posicao" class="form-control" required>
                        <option value="" disabled selected>Selecione a posição que esta categoria ocupara no menu</option>
                        <option value="principal">Menu Principal</option>
                        <option value="submenu">Submenu</option>
                    </select>
                    <input type="hidden" value="<?php echo $key['id']; ?>" name="id">
                </div>
              </div>
          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Alterar Posição</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="descricao<?php echo $key['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descrição de <?php echo $key['nome']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?php echo $key['descricao']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<? } ?>

<?php include('footer.php'); ?>

