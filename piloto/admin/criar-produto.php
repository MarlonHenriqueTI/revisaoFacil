<?php include('header.php') ; ?>

<section id="gerenciar-produtos" class="p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 text-start">
                <h4 id="titulo-painel">Adicionar um produto</h4>
            </div>
            <div class="col-md">
                <button class="btn btn-danger" onclick="history.back()">
                   Voltar 
                </button>
            </div>
        </div>
        <hr>
        <form action="add-produto.php" method="post">
        <div class="row">
        <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código</label>
                    <input type="text" class="form-control" name="codigo" required >
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" required placeholder="Nome">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Preço</label>
                    <input type="number" class="form-control" name="preco" required placeholder="preço" step="0.01">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Multiplicador de preço promocional</label>
                    <input type="number" class="form-control" name="multiplicador" required placeholder="preço" >
                    <small>Esta regra define o preço "riscado do produto" por padrão o multiplicador é de 2x significa que o preço do produto será de R$<?php echo $produto['preco']*2; ?> por R$<?php echo $produto['preco']; ?>, ou seja o preço vezes o numero definido aqui</small>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="id_categoria" class="form-control" required>
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
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <select name="status" class="form-control" required>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo (exclui o produto da loja mas ele continua no sistema)</option>
                    </select>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Especificação</label>
                    <textarea name="especificacao" class="form-control" rows="3"></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Aplicação</label>
                    <textarea name="aplicacao" class="form-control" rows="5"></textarea>
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" name="marca" placeholder="Marca">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código do produto</label>
                    <input type="text" class="form-control" name="codigo_produto">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>NCM</label>
                    <input type="text" class="form-control" name="ncm">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Garantia</label>
                    <input type="text" class="form-control" name="garantia">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Lado</label>
                    <input type="text" class="form-control" name="lado">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Posição</label>
                    <input type="text" class="form-control" name="posicao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código de barras</label>
                    <input type="text" class="form-control" name="codigo_barras">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Peso Bruto</label>
                    <input type="number" class="form-control" name="peso_bruto" step="0.001">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Codigo da montadora</label>
                    <input type="text" class="form-control" name="codigo_montadora" >
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Consulte Manual</label>
                    <input type="text" class="form-control" name="consulte_manual">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Direção</label>
                    <input type="text" class="form-control" name="direcao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Assistencia do Fabricante</label>
                    <input type="text" class="form-control" name="assistencia_fabricante">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Tipo</label>
                    <input type="text" class="form-control" name="tipo">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Caracteristicas</label>
                    <input type="text" class="form-control" name="caracteristicas">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Composição</label>
                    <input type="text" class="form-control" name="composicao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca</label>
                    <input type="text" class="form-control" name="rosca">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Medida</label>
                    <input type="text" class="form-control" name="medida">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro</label>
                    <input type="text" class="form-control" name="diametro">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro da rosca</label>
                    <input type="text" class="form-control" name="diametro_rosca">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Sistema</label>
                    <input type="text" class="form-control" name="sistema">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Quantidade de furos</label>
                    <input type="number" class="form-control" name="quantidade_furos">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro do furo do rolamento</label>
                    <input type="text" class="form-control" name="diametro_furo_rolamento">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Comprimento</label>
                    <input type="text" class="form-control" name="comprimento">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Relação</label>
                    <input type="text" class="form-control" name="relacao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Quantidade de dentes</label>
                    <input type="text" class="form-control" name="quantidade_dentes">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Material</label>
                    <input type="text" class="form-control" name="material">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" class="form-control" name="modelo">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Fixação</label>
                    <input type="text" class="form-control" name="fixacao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Dentes Internos</label>
                    <input type="text" class="form-control" name="dentes_internos">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Combustível</label>
                    <input type="text" class="form-control" name="combustivel">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Ribs</label>
                    <input type="text" class="form-control" name="ribs">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Número de terminais</label>
                    <input type="text" class="form-control" name="numero_terminais">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Torque maximo aperto copo</label>
                    <input type="text" class="form-control" name="torque_maximo_aperto_copo">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Localização</label>
                    <input type="text" class="form-control" name="localizacao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Pressão</label>
                    <input type="text" class="form-control" name="pressao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Geração</label>
                    <input type="text" class="form-control" name="geracao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Motor</label>
                    <input type="text" class="form-control" name="motor">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Cambio</label>
                    <input type="text" class="form-control" name="cambio">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Tração</label>
                    <input type="text" class="form-control" name="tracao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Código da peça simplificado</label>
                    <input type="text" class="form-control" name="codigo_peca_simplificado">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca lado mecanismo</label>
                    <input type="text" class="form-control" name="rosca_lado_mecanismo">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca lado terminal</label>
                    <input type="text" class="form-control" name="rosca_lado_terminal">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Rosca lado articulação</label>
                    <input type="text" class="form-control" name="rosca_lado_articulacao">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro interno</label>
                    <input type="text" class="form-control" name="diametro_interno">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Grupo</label>
                    <input type="text" class="form-control" name="grupo">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Largura</label>
                    <input type="text" class="form-control" name="largura">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Diametro externo</label>
                    <input type="text" class="form-control" name="diametro_externo">
                </div>
              </div>
              <div class="col-12 mt-2">
                <div class="form-group">
                    <label>Subgrupo</label>
                    <input type="text" class="form-control" name="subgrupo">
                </div>
              </div>
              <div class="col-12 mt-2 text-end">
                  <button class="btn btn-primary" type="submit">Adicionar Produto</button>
              </div>
          </div>  
        </form>
    </div>
</section>


<?php include('footer.php'); ?>

