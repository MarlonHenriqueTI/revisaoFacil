<?php include('header.php');

$codigo = $_GET['codigo'];
$produto = selecionarProduto($conexao, $codigo);
$imagens = selecionarImagensProduto($conexao, $codigo);
$video = selecionarVideoProduto($conexao, $codigo);
?>

<section id="single-produto" class="mb-5">
  <div class="banner-topo">
    <img src="imagens/banner-topo-produto.png" alt="banner topo produto" style="width: 100%;">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 border-end">
        <div class="d-flex flex-column justify-content-center">
          <div class="row mt-3 mb-3">
            <div class="col-2">
              <div class="thumbnail_images">
                <ul id="thumbnail">
                  <?php if (!empty($imagens['imagem01'])) { ?>
                    <li><img onclick="changeImage(this)" src="<?php echo $imagens['imagem01']; ?>" width="70"></li>
                  <?php } ?>
                  <?php if (!empty($imagens['imagem02'])) { ?>
                    <li><img onclick="changeImage(this)" src="<?php echo $imagens['imagem02']; ?>" width="70"></li>
                  <?php } ?>
                  <?php if (!empty($imagens['imagem03'])) { ?>
                    <li><img onclick="changeImage(this)" src="<?php echo $imagens['imagem03']; ?>" width="70"></li>
                  <?php } ?>
                  <?php if (!empty($imagens['imagem04'])) { ?>
                    <li><img onclick="changeImage(this)" src="<?php echo $imagens['imagem04']; ?>" width="70"></li>
                  <?php } ?>
                  <?php if (!empty($imagens['imagem05'])) { ?>
                    <li><img onclick="changeImage(this)" src="<?php echo $imagens['imagem05']; ?>" width="70"></li>
                  <?php } ?>
                  <?php if (!empty($imagens['imagem06'])) { ?>
                    <li><img onclick="changeImage(this)" src="<?php echo $imagens['imagem06']; ?>" width="70"></li>
                  <?php } ?>
                  <?php if (!empty($video['link'])) { ?>
                    <li><img onclick="mudarParaVideo('<?php echo $video['link']; ?>')" src="https://revisaofacil.com.br/images/play.png" width="70"></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <div class="col">
              <div class="main_image">
                <img src="<?php echo $imagens['imagem01']; ?>" id="main_product_image" width="100%">
                <iframe width="100%" height="600" src="<?php echo $video['link']; ?>" id="video-produto" style="display:none;">
                </iframe>
              </div>
              <div class="row" style="margin-top: 112px;">
                <div class="col-3 text-center">
                  <a href="#" class="link-preto">
                    <img src="arquivos/mecanica.png" alt="icone-mecanico" class="img-fluid" style="width: 45px;">
                    <p class="texto-single">Dica Mecânico Amigo</p>
                  </a>
                </div>
                <div class="col-3 text-center">
                  <a href="#" class="link-preto">
                    <img src="arquivos/professor-no-quadro.png" alt="icone-professor" class="img-fluid" style="width: 45px;">
                    <p class="texto-single">Consulte O Manual Do Fabricante</p>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-6 pt-5">
        <div class="row">
          <div class="col-12">
            <h3 id="nome-produto-single"><?php echo $produto['nome']; ?></h3>
          </div>
          <div class="col-12">
            <p class="texto-single"><b><?php echo $produto['codigo']; ?></b></p>
          </div>
          <div class="col-12 mb-3">
            <p class="texto-single"><?php echo $produto['descricao']; ?></p>
          </div>
          <div class="row">
            <div class="col-3">
              <span class="preco-riscado-single"><?php echo 'R$' . number_format($produto['preco'] * $produto['multiplicador'], 2, ',', ''); ?></span>
            </div>
            <div class="col-3">
              <span class="preco-venda-single"><?php echo 'R$' . number_format($produto['preco'], 2, ',', ''); ?></span>
            </div>
            <div class="col text-start">
              <span class="parcelamento"> 3x <?php echo 'R$' . number_format($produto['preco'] / 3, 2, ',', ''); ?> <span class="texto-vermelho-single">Sem Juros</span></span>
            </div>
            <div class="col-12 mt-3">
              <p class="text-muted texto-single"><i class="fas fa-shopping-cart" style="color:#54b6e5 ;"></i> pague com pontos <b style="color:#54b6e5;"><?php echo number_format($produto['preco'] / 0.01, 0, ',', ''); ?></b> pontos</p>
            </div>
            <div class="col-12 mt-1 mb-2">
              <p class="text-muted texto-single"><i class="fas fa-trophy" style="color:#54b6e5 ;"></i> Ao realizar essa compra você ganhará <b style="color:#54b6e5;"><?php echo number_format($produto['preco'], 0, ',', ''); ?></b> pontos</p>
            </div>
            <div class="col-12">
              <div class="row mt-3">
                <div class="col-md-6" style="border-right: 1px solid #000000;">
                  <p class="texto-maior-single"><b>Marca:</b> <?php echo $produto['marca']; ?></p>
                  <p class="texto-maior-single"><b>Fabricante:</b> <?php echo $produto['fabricante']; ?></p>
                  <p class="texto-maior-single"><b>Cód. Fabricante:</b> <?php echo $produto['codigo_fabricante']; ?></p>
                  <p class="texto-maior-single"><b>Garantia:</b> <?php echo $produto['garantia']; ?></p>
                  <p class="texto-maior-single"><b>Detalhes:</b> <?php echo $produto['detalhes']; ?></p>
                  <p class="texto-maior-single"><b>Embalagem:</b> <?php echo $produto['embalagem']; ?></p>
                </div>
                <div class="col-md-6 justify-content-center d-flex" style="flex-direction: column; font-weight:600;">
                  <p class="text-uppercase">Compra garantida</p>
                  <p class="text-uppercase">Frete Grátis</p>
                  <p class="text-uppercase">Devolução ou troca grátis</p>
                </div>
              </div>
            </div>
            <div class="col-12 mt-3">
              <p class="text-uppercase single-azul">Em estoque -<a href="#" class="link-azul"> 5 unidades em 5 lojas</a></p>
            </div>
            <div class="col-12 text-start">
              <a href="" id="facebook-share-btt" rel="nofollow" target="_blank" class="facebook-share-button"></a>
            </div>
            <div class="col-12">
              <p class="texto-single text-muted"><b>Compartilhe e ganhe 1 ponto</b> no Programa de Recompensa</p>
            </div>
            <div class="col-12 mt-3">
              <div class="row">
                <div class="col-4">
                  <div class="row">
                    <div class="col-1">
                      <i class="far fa-heart" style="color:#54b6e5 ; font-size: 1.1em;"></i>
                    </div>
                    <div class="col text-start">
                      <p class="texto-single">Adicionar aos favoritos</p>
                    </div>
                  </div>
                </div>
                <div class="col text-start">
                  <p class="texto-single"><b><a href="#" class="link-azul">Avisar um amigo</a></b></p>
                </div>
              </div>
            </div>
            <div class="col-12 mt-3 mb-1">
              <p class="texto-single"><b>Calcular frete e prazo de entrega</b></p>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-md">
                  <form>
                    <div class="input-group">
                      <div class="form-outline" style="width: 76%;">
                        <input type="search" id="form-frete" class="form-control" placeholder="CEP de entrega" name="frete" />
                      </div>
                      <button type="submit" class="btn btn-primary" id="botao-frete" >
                        OK
                      </button>
                    </div>
                  </form>
                </div>
                <div class="col-md">
                  <button class="btn btn-primary" id="botao-comprar-single" onclick="adicionarCarrinho('<?php echo $produto['codigo'];?>')">Comprar</button>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div id="resultado-frete"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12">
                <h5>Especificações do Fabricante</h5>
              </div>
              <div class="col-md-12 mt-3">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Marca</th>
                      <td><?php echo $produto['marca']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Código do Produto</th>
                      <td><?php echo $produto['codigo']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">NCM</th>
                      <td><?php echo $produto['ncm']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Garantia</th>
                      <td><?php echo $produto['garantia']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Quantidade de Pinos</th>
                      <td><?php echo $produto['quantidade_pinos']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Código de barras</th>
                      <td><?php echo $produto['codigo_barras']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Peso Bruto</th>
                      <td><?php echo $produto['peso'] . " kg"; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Código da Montadora</th>
                      <td><?php echo $produto['codigo_montadora']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="row">
              <div class="col-md-12">
                <h5>Compativel com</h5>
              </div>
              <div class="col-md-12">
                <form action="#">
                  <div class="form-group">
                    <select name="carro" id="carro" class="form-control">
                      <option value="" disabled selected>Carro</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="montadora" id="montadora" class="form-control">
                      <option value="" disabled selected>Montadora</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="modelo" id="modelo" class="form-control">
                      <option value="" disabled selected>Modelo</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="ano" id="ano" class="form-control">
                      <option value="" disabled selected>Ano</option>
                    </select>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!--perguntas e respostas -->
    <div class="ui-pdp-container__row ui-pdp-container__row--questions">
      <div class="ui-pdp-questions" id="questions">
        <h2 class="ui-pdp-questions__title">Perguntas e respostas</h2>
        <h3 class="ui-pdp-questions__subtitle">Qual informação você precisa?</h3>
        <div class="ui-pdp-questions__list-container">
          <ul class="ui-pdp-questions__list">
            <li class="ui-pdp-questions__item">
              <div class="ui-pdp-action-modal"><a class="ui-pdp-action-modal__link andes-button andes-button--quiet andes-button--medium ui-pdp-questions__link" href="#">Custo e prazo de envio</a></div>
            </li>
            <li class="ui-pdp-questions__item">
              <div class="ui-pdp-action-modal"><a class="ui-pdp-action-modal__link andes-button andes-button--quiet andes-button--medium ui-pdp-questions__link" href="#">Devoluções grátis</a></div>
            </li>
            <li class="ui-pdp-questions__item">
              <div class="ui-pdp-action-modal"><a class="ui-pdp-action-modal__link andes-button andes-button--quiet andes-button--medium ui-pdp-questions__link" href="#">Meios de pagamento</a></div>
            </li>
            <li class="ui-pdp-questions__item">
              <div class="ui-pdp-action-modal"><a class="ui-pdp-action-modal__link andes-button andes-button--quiet andes-button--medium ui-pdp-questions__link" href="#">Garantia</a></div>
            </li>
            <li class="ui-pdp-questions__item">
              <div class="ui-pdp-action-modal"><a class="ui-pdp-action-modal__link andes-button andes-button--quiet andes-button--medium ui-pdp-questions__link" href="#">Parcelado no boleto</a></div>
            </li>
          </ul>
        </div>
        <h3 aria-hidden="true" class="ui-pdp-questions__subtitle--question">Pergunte ao vendedor</h3>
        <form class="ui-pdp-questions__form" action="#" method="POST">
          <div class="ui-pdp-questions__content"><label class="ui-pdp--hide" for="question">Pergunte ao vendedor</label><label class="andes-form-control andes-form-control--textfield andes-form-control--multiline andes-form-control--default ui-pdp-questions__input">
              <div class="andes-form-control__control"><textarea id="question" name="question" autocomplete="off" rows="1" class="andes-form-control__field" maxlength="2000" style="overflow-x: hidden; overflow-wrap: break-word; height: 48px;" placeholder="Escreva a sua pergunta..."></textarea></div>
              <div class="andes-form-control__bottom"><span class="andes-form-control__message andes-form-control__message-fixed">Tempo aproximado de resposta: 25 minutos</span></div>
            </label></div><button type="submit" class="andes-button ui-pdp-questions__button andes-button--large andes-button--loud"><span class="andes-button__content">Perguntar</span></button>
        </form>
        <div class="ui-pdp-questions__questions-others-question-modal mt-24">
          <div class="ui-pdp-questions__questions-list">
            <h3 class="ui-pdp-questions__questions-list__title">Últimas feitas</h3>
            <div class="">
              <div class="ui-pdp-questions__questions-list__item-questions--others-questions">
                <div><span class="ui-pdp-color--BLACK ui-pdp-size--SMALL ui-pdp-family--REGULAR ui-pdp-questions__questions-list__question">Bom dia! Serve para o Honda fit 2016? É farol alto e baixo juntos. Obrigado!</span></div>
                <div class="ui-pdp-questions__questions-list__answer-container"><svg class="ui-pdp-icon ui-pdp-questions__questions-list__answer-container__icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                    <path fill="#000" fill-opacity=".25" fill-rule="evenodd" d="M0 0h1v11h11v1H0z"></path>
                  </svg>
                  <div class="ui-pdp-questions__questions-list__answer-container__answer">
                    <div class="ui-pdp-questions__questions-list__container-answer__isNoCollapsed"><span class="ui-pdp-color--GRAY ui-pdp-size--SMALL ui-pdp-family--REGULAR ui-pdp-questions__questions-list__answer-item__separate">sim, Obrigado pelo contato e aguardamos sua compra! Att. Equipe BOSSONIAUTOPARTS.</span></div><span class="ui-pdp-color--GRAY ui-pdp-size--XSMALL ui-pdp-family--REGULAR ui-pdp-questions__questions-list__answer-item__separate">17/07/2021</span><button class="ui-pdp-size--XSMALL ui-pdp-family--REGULAR ui-pdp-questions__questions-list__answer-item__denounce ui-pdp-questions__questions-list__answer-item__denounce__overriding-default-button">Denunciar<span class="ui-pdp--hide">Abrirá em uma nova janela</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ui-pdp-action-modal"><a class="ui-pdp-action-modal__link" href="#">Ver todas as perguntas</a></div>
        </div>
        <div class="ui-pdp-questions__no-questions--desktop"></div>
      </div>
    </div>
    

  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="aplicacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aplicação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-muted"><?php echo $produto['aplicacao']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>