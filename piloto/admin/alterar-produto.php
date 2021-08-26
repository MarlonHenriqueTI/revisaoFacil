<?php

include('../functions.php');

$id = $_POST['id'];


if(isset($_POST['codigo'])){
    alterar($id, 'produtos', 'codigo', $_POST['codigo'], $conexao);
}

if(isset($_POST['nome'])){
    alterar($id, 'produtos', 'nome', $_POST['nome'], $conexao);
}


if(isset($_POST['preco'])){
    alterar($id, 'produtos', 'preco', $_POST['preco'], $conexao);
}


if(isset($_POST['descricao'])){
    alterar($id, 'produtos', 'descricao', $_POST['descricao'], $conexao);
}


if(isset($_POST['especificacao'])){
    alterar($id, 'produtos', 'especificacao', $_POST['especificacao'], $conexao);
}


if(isset($_POST['aplicacao'])){
    alterar($id, 'produtos', 'aplicacao', $_POST['aplicacao'], $conexao);
}


if(isset($_POST['marca'])){
    alterar($id, 'produtos', 'marca', $_POST['marca'], $conexao);
}


if(isset($_POST['codigo_produto'])){
    alterar($id, 'produtos', 'codigo_produto', $_POST['codigo_produto'], $conexao);
}


if(isset($_POST['ncm'])){
    alterar($id, 'produtos', 'ncm', $_POST['ncm'], $conexao);
}


if(isset($_POST['garantia'])){
    alterar($id, 'produtos', 'garantia', $_POST['garantia'], $conexao);
}


if(isset($_POST['lado'])){
    alterar($id, 'produtos', 'lado', $_POST['lado'], $conexao);
}


if(isset($_POST['posicao'])){
    alterar($id, 'produtos', 'posicao', $_POST['posicao'], $conexao);
}


if(isset($_POST['codigo_barras'])){
    alterar($id, 'produtos', 'codigo_barras', $_POST['codigo_barras'], $conexao);
}


if(isset($_POST['peso_bruto'])){
    alterar($id, 'produtos', 'peso_bruto', $_POST['peso_bruto'], $conexao);
}


if(isset($_POST['codigo_montadora'])){
    alterar($id, 'produtos', 'codigo_montadora', $_POST['codigo_montadora'], $conexao);
}


if(isset($_POST['consulte_manual'])){
    alterar($id, 'produtos', 'consulte_manual', $_POST['consulte_manual'], $conexao);
}


if(isset($_POST['direcao'])){
    alterar($id, 'produtos', 'direcao', $_POST['direcao'], $conexao);
}


if(isset($_POST['assistencia_fabricante'])){
    alterar($id, 'produtos', 'assistencia_fabricante', $_POST['assistencia_fabricante'], $conexao);
}


if(isset($_POST['tipo'])){
    alterar($id, 'produtos', 'tipo', $_POST['tipo'], $conexao);
}


if(isset($_POST['caracteristicas'])){
    alterar($id, 'produtos', 'caracteristicas', $_POST['caracteristicas'], $conexao);
}


if(isset($_POST['composicao'])){
    alterar($id, 'produtos', 'composicao', $_POST['composicao'], $conexao);
}


if(isset($_POST['rosca'])){
    alterar($id, 'produtos', 'rosca', $_POST['rosca'], $conexao);
}


if(isset($_POST['medida'])){
    alterar($id, 'produtos', 'medida', $_POST['medida'], $conexao);
}


if(isset($_POST['diametro'])){
    alterar($id, 'produtos', 'diametro', $_POST['diametro'], $conexao);
}


if(isset($_POST['diametro_rosca'])){
    alterar($id, 'produtos', 'diametro_rosca', $_POST['diametro_rosca'], $conexao);
}


if(isset($_POST['sistema'])){
    alterar($id, 'produtos', 'sistema', $_POST['sistema'], $conexao);
}


if(isset($_POST['quantidade_furos'])){
    alterar($id, 'produtos', 'quantidade_furos', $_POST['quantidade_furos'], $conexao);
}


if(isset($_POST['diametro_furo_rolamento'])){
    alterar($id, 'produtos', 'diametro_furo_rolamento', $_POST['diametro_furo_rolamento'], $conexao);
}


if(isset($_POST['comprimento'])){
    alterar($id, 'produtos', 'comprimento', $_POST['comprimento'], $conexao);
}


