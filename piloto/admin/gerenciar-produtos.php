<?php include('header.php');
if (!isset($_GET['pesquisa'])) {
    $quantidade = 20;

    $numTotal = contarProdutos($conexao);
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $produtos = selecionarProdutosLoja($conexao, $quantidade, $pagina);

    $num_pagina = ceil($numTotal / $quantidade);

    $inicio = ($pagina * $quantidade) - $quantidade;
} else {
    $pesquisa = $_GET['pesquisa'];
    $quantidade = 20;
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $produtos = selecionarProdutosLojaPesquisa($conexao, $quantidade, $pagina, $pesquisa);
    if (empty($produtos)) {
        $numTotal = 0;
        $num_pagina = 1;
    } else {
        $numTotal = contarProdutosPesquisa($conexao, $pesquisa);
        $num_pagina = ceil($numTotal / $quantidade);
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
                <h2 id="titulo-painel">Gerenciar Produtos</h2>
            </div>
            <div class="col-md text-end">
                <a href="#" class="btn btn-success">Importar Produtos</a>
                <a class="btn btn-secondary" href="criar-produto.php">
                    Criar Produto
                </a>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-md-3">
                <p class="d-flex align-middle" id="p-centralizado">Página <a href="gerenciar-produtos.php?pagina=<?php echo $pagina_anterior; ?>" class="btn btn-primary" style="margin-left: 10px; <?php if ($pagina == 1) {
                                                                                                                                                                                                        echo "display:none;";
                                                                                                                                                                                                    } ?>">
                        < </a> <input type="number" class="form-control" id="numero-pagina" name="pagina" value="<?php echo $pagina; ?>"> <a href="gerenciar-produtos.php?pagina=<?php echo $pagina_posterior; ?>" class="btn btn-primary" style="margin-right: 10px;"> > </a> de <?php echo $num_pagina; ?></P>
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
                <p id="p-centralizado" style="margin-top: 9px;"><?php echo $numTotal; ?> produtos encontrados</p>
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
            $(function() {
                $("#tabela input").keyup(function() {
                    var index = $(this).parent().index();
                    var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
                    var valor = $(this).val().toUpperCase();
                    $("#tabela tbody tr").show();
                    $(nth).each(function() {
                        if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                            $(this).parent().hide();
                        }
                    });
                });

                $("#tabela input").blur(function() {
                    $(this).val("");
                });
            });
        </script>
        <div class="row table-responsive">
            <table class="table table-hover table-striped" id="tabela">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Código Barras</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                    <tr>
                        <th><input type="text" id="txtColuna1" class="form-control" /></th>
                        <th><input type="text" id="txtColuna2" class="form-control" /></th>
                        <th><input type="text" id="txtColuna3" class="form-control" /></th>
                        <th><input type="text" id="txtColuna4" class="form-control" /></th>
                        <th><input type="text" id="txtColuna5" class="form-control" /></th>
                        <th><input type="text" id="txtColuna6" class="form-control" /></th>
                        <th><input type="text" id="txtColuna7" class="form-control" /></th>
                        <th><input type="text" id="txtColuna8" class="form-control" /></th>
                        <th><input type="text" id="txtColuna9" class="form-control" /></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($produtos)) {
                        foreach ($produtos as $produto) {

                            $imagens = selecionarImagensProduto($conexao, $produto['codigo']);
                    ?>
                            <tr>
                                <th scope="row"><?php echo $produto['id']; ?></th>
                                <td><?php echo $produto['codigo']; ?></td>
                                <td><?php echo $produto['nome']; ?></td>
                                <td><?php echo 'R$' . number_format($produto['preco'], 2, ',', ''); ?></td>
                                <td><a data-bs-toggle="modal" data-bs-target="#alterarcat<?php echo $produto['id']; ?>"><?php if (empty($produto['id_categoria'])) {
                                                                                                                            echo "Sem categoria definida";
                                                                                                                        } else {
                                                                                                                            $cat = selecionarCategoria($conexao, $produto['id_categoria']);
                                                                                                                            echo $cat['nome'];
                                                                                                                        } ?></a></td>
                                <td><?php echo $produto['marca']; ?></td>
                                <td><?php echo $produto['codigo_barras']; ?></td>
                                <td><a data-bs-toggle="modal" data-bs-target="#alterarstatus<?php echo $produto['id']; ?>"><?php echo $produto['status']; ?></a></td>
                                <td><a href="editar-produto.php?id=<?php echo $produto['id']; ?>">Editar</a> | <a onclick="deletar(<?php echo $produto['id']; ?>, 'produtos')" style="color: red;">Excluir</a></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php foreach ($produtos as $key) { ?>
    <!-- Modal -->
    <div class="modal fade" id="alterarcat<?php echo $key['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar categoria de <?php echo $key['nome']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="alterar-categoria-produto.php" method="POST">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <select name="categoria" class="form-control" required>
                                        <option value="" disabled selected>Selecione a categoria deste produto</option>
                                        <?php $categorias = selecionarTodasCategorias($conexao);
                                        foreach ($categorias as $cat) { ?>
                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" value="<?php echo $key['id']; ?>" name="id">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Alterar Categoria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="alterarstatus<?php echo $key['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar status de <?php echo $key['nome']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="alterar-status-produto.php" method="POST">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <select name="status" class="form-control" required>
                                        <option value="" disabled selected>Selecione o status deste produto</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo (exclui o produto da loja mas ele continua no sistema)</option>
                                    </select>
                                    <input type="hidden" value="<?php echo $key['id']; ?>" name="id">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Alterar status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? } ?>

<?php include('footer.php'); ?>