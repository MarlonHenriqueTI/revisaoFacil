<?php
include('header.php');
?>

<section id="slider-inicial">
    <div class="owl-carousel">
        <div>
            <img src="imagens/bg1.jpg" alt="slider" class="img-fluid">
        </div>
        <div>
            <img src="imagens/bg2.jpg" alt="slider" class="img-fluid">
        </div>
        <div>
            <img src="imagens/bg3.jpg" alt="slider" class="img-fluid">
        </div>
    </div>
</section>
<script>
    function carrega_dados(tipo) {
        var modelo = document.getElementById('modelo');
        var marca = document.getElementById('marca');
        var veiculo = document.getElementById('veiculo');
        var ano = document.getElementById('ano');
         var request = $.ajax({
            url: "carrega-dados.php",
            method: "POST",
            data: {
                tipo: tipo,
                cat_id: veiculo.value,
                marca: marca.value, 
                modelo : modelo.value
            },
            dataType: "json",
            success: function(data) {
                var html = '';
                console.log(data);
                for (var count = 0; count < data.length; count++) {
                    if (tipo == 'marcas') {
                        html += '<option value="' + data[count].Value + '">' + data[count].Label + '</option>';
                    } else if (tipo == 'modelo') {
                        html += '<option value="' + data[count].Value + '">' + data[count].Label + '</option>';
                    }  else if (tipo == 'ano') {
                        html += '<option value="' + data[count].Value + '">' + data[count].Label + '</option>';
                    }
                }
                if (tipo == 'marcas') {
                    $('#marca').html(html);
                    $('#marca').selectpicker('refresh');
                } else if (tipo == 'modelo') {
                    $('#modelo').html(html);
                    $('#modelo').selectpicker('refresh');
                } else if (tipo == 'ano') {
                    $('#ano').html(html);
                    $('#ano').selectpicker('refresh');
                }
            }, 
            error: function(data) {
             alert("Ocorreu um erro ao carregar os dados."+JSON.stringify(data));
           }
        });
    }

</script>

<section id="sobreposiçao">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 id="titulo-sobreposicao">Conheça as peças da sua Revisão!</h2>
            </div>
            <div class="col-12 text-center">
                <p id="texto-sobreposicao">A Revisão Fácil te ajuda a encontrar as peças do seu veículo.</p>
            </div>
        </div>
        <form action="cadastro-rapido.php" method="POST" id="form-preto">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <select name="veiculo" id="veiculo" onchange="carrega_dados('marcas')" class="selectpicker" data-live-search="true" required>
                            <option value="" selected disabled>Veículo</option>
                            <option value="1">Carro</option>
                            <option value="2">Moto</option>
                            <option value="3">Caminhôes e Ônibus</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <select name="marca" id="marca" onchange="carrega_dados('modelo')" class="selectpicker" data-live-search="true" required>
                            <option value="" selected disabled>Marca</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <select name="modelo" id="modelo" class="selectpicker" onchange="carrega_dados('ano')"  data-live-search="true" required>
                            <option value="" selected disabled>Modelo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <select name="ano" id="ano" class="selectpicker" data-live-search="true" required>
                            <option value="" selected disabled>Ano</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <input type="number" class="form-control" name="km" placeholder="KM" step="0.01" required>
                    </div>
                </div>
            </div>
            <div class="row text-center  justify-content-center">
                <div class="col-md-4" style="margin-top: 15px;">
                    <button type="submit" class="btn btn-primary" id="btn-buscar">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</section>

