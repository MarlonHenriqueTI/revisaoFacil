<?php

include('banco-de-dados/conecta-db.php');

/*Funções de Seleção*/
function selecionarLojista($conexao, $cnpj)
{
	$query = "SELECT * FROM `cliente_lojista_mecanico` WHERE `cnpj` = '$cnpj'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Lojista não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarClienteConsumidor($conexao, $cpf)
{
	$query = "SELECT * FROM `cliente_consumidor` WHERE `cpf` = '$cpf'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Cliente não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarVeiculos($conexao)
{
	$query = "SELECT * FROM `veiculos`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Veiculo não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarTodosCLientes($conexao)
{
	$query = "SELECT * FROM `cliente_lojista_mecanico`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Cliente não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		$query2 = "SELECT * FROM `cliente_consumidor`";
		$resultado2 = mysqli_query($conexao, $query2);
		if (!$resultado2) {
			echo '<script>alert("Cliente não encontrado");</script>';
		} else {
			foreach ($resultado2 as $key) {
				$res[] = $key;
			}
			return $res;
		}
	}
}

function selecionarEnderecoCliente($conexao, $id, $tipo)
{
	if ($tipo == '') {
		$query = "SELECT * FROM `endereco_cliente_consumidor` WHERE `id_cliente` = '$id'";
		$resultado = mysqli_query($conexao, $query);
		if (!$resultado) {
			echo '<script>alert("Cliente não encontrado");</script>';
		} else {
			foreach ($resultado as $key) {
				$res[] = $key;
			}
			return $res[0];
		}
	} else {
		$query = "SELECT * FROM `endereco_entrega_cliente_consumidor` WHERE `id_empresa` = '$id'";
		$resultado = mysqli_query($conexao, $query);
		if (!$resultado) {
			echo '<script>console.log("Cliente não encontrado");</script>';
		} else {
			foreach ($resultado as $key) {
				$res[] = $key;
			}
			return $res[0];
		}
	}
}

function selecionarEnderecoFaturamento($conexao, $id)
{

	$query = "SELECT * FROM `endereco_faturamento_lojista_mecanico` WHERE `id_empresa` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Cliente não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarCategorias($conexao)
{
	$query = "SELECT * FROM `categorias`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Categorias não encontradas");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProdutos($conexao, $numero)
{
	$query = "SELECT * FROM `produtos` where `status` = 'ativo' limit $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProduto($conexao, $codigo)
{
	$query = "SELECT * FROM `produtos` where `codigo` = '$codigo'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produto não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarProdutoId($conexao, $id)
{
	$query = "SELECT * FROM `produtos` where `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produto não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarProdutosLoja($conexao, $numero, $pagina)
{
	$n = ($pagina - 1) * $numero;
	$query = "SELECT * FROM `produtos` limit $n, $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProdutosLojaOrdenado($conexao, $numero, $pagina, $ordem)
{
	$n = ($pagina - 1) * $numero;
	$query = "SELECT * FROM `produtos` ORDER BY $ordem limit $n, $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProdutosLojaCategoria($conexao, $numero, $pagina, $id_categoria)
{
	$n = ($pagina - 1) * $numero;
	$query = "SELECT * FROM `produtos` where `id_categoria` = '$id_categoria' limit $n, $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProdutosLojaCategoriaOrdenado($conexao, $numero, $pagina, $id_categoria, $ordem)
{
	$n = ($pagina - 1) * $numero;
	$query = "SELECT * FROM `produtos` where `id_categoria` = '$id_categoria' order by $ordem limit $n, $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarCategoriasPaginacao($conexao, $numero, $pagina)
{
	$n = $pagina * $numero;
	$query = "SELECT * FROM `categorias` limit $n, $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Categorias não encontradas");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProdutosLojaPesquisa($conexao, $numero, $pagina, $pesquisa)
{
	$n = $pagina * $numero;
	$query = "SELECT * FROM `produtos` where `nome` LIKE '%$pesquisa%' or `codigo` LIKE '%$pesquisa%'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarProdutosAplicacao($conexao, $numero, $pagina, $pesquisa)
{
	$n = $pagina * $numero;
	$query = "SELECT * FROM `produtos` where `aplicacao` LIKE '%$pesquisa%' limit $n, $numero";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarCategoriasLojaPesquisa($conexao, $numero, $pagina, $pesquisa)
{
	$n = $pagina * $numero;
	$query = "SELECT * FROM `categorias` where `nome` LIKE '%$pesquisa%'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Categorias não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarTodosProdutos($conexao)
{
	$query = "SELECT * FROM `produtos`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}


function selecionarTodasCategorias($conexao)
{
	$query = "SELECT * FROM `categorias`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Categorias não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function contarProdutos($conexao)
{
	$query = "SELECT * FROM `produtos`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return count($res);
	}
}

function contarProdutosCategoria($conexao, $id_categoria)
{
	$query = "SELECT * FROM `produtos` where `id_categoria` = '$id_categoria'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		if (is_array($res)) {
			return count($res);
		} else {
			return 0;
		}
	}
}

function contarCategorias($conexao)
{
	$query = "SELECT * FROM `categorias`";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Categorias não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return count($res);
	}
}

function contarProdutosPesquisa($conexao, $pesquisa)
{
	$query = "SELECT * FROM `produtos` where `nome` LIKE '%$pesquisa%' or `codigo` LIKE '%$pesquisa%'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Produtos não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return count($res);
	}
}

function contarCategoriasPesquisa($conexao, $pesquisa)
{
	$query = "SELECT * FROM `categorias` where `nome` LIKE '%$pesquisa%'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Categorias não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return count($res);
	}
}

function selecionarImagensProduto($conexao, $id)
{
	$query = "SELECT * FROM `imagens_produtos` where `codigo` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Nenhuma imagem encontrada");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarCategoria($conexao, $id)
{
	$query = "SELECT * FROM `categorias` where `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Categoria não encontrada");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}


function selecionarVideoProduto($conexao, $id)
{
	$query = "SELECT * FROM `video_produtos` where `codigo` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>console.log("Nenhum video encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}
/*funções de exclusão*/
function deletar($id, $tabela, $conexao)
{
	$query = "DELETE FROM `$tabela` WHERE `$tabela`.`id` = $id";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo "<script>alert('Erro ao deletar...');</script>";
		die();
	} else {
		echo "<script>alert('Deletado com sucesso...');window.location.href='javascript:history.back()';</script>";
	}
}

if (isset($_GET["id"]) && isset($_GET["tabela"]) && isset($_GET["deletar"])) {
	deletar($_GET["id"], $_GET["tabela"], $conexao);
}


/*funções para Alterar*/
function alterar($id, $tabela, $campo, $valor, $conexao)
{
	$query = "UPDATE `$tabela` SET `$campo` = '$valor' WHERE `$tabela`.`id` = $id";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo "<script>alert('Erro ao alterar...');</script>";
		die();
	}
}


/*funções para cadastro*/

function cadastrarLojista($conexao, $cnpj, $razao_social, $tipo, $email, $senha, $receber_informacoes)
{
	$senha = md5($senha);
	$query = "INSERT INTO `cliente_lojista_mecanico`( `cnpj`, `razao_social`, `tipo`, `email`, `senha`, `receber_informacoes`) VALUES ('$cnpj', '$razao_social', '$tipo', '$email', '$senha', '$receber_informacoes')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar, confira se seu CNPJ ou e-mail já esta cadastrado e tente novamente...");window.location.href="javascript:history.back()";</script>';
	} else {
		return selecionarLojista($conexao, $cnpj);
	}
}

function cadastrarProduto($conexao, $codigo, $nome, $preco, $descricao, $especificacao, $aplicacao, $marca, $codigo_produto, $ncm, $garantia, $lado, $posicao, $codigo_barras, $peso_bruto, $codigo_montadora, $consulte_manual, $direcao, $assistencia_fabricante, $tipo, $caracteristicas, $composicao, $rosca, $medida, $diametro, $diametro_rosca, $sistema, $quantidade_furos, $diametro_furo_rolamento, $comprimento, $relacao, $quantidade_dentes, $material, $modelo, $fixacao, $dentes_internos, $combustivel, $ribs, $numero_terminais, $torque_maximo_aperto_copo, $localizacao, $pressao, $geracao, $motor, $cambio, $tracao, $codigo_peca_simplificado, $rosca_lado_mecanismo, $rosca_lado_terminal, $rosca_lado_articulacao, $diametro_interno, $grupo, $largura, $diametro_externo, $subgrupo, $id_categoria, $classificacao, $status, $multiplicador)
{
	$query = "INSERT INTO `produtos`(`codigo`, `nome`, `preco`, `descricao`, `especificacao`, `aplicacao`, `marca`, `codigo_produto`, `ncm`, `garantia`, `lado`, `posicao`, `codigo_barras`, `peso_bruto`, `codigo_montadora`, `consulte_manual`, `direcao`, `assistencia_fabricante`, `tipo`, `caracteristicas`, `composicao`, `rosca`, `medida`, `diametro`, `diametro_rosca`, `sistema`, `quantidade_furos`, `diametro_furo_rolamento`, `comprimento`, `relacao`, `quantidade_dentes`, `material`, `modelo`, `fixacao`, `dentes_internos`, `combustivel`, `ribs`, `numero_terminais`, `torque_maximo_aperto_copo`, `localizacao`, `pressao`, `geracao`, `motor`, `cambio`, `tracao`, `codigo_peca_simplificado`, `rosca_lado_mecanismo`, `rosca_lado_terminal`, `rosca_lado_articulacao`, `diametro_interno`, `grupo`, `largura`, `diametro_externo`, `subgrupo`, `id_categoria`, `classificacao`, `status`, `multiplicador`) VALUES ('$codigo', '$nome', '$preco', '$descricao', '$especificacao', '$aplicacao', '$marca', '$codigo_produto', '$ncm', '$garantia', '$lado', '$posicao', '$codigo_barras', '$peso_bruto', '$codigo_montadora', '$consulte_manual', '$direcao', '$assistencia_fabricante', '$tipo', '$caracteristicas', '$composicao', '$rosca', '$medida', '$diametro', '$diametro_rosca', '$sistema', '$quantidade_furos', '$diametro_furo_rolamento', '$comprimento', '$relacao', '$quantidade_dentes', '$material', '$modelo', '$fixacao', '$dentes_internos', '$combustivel', '$ribs', '$numero_terminais', '$torque_maximo_aperto_copo', '$localizacao', '$pressao', '$geracao', '$motor', '$cambio', '$tracao', '$codigo_peca_simplificado', '$rosca_lado_mecanismo', '$rosca_lado_terminal', '$rosca_lado_articulacao', '$diametro_interno', '$grupo', '$largura', '$diametro_externo', '$subgrupo', '$id_categoria', '$classificacao', '$status', '$multiplicador)";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar produto, tente novamente...");window.location.href="javascript:history.back()";</script>';
	} else {
		$produto = selecionarProduto($conexao, $codigo);
		echo '<script>alert("Cadastrado com sucesso...");window.location.href="editar-produto.php?id=' . $produto['id'] . ';</script>';
	}
}

function cadastrarCategoria($conexao, $nome, $descricao, $posicao)
{
	$query = "INSERT INTO `categorias`( `nome`, `descricao`, `posicao`) VALUES ('$nome', '$descricao', '$posicao')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar categoria, um log de erro foi gerado e enviado para o desenvolvedor, já estamos trabalhando para resolver...");window.location.href="javascript:history.back()";</script>';
	} else {
		echo '<script>alert("Cadastrado com sucesso...");window.location.href="javascript:history.back()";</script>';
	}
}

function cadastrarClienteConsumidor($conexao, $cpf, $nome, $sobrenome, $email, $senha, $receber_informacoes)
{
	$senha = md5($senha);
	$query = "INSERT INTO `cliente_consumidor`( `cpf`, `nome`, `sobrenome`, `email`, `senha`, `receber_email`) VALUES ('$cpf', '$nome', '$sobrenome', '$email', '$senha', '$receber_informacoes')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar, confira se seu CPF ou e-mail já esta cadastrado e tente novamente...");window.location.href="javascript:history.back()";</script>';
	} else {
		return selecionarClienteConsumidor($conexao, $cpf);
	}
}

