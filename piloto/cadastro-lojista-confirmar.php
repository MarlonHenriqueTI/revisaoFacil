<?php 
include('header.php');

$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];
$email = $_POST['email'];
$id = $_POST['id'];
$regime = $_POST['regime'];
$oferece = $_POST['oferece'];
$contribuinte = $_POST['contribuinte'];
$ie = $_POST['ie'];
$im = $_POST['im'];
$isento = $_POST['isento'];
$fundacao = $_POST['fundacao'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$sn = $_POST['sn'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];
$celular = $_POST['celular'];
$telefone = $_POST['telefone'];
$receber_informacoes = $_POST['receber_informacoes'];

if(isset($_GET['cnpj'])){
	$cnpj = $_GET['cnpj'];
	$razao_social = $_GET['razao_social'];
	$email = $_GET['email'];
	$id = $_GET['id'];
	$regime = $_GET['regime'];
	$oferece = $_GET['oferece'];
	$contribuinte = $_GET['contribuinte'];
	$ie = $_GET['ie'];
	$im = $_GET['im'];
	$isento = $_GET['isento'];
	$fundacao = $_GET['fundacao'];
	$cep = $_GET['cep'];
	$uf = $_GET['uf'];
	$cidade = $_GET['cidade'];
	$rua = $_GET['rua'];
	$bairro = $_GET['bairro'];
	$numero = $_GET['numero'];
	$sn = $_GET['sn'];
	$complemento = $_GET['complemento'];
	$referencia = $_GET['referencia'];
	$celular = $_GET['celular'];
	$telefone = $_GET['telefone'];
	$receber_informacoes = $_GET['receber_informacoes'];
}

?>

<section id="cadastro-dados-regime">

	<form action="finalizar-cadastro.php" method="POST">
		<div class="row" id="dados-regime">
			<div class="col-md-8 bg-cinza-escuro">
				<div class="row">
					<h2>Confirme seus dados fiscais para continuar</h2>
				</div>
				<div class="quadro-cinza">
					<div class="container">
						<div class="row">
							<div class="col-md-10">	
								<div class="row">	
									<div class="col-md-12">	
										<small>Tipo de contribuinte</small>
									</div>
									<div class="col-md-12">	
										<p><?php echo $contribuinte; ?></p>
									</div>	
								</div>	
							</div>
							<div class="col-md-2 text-end align-middle" style="padding-top:2%;">	
								<a href="#" data-toggle="modal" data-target="#modalContribuinte">Alterar</a>
							</div>		
						</div>
					</div>
				</div>
				
				<div class="quadro-cinza">
					<div class="container">
						<div class="row">
							<div class="col-md-10">	
								<div class="row">	
									<div class="col-md-12">	
										<small>Atividade</small>
									</div>
									<div class="col-md-12">	
										<p><?php echo $oferece; ?></p>
									</div>	
								</div>	
							</div>
							<div class="col-md-2 text-end align-middle" style="padding-top:2%;">	
								<a href="#" data-toggle="modal" data-target="#modalOferece">Alterar</a>
							</div>		
						</div>
					</div>
				</div>
				
				<div class="quadro-cinza">
					<div class="container">
						<div class="row">
							<div class="col-md-10">	
								<div class="row">	
									<div class="col-md-12">	
										<small>Regime tributário</small>
									</div>
									<div class="col-md-12">	
										<p><?php echo $regime; ?></p>
									</div>	
								</div>	
							</div>
							<div class="col-md-2 text-end align-middle" style="padding-top:2%;">	
								<a href="#"  data-toggle="modal" data-target="#modalRegime">Alterar</a>
							</div>		
						</div>
					</div>
				</div>

				<div class="quadro-cinza">
					<div class="container">
						<div class="row">
							<div class="col-md-5">	
								<div class="row">	
									<div class="col-md-12">	
										<small>Numero de Inscrição Estadual</small>
									</div>
									<div class="col-md-12">	
										<p><?php echo $ie; ?></p>
									</div>	
								</div>	
							</div>
							<div class="col-md-5">	
								<div class="row">	
									<div class="col-md-12">	
										<small>Numero de Inscrição Municipal</small>
									</div>
									<div class="col-md-12">	
										<p><?php echo $im; ?></p>
									</div>	
								</div>	
							</div>
							<div class="col-md-2 text-end align-middle" style="padding-top:2%;">	
								<a href="#" data-toggle="modal" data-target="#modalIe">Alterar</a>
							</div>		
						</div>
					</div>
				</div>

				<div class="quadro-cinza">
					<div class="container">
						<div class="row">
							<div class="col-md-10">	
								<div class="row">	
									<div class="col-md-12">	
										<small>Endereço de Faturamento</small>
									</div>
									<div class="col-md-12">	
										<p><?php echo $rua." ".$numero.", CEP: ".$cep.", ".$cidade.", ".$uf; ?></p>
									</div>	
								</div>	
							</div>
							<div class="col-md-2 text-end align-middle" style="padding-top:2%;">	
								<a href="#" data-toggle="modal" data-target="#modalFaturamento">Alterar</a>
							</div>		
						</div>
					</div>
				</div>

							
			</div>
			<!-- Dados da empresa -->
			<div class="col-md-4 bg-cinza-claro">
				<p><b>Dados da empresa</b></p>
				<div class="row">
					<div class="col-12">
						<small class="apagadim">E-mail</small>
						<p class="caixa-alta"><b><?php echo $email; ?></b></p>
					</div>
					<div class="col-12">
						<small class="apagadim">Razão Social</small>
						<p class="caixa-alta"><?php echo $razao_social; ?></p>
					</div>
					<div class="col-12">
						<small class="apagadim">CNPJ</small>
						<p class="caixa-alta"><?php echo $cnpj?></p>
					</div>
					<hr>
					<div class="col-md-12">
						<p>Você poderá modificar seus dados fiscais em minha conta</p>
					</div>
					<div class="col-md-12" style="margin-bottom: 20px;">
						<div class="form-check">
							  <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="isento" value="1" onchange="validarInformacoes()">
							  <label class="form-check-label" for="flexCheckChecked" id="dados-reais-check">
							    Meus dados são reais e estão atualizados
							  </label>
						</div>
					</div>	
					<div class="col-md-12">	
						<div class="row">
							<div class="col-md-12 text-end">
								<button class="btn btn-secondary" type="submit" id="botao-continuar-completo" disabled="">Confirmar</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<input type="hidden" value="<?php echo $cnpj; ?>" name="cnpj">
		<input type="hidden" value="<?php echo $razao_social; ?>" name="razao_social">
		<input type="hidden" value="<?php echo $email; ?>" name="email">
		<input type="hidden" value="<?php echo $id; ?>" name="id">
		<input type="hidden" value="<?php echo $regime; ?>" name="regime">
		<input type="hidden" value="<?php echo $oferece; ?>" name="oferece">
		<input type="hidden" value="<?php echo $contribuinte; ?>" name="contribuinte">
		<input type="hidden" value="<?php echo $ie; ?>" name="ie">
		<input type="hidden" value="<?php echo $im; ?>" name="im">
		<input type="hidden" value="<?php echo $isento; ?>" name="isento">
		<input type="hidden" value="<?php echo $fundacao; ?>" name="fundacao">
		<input type="hidden" value="<?php echo $cep; ?>" name="cep">
		<input type="hidden" value="<?php echo $uf; ?>" name="uf">
		<input type="hidden" value="<?php echo $cidade; ?>" name="cidade">
		<input type="hidden" value="<?php echo $rua; ?>" name="rua">
		<input type="hidden" value="<?php echo $bairro; ?>" name="bairro">
		<input type="hidden" value="<?php echo $numero; ?>" name="numero">
		<input type="hidden" value="<?php echo $sn; ?>" name="sn">
		<input type="hidden" value="<?php echo $complemento; ?>" name="complemento">
		<input type="hidden" value="<?php echo $referencia; ?>" name="referencia">
		<input type="hidden" value="<?php echo $celular; ?>" name="celular">
		<input type="hidden" value="<?php echo $telefone; ?>" name="telefone">
		<input type="hidden" value="<?php echo $receber_informacoes; ?>" name="receber_informacoes">
	</form>	
</section>

<!-- Modal -->
<div class="modal fade" id="modalContribuinte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Que tipo de contribuinte você é?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo $oferece; ?>&contribuinte=<?php echo 'Contribuinte de ICMS'; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Contribuinte de ICMS</p>
			</div>
		</a>
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo $oferece; ?>&contribuinte=<?php echo 'Não contribuinte'; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Não contribuinte</p>
			</div>
		</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalOferece" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">O que vai oferecer?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo 'Produtos'; ?>&contribuinte=<?php echo $contribuinte; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Produtos</p>
			</div>
		</a>
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo 'Serviços'; ?>&contribuinte=<?php echo $contribuinte; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Serviços</p>
			</div>
		</a>
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo $regime; ?>&oferece=<?php echo 'Produtos e Serviços'; ?>&contribuinte=<?php echo $contribuinte; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Produtos e Serviços</p>
			</div>
		</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRegime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Qual é o tipo de Regime Tributário?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo 'Regime Normal'; ?>&oferece=<?php echo $oferece; ?>&contribuinte=<?php echo $contribuinte; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Regime Normal</p>
			</div>
		</a>
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo 'Simples Nacional'; ?>&oferece=<?php echo $oferece; ?>&contribuinte=<?php echo $contribuinte; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Simples Nacional</p>
			</div>
		</a>
		<a href="cadastro-lojista-confirmar.php?cnpj=<?php echo $cnpj; ?>&razao_social=<?php echo $razao_social; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>&regime=<?php echo 'Simples Nacional - excesso de sublimite da receita bruta'; ?>&oferece=<?php echo $oferece; ?>&contribuinte=<?php echo $contribuinte; ?>&ie=<?php echo $ie; ?>&im=<?php echo $im; ?>&isento=<?php echo $isento; ?>&fundacao=<?php echo $fundacao; ?>&cep=<?php echo $cep; ?>&uf=<?php echo $uf; ?>&cidade=<?php echo $cidade; ?>&rua=<?php echo $rua; ?>&bairro=<?php echo $bairro; ?>&numero=<?php echo $numero; ?>&sn=<?php echo $sn; ?>&complemento=<?php echo $complemento; ?>&referencia=<?php echo $referencia; ?>&celular=<?php echo $celular; ?>&telefone=<?php echo $telefone; ?>&receber_informacoes=<?php echo $receber_informacoes; ?>" class="link-div-clicavel">
			<div class="div-clicavel">
				<p class="texto-div-clicavel">Simples Nacional - excesso de sublimite da receita bruta</p>
			</div>
		</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalIe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicione os dados de inscrição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="cadastro-lojista-confirmar.php" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="ie" id="ie" value="<?php echo $ie; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Numero da Inscrição Estadual</label>
				    </div>
				</div>
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="im" value="<?php echo $im; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Numero da Inscrição Municipal</label>
				    </div>
				</div>
			</div>
			<div class="form-check">
				  <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="isento" value="1">
				  <label class="form-check-label" for="flexCheckChecked" id="isento-check">
				    Isento de Inscrição Estadual
				  </label>
			</div>
					<input type="hidden" value="<?php echo $cnpj; ?>" name="cnpj">
					<input type="hidden" value="<?php echo $razao_social; ?>" name="razao_social">
					<input type="hidden" value="<?php echo $email; ?>" name="email">
					<input type="hidden" value="<?php echo $id; ?>" name="id">
					<input type="hidden" value="<?php echo $regime; ?>" name="regime">
					<input type="hidden" value="<?php echo $oferece; ?>" name="oferece">
					<input type="hidden" value="<?php echo $contribuinte; ?>" name="contribuinte">
					<input type="hidden" value="<?php echo $fundacao; ?>" name="fundacao">
					<input type="hidden" value="<?php echo $cep; ?>" name="cep">
					<input type="hidden" value="<?php echo $uf; ?>" name="uf">
					<input type="hidden" value="<?php echo $cidade; ?>" name="cidade">
					<input type="hidden" value="<?php echo $rua; ?>" name="rua">
					<input type="hidden" value="<?php echo $bairro; ?>" name="bairro">
					<input type="hidden" value="<?php echo $numero; ?>" name="numero">
					<input type="hidden" value="<?php echo $sn; ?>" name="sn">
					<input type="hidden" value="<?php echo $complemento; ?>" name="complemento">
					<input type="hidden" value="<?php echo $referencia; ?>" name="referencia">
					<input type="hidden" value="<?php echo $celular; ?>" name="celular">
					<input type="hidden" value="<?php echo $telefone; ?>" name="telefone">
					<input type="hidden" value="<?php echo $receber_informacoes; ?>" name="receber_informacoes">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Alterar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFaturamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Qual é o endereço de faturamento?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="cadastro-lojista-confirmar.php" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="cep" required id="cep" class="mascCEP" value="<?php echo $cep; ?>" size="10" maxlength="9" onblur="pesquisacep(this.value);"  >
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>CEP</label>
				    </div>
				</div>
				<div class="col-md-6">
					<a href="https://buscacepinter.correios.com.br/app/localidade_logradouro/index.php" target="_blank">Não sei o meu CEP</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="uf" required id="uf" size="2" value="<?php echo $uf; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Estado</label>
				    </div>
				</div>
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="cidade" required id="cidade" value="<?php echo $cidade; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Cidade</label>
				    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="group">      
				      <input type="text" name="rua" required id="rua" value="<?php echo $rua; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Rua/Avenida</label>
				    </div>
				</div>					
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="bairro" required id="bairro" value="<?php echo $bairro; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Bairro</label>
				    </div>
				</div>
				<div class="col-md-3">
					<div class="group">      
				      <input type="number" name="numero" value="<?php echo $numero; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Numero</label>
				    </div>
				</div>
				<div class="col-md-3">
					<div class="form-check">
						  <input class="form-check-input" type="checkbox" id="chekazul" name="sn" value="1">
						  <label class="form-check-label" for="flexCheckChecked" id="checkazul-label">
						    Sem numero
						  </label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="complemento" value="<?php echo $complemento; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Complemento</label>
				    </div>
				</div>
				<div class="col-md-6">
					<div class="group">      
				      <input type="text" name="referencia" value="<?php echo $referencia; ?>">
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Ponto de referencia</label>
				    </div>
				</div>
			</div>
		<input type="hidden" value="<?php echo $cnpj; ?>" name="cnpj">
		<input type="hidden" value="<?php echo $razao_social; ?>" name="razao_social">
		<input type="hidden" value="<?php echo $email; ?>" name="email">
		<input type="hidden" value="<?php echo $id; ?>" name="id">
		<input type="hidden" value="<?php echo $regime; ?>" name="regime">
		<input type="hidden" value="<?php echo $oferece; ?>" name="oferece">
		<input type="hidden" value="<?php echo $contribuinte; ?>" name="contribuinte">
		<input type="hidden" value="<?php echo $ie; ?>" name="ie">
		<input type="hidden" value="<?php echo $im; ?>" name="im">
		<input type="hidden" value="<?php echo $isento; ?>" name="isento">
		<input type="hidden" value="<?php echo $fundacao; ?>" name="fundacao">
		<input type="hidden" value="<?php echo $celular; ?>" name="celular">
		<input type="hidden" value="<?php echo $telefone; ?>" name="telefone">
		<input type="hidden" value="<?php echo $receber_informacoes; ?>" name="receber_informacoes">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Alterar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>