<section id="carrosel-produtos">
    <div class="container">
        <h2>Ofertas Especiais</h2>
        <?php $produtos = selecionarProdutos($conexao, 4); ?>
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row mt-5 p-3">
                            <?php foreach ($produtos as $produto) {
                                $imagens = selecionarImagensProduto($conexao, $produto['codigo']);
                            ?>
                                <div class="col-sm-3">
                                    <a href="single.php?codigo=<?php echo $produto['codigo']; ?>" class="card-link">
                                        <div class="card p-3 mb-3">
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
                                                    <p class="strikeout"><b><?php echo 'R$' . number_format($produto['preco'] * $produto['multiplicador'], 2, ',', ''); ?></b></p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="preco-card"><?php echo 'R$' . number_format($produto['preco'], 2, ',', ''); ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="parcelamento-card"><b><?php echo '3x R$' . number_format($produto['preco'] / 3, 2, ',', ''); ?></b></p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="sem-juros-card">SEM JUROS</p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <p><b>Ou <span style="color:red;"><?php echo number_format($produto['preco'] / 0.01, 0, ',', ''); ?> pontos</span></b></p>
                                                </div>
                                                <div class="col-12">
                                                    <small class="text-muted text-uppercase"><i class="fas fa-shopping-cart" style="color:#54b6e5 ;"></i> pague com pontos <b style="color:#54b6e5;"><?php echo number_format($produto['preco'] / 0.01, 0, ',', ''); ?></b> pontos</small>
                                                </div>
                                                <div class="col-12">
                                                    <small class="text-muted text-uppercase"><i class="fas fa-trophy" style="color:#54b6e5 ;"></i> Ao realizar essa compra você ganhará <b style="color:#54b6e5;"><?php echo number_format($produto['preco'], 0, ',', ''); ?></b> pontos</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="banner-menor-carousel">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="imagens/Ofertas.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imagens/pastilha de freio.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imagens/Suspensão & Amortecedor.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imagens/Pastilhas.png" alt="Third slide">
            </div>
        </div>
    </div>
</section>

<section id="carousel-icones">
    <div id="car-icones" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/venda-rapida.svg" alt="First slide">
                            <p>Venda na revisão</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/entrega-agendada.svg" alt="First slide">
                            <p>Agende sua revisão</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/mecanica.svg" alt="First slide">
                            <p>Seja mecânico parceiro</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/entrega-gratis.svg" alt="First slide">
                            <p>Frete grátis a partir de R$100</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/gps.svg" alt="First slide">
                            <p>Rastreie seu produto</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/caixa-de-devolucao.svg" alt="First slide">
                            <p>Devolução fácil</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/satisfacao-garantida.svg" alt="First slide">
                            <p>Garantia</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/linha-de-credito.svg" alt="First slide">
                            <p>Parcele sem juros</p>
                        </a>
                    </div>
                    <div class="col-md col text-center">
                        <a href="#">
                            <img src="imagens/compras-online.svg" alt="First slide">
                            <p>Venda na revisão</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="acessorios">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <a href="#">
                    <img src="imagens/Copy of certificate of.png" alt="acessorios" class="img-fluid">
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="#">
                    <img src="imagens/certificate of.png" alt="acessorios" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>

<section id="banner-parceiros-carousel">
    <div id="parceiros" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="imagens/1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imagens/2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imagens/3.png" alt="Third slide">
            </div>
        </div>
    </div>
</section>

<section id="lojas-parceiras">
    <div class="container">
        <h2>Lojas Parceiras</h2>
        <hr>
        <div class="row">
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
            <div class="col-md-2 col-6">
                <img src="imagens/Design sem nome.png" alt="loja parceira" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section id="informacoes">
    <div class="container">
        <div class="row">
            <div class="col-3 text-center">
                <img src="imagens/pagamento-com-cartao.svg" alt="icone" class="img-fluid icone">
                <p>Pague com cartão de crédito, Pix ou Boleto</p>
            </div>
            <div class="col-3 text-center">
                <img src="imagens/seguranca-na-web.svg" alt="icone" class="img-fluid icone">
                <p>Compre com segurança total</p>
            </div>
            <div class="col-3 text-center">
                <img src="imagens/confiabilidade.svg" alt="icone" class="img-fluid icone">
                <p>Peças de procedência</p>
            </div>
            <div class="col-3 text-center">
                <img src="imagens/entregador.svg" alt="icone" class="img-fluid icone">
                <p>Frete grátis e rápido</p>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>