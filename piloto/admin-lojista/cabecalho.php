<section id="cabecalho-painel">
	<div class="row" id="cab-centro">
		<div class="col-md-2 col-5 sumir-mobile">
			<a href="index.php" id="logo-link">
				<img src="../arquivos/LOGO.svg" alt="Logo do site" id="logo" class="img-fluid">
			</a>
		</div>
		<div class="col-md-2 text-start">
			<h4 style="margin: 0;">Admin Panel</h4>
		</div>
		<div class="col-md-8 text-end">
			<div class="row d-flex align-middle text-end justify-content-end">
				<div class="col-2"></div>
				<div class="col-4">
					<form action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Procurar no sistema">
						</div>
					</form>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-5 align-middle d-flex justify-content-center" style="border-right: 1px solid #ffffff;">
							<p class="texto-branco" style="margin-top: 15px;">Usuario: <?php echo $email; ?></p>
						</div>
						<div class="col-5 align-middle d-flex justify-content-center" style="border-right: 1px solid #ffffff;">
							<p class="texto-branco" style="margin-top: 15px;"><?php echo date('l, j')." de ".date('F')." de ".date('Y'); ?></p>
						</div>
						<div class="col-2 align-middle d-flex justify-content-center">
							<a href="logout.php" class="link-sair" style="margin-top: 9px;">Sair</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-painel">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="border-bottom: 1px solid #79767673;">
      <div class="navbar-nav mx-auto d-sm-flex d-block flex-sm-nowrap">
        <a class="nav-link" href="index.php">Painel</a>
        <a class="nav-link" href="#">Vendas</a>
        <a class="nav-link" href="#">Catálogo</a>
        <a class="nav-link" href="#">Clientes</a>
        <a class="nav-link" href="#">Promoções</a>
        <a class="nav-link" href="#">Newsletter e Blog</a>
        <a class="nav-link" href="#">Programa de Recompensa</a>
        <a class="nav-link" href="#">Banners</a>
        <a class="nav-link" href="#">Relatórios</a>
        <a class="nav-link" href="#">Sistema</a>
      </div>
    </div>
</nav>

