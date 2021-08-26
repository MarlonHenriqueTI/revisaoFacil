<?php include('header.php'); ?>

<section id="login">
	<div class="container">
		<form action="fazer-login.php" method="post">
			<div class="quadro-branco">
				<div class="container">
					<div class="row">
                    <div class="col-md-12 text-center mb-5">
                        <h2>Faça seu login</h2>
                    </div>
						<div class="col-md-12">
							<div class="group">      
						      <input type="email" required name="email">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>E-mail</label>
						    </div>
						</div>
						<div class="col-md-12">
							<div class="group">      
						      <input type="password" required name="senha" minlength="6" maxlength="20">
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Senha</label>
						    </div>
						</div>
                        <div class="col-md-6 col-6">
                            <a href="cadastro-cliente-consumidor.php" target="_blank" style="color:black;">Deseja criar um conta?</a>
                        </div>
                        <div class="col-md-6 col-6 text-end">
                            <button class="btn btn-secondary" type="submit" id="botao-continuar">Entrar</button>
                        </div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<?php include('footer.php'); ?>