function cadastrarEnderecoClienteConsumidor($conexao, $id_cliente, $cep, $estado, $cidade, $bairro, $rua, $numero, $ponto_referencia)
{
	$query = "INSERT INTO `endereco_cliente_consumidor`( `id_cliente`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `ponto_referencia`) VALUES ('$id_cliente', '$cep', '$estado', '$cidade', '$bairro', '$rua','$numero', '$ponto_referencia')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar endereço");window.location.href="javascript:history.back()";</script>';
	} else {
		echo '<script>console.log("Endereço cadastrado");</script>';
	}
}

function cadastrarEnderecoEntregaClienteConsumidor($conexao, $id_cliente, $cep, $estado, $cidade, $bairro, $rua, $numero, $ponto_referencia)
{
	$query = "INSERT INTO `endereco_entrega_cliente_consumidor`( `id_cliente`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `ponto_referencia`) VALUES ('$id_cliente', '$cep', '$estado', '$cidade', '$bairro', '$rua','$numero', '$ponto_referencia')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar endereço");window.location.href="javascript:history.back()";</script>';
	} else {
		echo '<script>console.log("Endereço cadastrado");</script>';
	}
}

function cadastrarClienteConsumidorCR($conexao, $cpf, $nome, $sobrenome, $email, $celular, $cep)
{
	$query = "INSERT INTO `cliente_consumidor`( `cpf`, `nome`, `sobrenome`, `email`, `celular`) VALUES ('$cpf', '$nome', '$sobrenome', '$email', '$celular')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar, confira se seu CPF ou e-mail já esta cadastrado e tente novamente...");window.location.href="javascript:history.back()";</script>';
	} else {
		$cliente = selecionarClienteConsumidor($conexao, $cpf);
		cadastrarEnderecoClienteConsumidor($conexao, $cliente['id'], $cep);
		echo '<script>alert("Cadastrado com sucesso....");</script>';
	}
}

