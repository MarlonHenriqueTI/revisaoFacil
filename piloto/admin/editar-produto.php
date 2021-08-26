<?php include('header.php') ;

$id_produto = $_GET['id'];
$produto = selecionarProdutoId($conexao, $id_produto);
$imagens = selecionarImagensProduto($conexao, $produto['codigo']);
$video = selecionarVideoProduto($conexao, $produto['id']);
?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 text-start">
                <h4 id="titulo-painel">Editar <?php echo $produto['nome']; ?></h4>
            </div>
            <div class="col-md text-end">
                <a href="video-produto.php?id=<?php echo $produto['id']; ?>" class="btn btn-dark">Definir video</a>
            </div>
            <div class="col-md text-end">
                <a href="gerenciar-midia.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Gerenciar Midia</a>
            </div>
            <div class="col-md">
                <button class="btn btn-danger" onclick="history.back()">
                   Voltar 
                </button>
            </div>
        </div>
        <hr>
        <form action="alterar-produto.php" method="post">
        <div class="row">
        <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código</label>
                    <input type="text" disabled class="form-control" name="codigo" required value="<?php echo $produto['codigo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" required placeholder="Nome" value="<?php echo $produto['nome']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Preço</label>
                    <input type="number" class="form-control" name="preco" required placeholder="preço" value="<?php echo $produto['preco']; ?>" step="0.01">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Multiplicador de preço promocional</label>
                    <input type="number" class="form-control" name="multiplicador" required placeholder="preço" value="<?php echo $produto['multiplicador']; ?>">
                    <small>Esta regra define o preço "riscado do produto" por padrão o multiplicador é de 2x significa que o preço do produto será de R$<?php echo $produto['preco']*2; ?> por R$<?php echo $produto['preco']; ?>, ou seja o preço vezes o numero definido aqui</small>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="id_categoria" class="form-control" required>
                        <option value="<?php echo $produto['id_categoria']; ?>" selected><?php $cate = selecionarCategoria($conexao, $produto['id_categoria']); echo $cate['nome'];?></option>
                        <?php $categorias = selecionarTodasCategorias($conexao);
                        foreach ($categorias as $cat) {?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                       <?php } ?>
                    </select>
                </div>
            </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3"><?php echo $produto['descricao']; ?></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <select name="status" class="form-control" required>
                        <option value="<?php echo $produto['status']; ?>" selected><?php echo $produto['status']; ?></option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo (exclui o produto da loja mas ele continua no sistema)</option>
                    </select>
                    <input type="hidden" value="<?php echo $key['id']; ?>" name="id">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Especificação</label>
                    <textarea name="especificacao" class="form-control" rows="3"><?php echo $produto['especificacao']; ?></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Aplicação</label>
                    <textarea name="aplicacao" class="form-control" rows="5"><?php echo $produto['aplicacao']; ?></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" name="marca" placeholder="Marca" value="<?php echo $produto['marca']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código do produto</label>
                    <input type="text" class="form-control" name="codigo_produto" value="<?php echo $produto['codigo_produto']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>NCM</label>
                    <input type="text" class="form-control" name="ncm" value="<?php echo $produto['ncm']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Garantia</label>
                    <input type="text" class="form-control" name="garantia" value="<?php echo $produto['garantia']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Lado</label>
                    <input type="text" class="form-control" name="lado" value="<?php echo $produto['lado']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Posição</label>
                    <input type="text" class="form-control" name="posicao" value="<?php echo $produto['posicao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código de barras</label>
                    <input type="text" class="form-control" name="codigo_barras" value="<?php echo $produto['codigo_barras']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Peso Bruto</label>
                    <input type="number" class="form-control" name="peso_bruto" value="<?php echo $produto['peso_bruto']; ?>" step="0.001">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Codigo da montadora</label>
                    <input type="text" class="form-control" name="codigo_montadora" value="<?php echo $produto['codigo_montadora']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Consulte Manual</label>
                    <input type="text" class="form-control" name="consulte_manual" value="<?php echo $produto['consulte_manual']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Direção</label>
                    <input type="text" class="form-control" name="direcao" value="<?php echo $produto['direcao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Assistencia do Fabricante</label>
                    <input type="text" class="form-control" name="assistencia_fabricante" value="<?php echo $produto['assistencia_fabricante']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Tipo</label>
                    <input type="text" class="form-control" name="tipo" value="<?php echo $produto['tipo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Caracteristicas</label>
                    <input type="text" class="form-control" name="caracteristicas" value="<?php echo $produto['caracteristicas']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Composição</label>
                    <input type="text" class="form-control" name="composicao" value="<?php echo $produto['composicao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca</label>
                    <input type="text" class="form-control" name="rosca" value="<?php echo $produto['rosca']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Medida</label>
                    <input type="text" class="form-control" name="medida" value="<?php echo $produto['medida']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro</label>
                    <input type="text" class="form-control" name="diametro" value="<?php echo $produto['diametro']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro da rosca</label>
                    <input type="text" class="form-control" name="diametro_rosca" value="<?php echo $produto['diametro_rosca']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Sistema</label>
                    <input type="text" class="form-control" name="sistema" value="<?php echo $produto['sistema']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Quantidade de furos</label>
                    <input type="number" class="form-control" name="quantidade_furos" value="<?php echo $produto['quantidade_furos']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro do furo do rolamento</label>
                    <input type="text" class="form-control" name="diametro_furo_rolamento" value="<?php echo $produto['diametro_furo_rolamento']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Comprimento</label>
                    <input type="text" class="form-control" name="comprimento" value="<?php echo $produto['comprimento']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Relação</label>
                    <input type="text" class="form-control" name="relacao" value="<?php echo $produto['relacao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Quantidade de dentes</label>
                    <input type="text" class="form-control" name="quantidade_dentes" value="<?php echo $produto['quantidade_dentes']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Material</label>
                    <input type="text" class="form-control" name="material" value="<?php echo $produto['material']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" class="form-control" name="modelo" value="<?php echo $produto['modelo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Fixação</label>
                    <input type="text" class="form-control" name="fixacao" value="<?php echo $produto['fixacao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Dentes Internos</label>
                    <input type="text" class="form-control" name="dentes_internos" value="<?php echo $produto['dentes_internos']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Combustível</label>
                    <input type="text" class="form-control" name="combustivel" value="<?php echo $produto['combustivel']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Ribs</label>
                    <input type="text" class="form-control" name="ribs" value="<?php echo $produto['ribs']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Número de terminais</label>
                    <input type="text" class="form-control" name="numero_terminais" value="<?php echo $produto['numero_terminais']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Torque maximo aperto copo</label>
                    <input type="text" class="form-control" name="torque_maximo_aperto_copo" value="<?php echo $produto['torque_maximo_aperto_copo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Localização</label>
                    <input type="text" class="form-control" name="localizacao" value="<?php echo $produto['localizacao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Pressão</label>
                    <input type="text" class="form-control" name="pressao" value="<?php echo $produto['pressao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Geração</label>
                    <input type="text" class="form-control" name="geracao" value="<?php echo $produto['geracao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Motor</label>
                    <input type="text" class="form-control" name="motor" value="<?php echo $produto['motor']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Cambio</label>
                    <input type="text" class="form-control" name="cambio" value="<?php echo $produto['cambio']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Tração</label>
                    <input type="text" class="form-control" name="tracao" value="<?php echo $produto['tracao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código da peça simplificado</label>
                    <input type="text" class="form-control" name="codigo_peca_simplificado" value="<?php echo $produto['codigo_peca_simplificado']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca lado mecanismo</label>
                    <input type="text" class="form-control" name="rosca_lado_mecanismo" value="<?php echo $produto['rosca_lado_mecanismo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca lado terminal</label>
                    <input type="text" class="form-control" name="rosca_lado_terminal" value="<?php echo $produto['caracteristicas']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca lado articulação</label>
                    <input type="text" class="form-control" name="rosca_lado_articulacao" value="<?php echo $produto['rosca_lado_articulacao']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro interno</label>
                    <input type="text" class="form-control" name="diametro_interno" value="<?php echo $produto['diametro_interno']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Grupo</label>
                    <input type="text" class="form-control" name="grupo" value="<?php echo $produto['grupo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Largura</label>
                    <input type="text" class="form-control" name="largura" value="<?php echo $produto['largura']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro externo</label>
                    <input type="text" class="form-control" name="diametro_externo" value="<?php echo $produto['diametro_externo']; ?>">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Subgrupo</label>
                    <input type="text" class="form-control" name="subgrupo" value="<?php echo $produto['subgrupo']; ?>">
                </div>
              </div>

              <input type="hidden" value="<?php echo $produto['id']; ?>" name="id">
              <div class="col-12 mt-2 text-end">
                  <button class="btn btn-primary" type="submit">Editar</button>
              </div>
          </div>  
        </form>
    </div>
</section>


<?php include('footer.php'); ?>

