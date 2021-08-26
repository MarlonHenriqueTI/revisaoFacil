<?php
$total = 0;
$itens = 1;
include('header.php');
$frete = 50.90;
?>
<style>
    .card-header {
        background: #fff;
        border: none;
    }
</style>

<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-7 p-5">
                <div class="card p-3">
                    <div class="card-header">
                        <b style="font-size: 1.3em;">Preencha seus dados para finalizar a compra</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="group">
                                    <label>Nome Completo</label>
                                    <input type="text" required name="name" placeholder="Seu Nome">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">
                                    <label>E-mail</label>
                                    <input type="email" required name="email" placeholder="Seu E-mail">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">
                                    <label>CPF</label>
                                    <input type="text" placeholder="XXX.XXX.XXX-XX" required name="cpf" id="cpf" onblur="validarCPF()" class="cpf">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">
                                    <label>Data de nascimento</label>
                                    <input type="date" required name="birth_date" placeholder="Em qual dia você nasceu">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">
                                    <label>Celular para contato</label>
                                    <input type="text" name="number_contact" required class="celular" placeholder="(xx) 9 XXXX-XXXX">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">
                                    <label>CEP</label>
                                    <input required type="text" name="postal_code" id="cep_entrega" class="mascCEPentrega" value="" size="10" maxlength="9" onblur="pesquisacepentrega(this.value);">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="https://buscacepinter.correios.com.br/app/localidade_logradouro/index.php" target="_blank">Não sei o meu CEP</a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group">
                                        <label>Estado</label>
                                        <input required type="text" name="state" id="uf_entrega" size="2">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group">
                                        <label>Cidade</label>
                                        <input required type="text" name="city" id="cidade_entrega">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="group">
                                        <label>Rua/Avenida</label>
                                        <input required type="text" name="street" id="rua_entrega">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group">
                                        <label>Bairro</label>
                                        <input required type="text" name="neighborhood" id="bairro_entrega">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group">
                                        <label>Numero</label>
                                        <input required type="number" name="number">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group">
                                        <label>Complemento</label>
                                        <input required type="text" name="completion">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group">
                                        <label>Ponto de referencia</label>
                                        <input required type="text" name="referencia_entrega">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 p-5">
                <div class="card p-3">
                    <div class="card-header">
                        <b style="font-size: 1.3em;">Você esta comprando:</b>
                        <hr>
                        <?php
                        if (!empty($_SESSION['carrinho'])) {
                            foreach ($_SESSION['carrinho'] as $key) {
                                $produto = selecionarProduto($conexao, $key['cod']);
                                $imagens = selecionarImagensProduto($conexao, $key['cod']);
                                $total = $total + $produto['preco'] * $key['quantidade'];
                                $itens = $itens + $key['quantidade'];

                        ?>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo $imagens['imagem01']; ?>" alt="imagem do produto" class="img-responsive img-fluid">
                                    </div>
                                    <div class="col">
                                        <p style="margin: 0;"><?php echo $produto['nome']; ?></p>
                                        <span class="text-muted" style="margin: 0;"><?php echo 'R$' . number_format($produto['preco'], 2, ',', ''); ?> x <?php echo $key['quantidade']; ?></span><br>
                                        <span class="text-muted" style="margin: 0;">Total: <?php echo 'R$' . number_format($produto['preco'] * $key['quantidade'], 2, ',', ''); ?></span>
                                    </div>
                                </div>
                                <hr>
                        <?php }
                        } ?>
                        <h5>Quantidade de itens: <?php echo $itens - 1; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p>Selecione o metodo de entrega:</p>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="frete" id="flexRadioDefault1" value="PAC">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <b>PAC (15 a 30 dias) R$25,90</b>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="frete" id="flexRadioDefault2" value="SEDEX">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <b>SEDEX (3 dias) R$50,90</b>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="frete" id="flexRadioDefault2" checked value="Gratis">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <b>Frete Grátis</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <h5>Total: <?php echo 'R$' . number_format($total, 2, ',', ''); ?></h5>
                            </div>
                            <div class="col-12 mt-3">
                                Como deseja realizar o pagamento?<br><br>
                                <button class="btn btn-dark m-1" style="width: 100%;" type="button" data-toggle="collapse" data-target="#cartao" aria-expanded="false" aria-controls="collapseExample">
                                    Cartão de credito
                                </button>
                                <button class="btn btn-info m-1" style="width: 100%;" type="button" data-toggle="collapse" data-target="#boleto" aria-expanded="false" aria-controls="collapseExample">
                                    Boleto
                                </button>
                                <button class="btn btn-warning m-1" style="width: 100%;" type="button" data-toggle="collapse" data-target="#pontos" aria-expanded="false" aria-controls="collapseExample">
                                    Pagar com pontos 
                                </button>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="collapse" id="cartao">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <div class="form-group">
                                                    <label>Nome no cartão</label>
                                                    <input type="text" name="card_name" placeholder="Nome no cartão">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div class="form-group">
                                                    <label>Numero do cartão</label>
                                                    <input type="text" name="card_number" placeholder="XXXX XXXX XXXX XXXX">
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="form-group">
                                                    <label>Mês de vencimento</label>
                                                    <input type="number" name="card_expdate_month" placeholder="XX">
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="form-group">
                                                    <label>Ano de vencimento</label>
                                                    <input type="number" name="card_expdate_year" placeholder="XXXX">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div class="form-group">
                                                    <label>CVV</label>
                                                    <input type="number" name="card_cvv" placeholder="XXX">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div class="form-group">
                                                    <label>Deseja dividir sua compra de quantas vezes?</label>
                                                    <select name="split" class="form-control">
                                                        <option value="1" selected> 1x de <?php echo 'R$' . number_format($total + $frete, 2, ',', ''); ?></option>
                                                        <option value="2"> 2x de <?php echo 'R$' . number_format(($total + $frete) / 2, 2, ',', ''); ?></option>
                                                        <option value="3"> 3x de <?php echo 'R$' . number_format(($total + $frete) / 3, 2, ',', ''); ?></option>
                                                        <option value="4"> 4x de <?php echo 'R$' . number_format(($total + $frete) / 4, 2, ',', ''); ?></option>
                                                        <option value="5"> 5x de <?php echo 'R$' . number_format(($total + $frete) / 5, 2, ',', ''); ?></option>
                                                        <option value="6"> 6x de <?php echo 'R$' . number_format(($total + $frete) / 6, 2, ',', ''); ?></option>
                                                        <option value="7"> 7x de <?php echo 'R$' . number_format(($total + $frete) / 7, 2, ',', ''); ?></option>
                                                        <option value="8"> 8x de <?php echo 'R$' . number_format(($total + $frete) / 8, 2, ',', ''); ?></option>
                                                        <option value="9"> 9x de <?php echo 'R$' . number_format(($total + $frete) / 9, 2, ',', ''); ?></option>
                                                        <option value="10"> 10x de <?php echo 'R$' . number_format(($total + $frete) / 10, 2, ',', ''); ?></option>
                                                        <option value="11"> 11x de <?php echo 'R$' . number_format(($total + $frete) / 11, 2, ',', ''); ?></option>
                                                        <option value="12"> 12x de <?php echo 'R$' . number_format(($total + $frete) / 12, 2, ',', ''); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="boleto">
                                    <div class="card card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="boleto" id="flexRadioDefault1" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <b>Pagar com boleto</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="pontos">
                                    <div class="card card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pontos" id="flexRadioDefault1" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <b>Pagar com pontos (<?php echo number_format($total / 0.01, 0, ',', ''); ?> pontos)</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn btn-success" type="submit" style="width: 100%;" onclick="alert('Estamos finalizando a integração ao gateway de pagamento e ao sistema de pontos, em breve esta função estará liberada.')">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>