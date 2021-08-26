<?php include('header.php'); 
$v = $_POST['veiculo'];
$m = $_POST['marca'];
$mo = $_POST['modelo'];
$a = $_POST['ano'];
$km = $_POST['km'];
$ano_dividido = explode("-", $a);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://veiculos.fipe.org.br/api/veiculos/ConsultarValorComTodosParametros',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"codigoTabelaReferencia": 231,
	"codigoTipoVeiculo": '.intval($v).',
	"codigoMarca": '.intval($m).',
	"ano": "'.$a.'",
	"codigoTipoCombustivel": '.intval($ano_dividido[1]).',
	"anoModelo": '.intval($ano_dividido[0]).',
	"codigoModelo": '.intval($mo).',
	"tipoConsulta": "tradicional"
}',
  CURLOPT_HTTPHEADER => array(
    'Host: veiculos.fipe.org.br',
    'Referer: http://veiculos.fipe.org.br',
    'Content-Type: application/json',
    'Cookie: ROUTEID=.5'
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
curl_close($curl);
$marca = $response->Marca;
$modelo = $response->Modelo;
$ano = $response->AnoModelo;
?>

<section id="cadastro-dados">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			    <h2>Quer pagar mais barato nas peças do seu carro?</h2>
			    <h4>Preencha os seus dados abaixo e receba um desconto especial!</h4>
		    </div>
		</div>
		<form action="cadastrar-cliente-rapido.php" method="post" id="formulario-cadastro-rapido">
			<div class="quadro-branco">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="group">      
						      <input type="text" required name="nome" onkeyup="validarCamposCadastroRapido()" onblur="validarCamposCadastroRapido()" id="nome">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Nome</label>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="group">      
						      <input type="text" required name="sobrenome" onkeyup="validarCamposCadastroRapido()" onblur="validarCamposCadastroRapido()" id="sobrenome">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Sobrenome</label>
						    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="group">     
						      <input type="text" required name="cpf" id="cpf" onblur="validarCPF()" class="cpf" onkeyup="validarCamposCadastroRapido()" onblur="validarCamposCadastroRapido()">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>CPF</label>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="group">      
						      <input type="text" name="celular" class="celular" required onkeyup="validarCamposCadastroRapido()" onblur="validarCamposCadastroRapido()" id="celular">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Celular</label>
						    </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="group">      
						      <input type="email" required name="email" onkeyup="validarCamposCadastroRapido()" onblur="validarCamposCadastroRapido()" id="email">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>E-mail</label>
						    </div>
						</div>
						<div class="col-md-6">
								<div class="group">      
							      <input type="text" name="cep" required id="cep" class="mascCEP" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);"  onkeyup="validarCamposCadastroRapido()">
							      <span class="highlight"></span>
							      <span class="bar"></span>
							      <label>CEP da sua residencia</label>
							    </div>
							</div>
						</div>
					</div>
					<input type="hidden" name="marca" value="<?php echo $marca; ?>">
					<input type="hidden" name="modelo" value="<?php echo $modelo; ?>">
					<input type="hidden" name="ano" value="<?php echo $ano; ?>">
					<input type="hidden" name="km" value="<?php echo $km; ?>">
					<div class="row">
						<div class="col-md-12 col-12 text-center">
							<button class="btn btn-secondary" type="button" id="botao-continuar" onclick="confirmarEnvio()" disabled="">QUERO DESCONTO!</button>
						</div>
					</div>
					<div class="row" style="padding-top: 2%;">
						<div class="col-md-12 text-center">
							<a href="resultado.php?marca=<?php echo $marca; ?>&modelo=<?php echo $modelo; ?>&ano=<?php echo $ano; ?>&km=<?php echo $km; ?>" style="color:black;">Vou preencher meus dados depois!</a>
						</div>
					</div>
				</div>
			</div>
			
		</form>
	</div>
</section>

<div id="mensagem-confirma">
	<p>Seu cupom de desconto foi enviado para o seu e-mail</p>
</div>

<?php include('footer.php'); ?>