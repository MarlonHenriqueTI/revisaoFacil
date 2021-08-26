<?php
include('header.php');
$total = 0;
$itens = 0;
?>

<section id="carrinho">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light text-center">
            <span style="font-size: 1.5em; m-3"> Carrinho de compras</span>
            <a href="loja.php" class="btn btn-warning m-3">Continue Comprando</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body" id="carrinho-produtos">
            <form action="checkout.php" method="post">
                <?php
                if (!empty($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $key) {
                        $produto = selecionarProduto($conexao, $key['cod']);
                        $imagens = selecionarImagensProduto($conexao, $key['cod']);
                        $total = $total + $produto['preco'] * $key['quantidade'];
                        $itens = $itens + $key['quantidade'];
                ?>
                        <!-- PRODUCT -->
                        <div class="row d-flex align-content-center align-items-center justify-content-center">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="<?php echo $imagens['imagem01']; ?>" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <h5 class="product-name"><strong><?php echo $produto['nome']; ?></strong></h5>
                                <small><?php echo $produto['codigo']; ?></small>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 14px">
                                    <h6><strong><?php echo 'R$' . number_format($produto['preco'], 2, ',', ''); ?><span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="number" step="1" max="99" min="1" onchange="mudarQuantidade('<?php echo $produto['codigo']; ?>', this.value)" value="<?php echo $key['quantidade'];  ?>" title="Quantidade" class="qty" size="4" id="quantidade">
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="excluirCarrinho('<?php echo $produto['codigo'];  ?>')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- END PRODUCT -->
                    <?php }
                } else { ?>
                    <div class="container-fluid mt-100">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body cart">
                                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                            <h3><strong>Seu carrinho esta vazio</strong></h3>
                                            <h4>Adicione produtos ao seu carrinho</h4> <a href="loja.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continuar comprando</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
        <div class="card-footer p-5">
            <div class="row">
                <div class="col-8">
                    <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Codigo do cupom">
                            </div>
                            <div class="col-6">
                                <input class="btn btn-secondary" value="Adicionar Cupom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="pull-right" style="margin: 5px">
                                Preço total: <b id="total"><?php echo 'R$' . number_format($total, 2, ',', ''); ?>
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <input type="hidden" name="itens" value="<?php echo $itens; ?>"></b>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success pull-right">Ir para o pagamento</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>