function cadastrarEnderecoLojista($conexao, $id_empresa, $cep, $estado, $cidade, $bairro, $rua, $numero, $ponto_referencia, $celular, $telefone_fixo, $receber)
{
	$query = "INSERT INTO `endereco_faturamento_lojista_mecanico`( `id_empresa`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `ponto_referencia`, `celular`, `telefone_fixo`, `receber`) VALUES ('$id_empresa', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$ponto_referencia', '$celular', '$telefone_fixo', '$receber')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar endereço de faturamento, um log do erro foi gerado e já estamos trabalhando para corrigi-lo, tente novamente mais tarde...");window.location.href="javascript:history.back()";</script>';
	}
}

function cadastrarDadosFiscais($conexao, $id_empresa, $regime, $oferece, $tipo_contribuinte, $inscricao_estadual, $inscricao_municipal, $isento_inscricao_estadual, $data_fundacao)
{
	$query = "INSERT INTO `dados_fiscais_lojista_mecanico`( `id_empresa`, `regime`, `oferece`, `tipo_contribuinte`, `inscricao_estadual`, `inscricao_municipal`, `isento_inscricao_estadual`, `data_fundacao`) VALUES ('$id_empresa', '$regime', '$oferece', '$tipo_contribuinte', '$inscricao_estadual', '$inscricao_municipal', '$isento_inscricao_estadual', '$data_fundacao')";
	$resultado = mysqli_query($conexao, $query);
	if (!$resultado) {
		echo '<script>alert("Falha ao cadastrar dados fiscais, um log do erro foi gerado e já estamos trabalhando para corrigi-lo, tente novamente mais tarde...");window.location.href="javascript:history.back()";</script>';
	}
}

/*Outras funções*/
function verificarSeJaEstaCadastradoLojista($conexao, $cnpj)
{
	$query = "SELECT * FROM `cliente_lojista_mecanico` WHERE `cnpj` = '$cnpj'";
	$resultado = mysqli_num_rows($conexao, $query);
	if ($resultado > 0) {
		return true;
	} else {
		return false;
	}
}
