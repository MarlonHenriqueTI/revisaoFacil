<?php include('header.php'); ?>

<section id="cadastro-dados">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
			    <h2>Preencha os seus dados para comprar</h2>
		    </div>
		    <div class="col-md-5">
			    <div class="row">
				    <div class="col-12" id="link-comprar">
					    <a href="cadastro-lojista-mecanico-fabricante.php">Você tem uma loja de autopeças, uma oficina mecânica ou fabrica autopeças?<br><small><u>Clique aqui para vender na Revisão Fácil</u></small></a>
				    </div>
			    </div>
		    </div>
		</div>
		<form action="confirmar-email-cliente.php" method="post">
			<div class="quadro-branco">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="group">     
						      <input type="text" required name="cpf" id="cpf" onblur="validarCPF()" class="cpf">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>CPF</label>
						    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="group">      
						      <input type="text" required name="nome">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Nome</label>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="group">      
						      <input type="text" required name="sobrenome">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Sobrenome</label>
						    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="group">      
						      <input type="email" required name="email">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>E-mail</label>
						    </div>
						</div>
						<div class="col-md-6">
							<div class="group">      
						      <input type="password" required name="senha" minlength="6" maxlength="20">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Senha</label>
						    </div>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" id="flexCheckChecked" checked required name="aceitar-termos">
						  <label class="form-check-label" for="flexCheckChecked" id="texto-aceite-termos">
						    Aceito os <a href="#" target="_blank">Termos e condições</a> e autorizo o uso dos meus dados de acordo com a <a href="#" target="_blank">Declaração de privacidade</a>. A Revisão Fácil respeita a Lei Geral de Proteção de Dados (Nº 13.709), em hipótese alguma seus dados pessoais serão divulgados ou usados para qualquer outro fim além de processar suas compras.
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" id="flexCheckChecked" checked name="receber_informacoes" value="1">
						  <label class="form-check-label" for="flexCheckChecked" id="receber-informações">
						    Quero receber informações por e-mail.
						  </label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-6">
					<a href="#" target="_blank" style="color:black;">Já possuí uma conta?</a>
				</div>
				<div class="col-md-6 col-6 text-end">
					<button class="btn btn-secondary" type="submit" id="botao-continuar">CONTINUAR</button>
				</div>
			</div>
		</form>
	</div>
</section>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<a href="#" target="_blank" style="color:black;text-transform: capitalize;">Ver o contrato de parceria da Revisão Fácil</a>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>