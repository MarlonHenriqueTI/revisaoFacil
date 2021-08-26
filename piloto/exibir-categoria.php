<?php include('header.php'); 

$id_categoria = $_GET['id'];
$quantidade = 15;

$numTotal = contarProdutosCategoria($conexao, $id_categoria);
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$produtos = selecionarProdutosLojaCategoria($conexao, $quantidade, $pagina, $id_categoria);

$num_pagina = ceil($numTotal/$quantidade);

$inicio = ($pagina * $quantidade) - $quantidade;

$categorias = selecionarTodasCategorias($conexao);

if(isset($_GET['ordem'])){
    $ordenar = $_GET['ordem'];
    if($ordenar == "maisvendidos"){

    } else if($ordenar == "maiorpreco") {
        selecionarProdutosLojaCategoriaOrdenado($conexao, $quantidade, $pagina, $id_categoria, '`preco` DESC');
    } else {
        selecionarProdutosLojaCategoriaOrdenado($conexao, $quantidade, $pagina, $id_categoria, '`preco` ASC');
    }
}

?>
<section id="loja">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="border-right: 1px solid #dedede;">
                <div class="row mt-3 p-2">
                    <div class="col-12 text-center">
                        <h4>Categorias</h4>
                    </div>
                    <div class="col-12 text-center">
                        <?php foreach ($categorias as $key) {?>
                            <p><a href="exibir-categoria.php?id=<?php echo $key['id']; ?>" class="link-preto"><?php echo $key['nome']; ?></a></p>
                        <?php } ?>
                    </div>
                    <div class="col-12 text-center">
                        <p><b>Avaliação dos clientes</b></p>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#" class="avaliacao-sidebar"><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> e acima</a>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#" class="avaliacao-sidebar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> e acima</a>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#" class="avaliacao-sidebar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> e acima</a>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#" class="avaliacao-sidebar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> e acima</a>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <h4>Buscar Por</h4>
                    </div>
                    <div class="col-12 text-center">
                        <a href="exibir-categoria.php?id=<?php echo $id_categoria; ?>&ordem=maisvendidos" class="avaliacao-sidebar"><b>Mais Vendido</b></a>
                    </div>
                    <div class="col-12 text-center">
                        <a href="exibir-categoria.php?id=<?php echo $id_categoria; ?>&ordem=maiorpreco" class="avaliacao-sidebar"><b>Maior Preço</b></a>
                    </div>
                    <div class="col-12 text-center">
                        <a href="exibir-categoria.php?id=<?php echo $id_categoria; ?>&ordem=menorpreco" class="avaliacao-sidebar"><b>Menor Preço</b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mt-3 p-3">
                <?php if(isset($_GET['pesquisa'])){?>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-muted">Foram encontrados <b><?php echo $numTotal;?> resultados</b> para <b>"<?php echo $pesquisa; ?>"</b></p>
                        </div>
                    </div>
                <?php } ?>

                    <?php 
                    if(!empty($produtos)){
                    foreach ($produtos as $produto) { 
                        if($produto['status'] == 'ativo'){
                        $imagens = selecionarImagensProduto($conexao, $produto['codigo']);    
                    ?>
                        <div class="col-sm-4">
                            <a href="single.php?codigo=<?php echo $produto['codigo']; ?>" class="card-link">
                                <div class="card p-3 mb-3" id="card-loja"> 
                                    <div class="row">
                                        <div class="col-1">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="col text-start">
                                                <small style="font-size: 0.8em;">Colocar na minha lista de desejos</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <img src="<?php echo $imagens['imagem01']; ?>" alt="foto produto" class="img-fluid" style="height: 178px;">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-start">
                                            <small class="text-muted"><?php echo $produto['codigo']; ?></small>
                                        </div>
                                        <div class="col-12 text-start">
                                            <p><?php echo $produto['nome']; ?></p>
                                        </div>
                                        <div class="col-12 text-start">
                                            <b>Aplicação</b>
                                        </div>
                                        <div class="col-12 text-start">
                                            <p class="text-muted" style="white-space: nowrap;overflow: hidden;"><?php echo $produto['aplicacao']; ?></p>
                                        </div>
                                        <div class="col-12 text-start">
                                            <small class="text-muted">Ofertas em X lojas</small>
                                        </div>
                                        <div class="col-12 text-start">
                                            <small>X unidades em estoque</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-start">
                                            <small><b>A partir de</b></small>
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="strikeout"><b><?php echo 'R$'.number_format($produto['preco']*$produto['multiplicador'], 2, ',', ''); ?></b></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="preco-card"><?php echo 'R$'.number_format($produto['preco'], 2, ',', ''); ?></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="parcelamento-card"><b><?php echo '3x R$'.number_format($produto['preco']/3, 2, ',', ''); ?></b></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="sem-juros-card">SEM JUROS</p>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p><b>Ou <span style="color:red;"><?php echo number_format($produto['preco']/0.01, 0, ',', ''); ?> pontos</span></b></p>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted text-uppercase"><i class="fas fa-shopping-cart" style="color:#54b6e5 ;"></i> pague com pontos <b style="color:#54b6e5;"><?php echo number_format($produto['preco']/0.01, 0, ',', ''); ?></b> pontos</small>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted text-uppercase"><i class="fas fa-trophy" style="color:#54b6e5 ;"></i> Ao realizar essa compra você ganhará <b style="color:#54b6e5;"><?php echo number_format($produto['preco'], 0, ',', '');?></b> pontos</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } }} else {?>  
                        <p>Nenhum produto encontrado</p>
                    <?php } ?>                      
                </div>
            </div>
        </div>
        <div class="row">
        <?php
        $pagina_anterior = $pagina -1;
        $pagina_posterior = $pagina + 1;
        ?>
            <nav aria-label="Page navigation" class="d-flex nav-pagination text-center mt-5 mb-5 justify-content-center">
                <ul class="pagination">
                <li class="page-item">
                <?php 
                if($pagina_anterior != 0) { ?>
                    <a href="exibir-categoria.php?id=<?php echo $id_categoria; ?>&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous" class="page-link">
                        <span aria-hidden="true">Anterior</span>
                    </a>
                <?php } else { ?>
                        <span aria-hidden="true" class="page-link">Anterior</span>
                <?php } ?>
                </li>
                    <?php 

                        $estilo = "";
                        if($pagina > 2){
                            echo "<li class='page-item'><span class='page-link'>...</span></li>"; // a partir da página 3 será necessário colocar os 3 pontos
                        }

                        if($pagina > 1)
                        echo "<li class='page-item'><a class='page-link' href='exibir-categoria.php?id=<?php echo $id_categoria; ?>&pagina=".$pagina_anterior."'>".$pagina_anterior."</a></li>";
                        echo "<li class='page-item active''><a class='page-link' href='exibir-categoria.php?id=<?php echo $id_categoria; ?>&pagina=".$pagina."'>".$pagina."</a></li>";
                        if($pagina_posterior <= $num_pagina)
                        echo "<li class='page-item '><a class='page-link' href='exibir-categoria.php?id=<?php echo $id_categoria; ?>&pagina=".$pagina_posterior ."'>".$pagina_posterior."</a></li>";

                        if($pagina_posterior < $num_pagina){
                            echo "<li class='page-item'><span class='page-link'>...</span></li>"; // se a próxima página for igual ultima página não será necessário colocar os 3 pontos
                        }
                        ?>
                        <li class="page-item">
                        <?php 
       if($pagina_posterior <= $num_pagina) { ?>
          <a href="exibir-categoria.php?id=<?php echo $id_categoria; ?>&pagina=<?php echo $pagina_posterior; ?>" class="page-link" aria-label="Previous">
             <span aria-hidden="true">Próximo</span>
          </a>
       <?php } else { ?>
          <span aria-hidden="true" class="page-link">Próximo</span>
        <?php } ?>
                    </li>
                </ul>
            </nav>
        </div>
        
    </div>
</section>
<?php include('footer.php'); ?>