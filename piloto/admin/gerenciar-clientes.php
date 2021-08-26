<?php include('header.php');
if (!isset($_GET['pesquisa'])) {
    $quantidade = 20;

    $numTotal = count(selecionarTodosCLientes($conexao));
    $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
    $clientes = selecionarTodosCLientes($conexao);

    $num_pagina = ceil($numTotal / $quantidade);

    $inicio = ($pagina * $quantidade) - $quantidade;
}


$pagina_posterior = $pagina + 1;
$pagina_anterior = $pagina - 1;
?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md text-start">
                <h2 id="titulo-painel">Gerenciar Clientes</h2>
            </div>
            <div class="col-md text-end">
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Cadastrar Cliente
                </button>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-md-3">
                <p class="d-flex align-middle" id="p-centralizado">Página <a href="gerenciar-clientes.php?pagina=<?php echo $pagina_anterior; ?>" class="btn btn-primary" style="margin-left: 10px; <?php if ($pagina == 1) {
                                                                                                                                                                                                        echo "display:none;";
                                                                                                                                                                                                    } ?>">
                        < </a> <input type="number" class="form-control" id="numero-pagina" name="pagina" value="<?php echo $pagina; ?>"> <a href="gerenciar-clientes.php?pagina=<?php echo $pagina_posterior; ?>" class="btn btn-primary" style="margin-right: 10px;"> > </a> de <?php echo $num_pagina; ?></P>
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
                <p id="p-centralizado" style="margin-top: 9px;"><?php echo $numTotal; ?> clientes cadastrados</p>
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
                        <th scope="col">Nome / Razão Social</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Celular</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cliente Desde</th>
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
                    <?php if (!empty($clientes)) {
                        foreach ($clientes as $cliente) {
                            $endereco = selecionarEnderecoCliente($conexao, $cliente['id'], $cliente['tipo']);
                    ?>
                            <tr>
                                <th scope="row"><?php echo $cliente['id']; ?></th>
                                <td><?php if (!empty($cliente['nome'])) {
                                        echo $cliente['nome'];
                                    } else {
                                        echo $cliente['razao_social'];
                                    } ?></td>
                                <td><?php echo $cliente['email']; ?></td>
                                <td><?php if (!empty($cliente['tipo'])) {
                                        echo $cliente['tipo'];
                                    } else {
                                        echo "Cliente Consumidor";
                                    } ?></td>
                                <td><?php echo $cliente['celular']; ?></td>
                                <td><?php if (!empty($endereco['cep'])) {
                                        echo $endereco['cep'];
                                    } else {
                                        $end = selecionarEnderecoFaturamento($conexao, $cliente['id']);
                                        echo $end['cep'];
                                    } ?></td>
                                <td><?php if (!empty($endereco['estado'])) {
                                        echo $endereco['estado'];
                                    } else {
                                        echo $end['estado'];
                                    } ?></td>
                                <td><?php echo date('d/m/Y', strtotime($cliente['data_cadastro'])); ?></td>
                                <td><a href="" onclick="alert('Esta funcionalidade esta em construção e em breve estara online')">Editar</a> | <a onclick="alert('Esta funcionalidade esta em construção e em breve estara online')" style="color: red;">Excluir</a></td>
                            </tr>
                    <?php }
                    } ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Essa funcionalidade esta sendo finalizada, em breve estara disponivel</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>