if(isset($_POST['relacao'])){
    alterar($id, 'produtos', 'relacao', $_POST['relacao'], $conexao);
}


if(isset($_POST['quantidade_dentes'])){
    alterar($id, 'produtos', 'quantidade_dentes', $_POST['quantidade_dentes'], $conexao);
}


if(isset($_POST['material'])){
    alterar($id, 'produtos', 'material', $_POST['material'], $conexao);
}


if(isset($_POST['modelo'])){
    alterar($id, 'produtos', 'modelo', $_POST['modelo'], $conexao);
}


if(isset($_POST['fixacao'])){
    alterar($id, 'produtos', 'fixacao', $_POST['fixacao'], $conexao);
}


if(isset($_POST['dentes_internos'])){
    alterar($id, 'produtos', 'dentes_internos', $_POST['dentes_internos'], $conexao);
}


if(isset($_POST['combustivel'])){
    alterar($id, 'produtos', 'combustivel', $_POST['combustivel'], $conexao);
}


if(isset($_POST['ribs'])){
    alterar($id, 'produtos', 'ribs', $_POST['ribs'], $conexao);
}


if(isset($_POST['numero_terminais'])){
    alterar($id, 'produtos', 'numero_terminais', $_POST['numero_terminais'], $conexao);
}


if(isset($_POST['torque_maximo_aperto_corque'])){
    alterar($id, 'produtos', 'torque_maximo_aperto_corque', $_POST['torque_maximo_aperto_corque'], $conexao);
}

if(isset($_POST['localizacao'])){
    alterar($id, 'produtos', 'localizacao', $_POST['localizacao'], $conexao);
}

if(isset($_POST['pressao'])){
    alterar($id, 'produtos', 'pressao', $_POST['pressao'], $conexao);
}

if(isset($_POST['geracao'])){
    alterar($id, 'produtos', 'geracao', $_POST['geracao'], $conexao);
}

if(isset($_POST['motor'])){
    alterar($id, 'produtos', 'motor', $_POST['motor'], $conexao);
}

if(isset($_POST['cambio'])){
    alterar($id, 'produtos', 'cambio', $_POST['cambio'], $conexao);
}

if(isset($_POST['tracao'])){
    alterar($id, 'produtos', 'tracao', $_POST['tracao'], $conexao);
}

if(isset($_POST['codigo_peca_simplificado'])){
    alterar($id, 'produtos', 'codigo_peca_simplificado', $_POST['codigo_peca_simplificado'], $conexao);
}

if(isset($_POST['rosca_lado_mecanico'])){
    alterar($id, 'produtos', 'rosca_lado_mecanico', $_POST['rosca_lado_mecanico'], $conexao);
}

if(isset($_POST['rosca_lado_terminal'])){
    alterar($id, 'produtos', 'rosca_lado_terminal', $_POST['rosca_lado_terminal'], $conexao);
}

if(isset($_POST['rosca_lado_articulacao'])){
    alterar($id, 'produtos', 'rosca_lado_articulacao', $_POST['rosca_lado_articulacao'], $conexao);
}

if(isset($_POST['diametro_interno'])){
    alterar($id, 'produtos', 'diametro_interno', $_POST['diametro_interno'], $conexao);
}

if(isset($_POST['grupo'])){
    alterar($id, 'produtos', 'grupo', $_POST['grupo'], $conexao);
}

if(isset($_POST['largura'])){
    alterar($id, 'produtos', 'largura', $_POST['largura'], $conexao);
}

if(isset($_POST['diametro_externo'])){
    alterar($id, 'produtos', 'diametro_externo', $_POST['diametro_externo'], $conexao);
}

if(isset($_POST['subgrupo'])){
    alterar($id, 'produtos', 'subgrupo', $_POST['subgrupo'], $conexao);
}

if(isset($_POST['id_categoria'])){
    alterar($id, 'produtos', 'id_categoria', $_POST['id_categoria'], $conexao);
}

if(isset($_POST['classificacao'])){
    alterar($id, 'produtos', 'classificacao', $_POST['classificacao'], $conexao);
}

if(isset($_POST['status'])){
    alterar($id, 'produtos', 'status', $_POST['status'], $conexao);
}

if(isset($_POST['multiplicador'])){
    alterar($id, 'produtos', 'multiplicador', $_POST['multiplicador'], $conexao);
}

echo "<script>alert('Alterado com sucesso...');window.location.href='javascript:history.back()';</script>";
