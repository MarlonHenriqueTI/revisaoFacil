<?php $categorias = selecionarCategorias($conexao); ?>

<div class="topnav">
	<div class="row">
		<div class="col-6">
				<a href="index.php" id="logo-link">
					<img src="imagens/logo-header.png" alt="Logo do site" id="logo" class="img-fluid">
				</a>
		</div>
		<div class="col-6 text-end">
			<!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		  </a>
		</div>
	</div>

  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
  		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		  	<i class="fas fa-bars"></i> Todos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <?php foreach($categorias as $cat) {
			if($cat['posicao'] != 'principal') {
			?>
				<li><a class="dropdown-item" href="exibir-categoria.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></a></li>
			<?php } } ?>
          </ul>
        </li>
	<a aria-current="page" href="#"><i class="fas fa-bars"></i> Todos</a>
	<a class="nav-link" href="loja.php">Todos produtos</a>
	<?php foreach($categorias as $cat) {
		if($cat['posicao'] == 'principal') {
		?>
      <a class="nav-link" href="exibir-categoria.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></a>
	  <?php } } ?>
  </div>
  
</div>

<section id="cabecalho">
	<div class="row" id="cab-centro">
		<div class="col-md-2 col-5 sumir-mobile">
			<a href="index.php" id="logo-link">
				<img src="arquivos/LOGO.svg" alt="Logo do site" id="logo" class="img-fluid">
			</a>
		</div>
		<div class="col-md-2 col-12">
			<div class="row" id="cab-centro">
				<div class="col-md-3 col-3">
					<img src="imagens/icone-mapa.png" alt="icone do mapa" id="icone-mapa" class="img-fluid">
				</div>
				<div class="col-md col-9">
					<p class="texto-branco" id="informe-endereco">Olá <?php if(isset($_SESSION["user_portal"])) { echo $_SESSION["user_portal"]; } ?><br><a href="#"><b>informe seu endereço</b></a></p>
				</div>
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom: 20px;margin-top: 20px;">
			<form action="loja.php" method="GET">
				<div class="input-group">
				<div class="form-outline">
					<input type="search" id="form1" class="form-control" placeholder="Encontre sua peça por código ou nome" name="pesquisa"/>
				</div>
				<button type="submit" class="btn btn-primary" id="botao-pesquisa">
					<i class="fas fa-search"></i>
				</button>
				</div>
			</form>
		</div>
		<div class="col-md-2 text-center col-8">
			<?php if(isset($_SESSION["user_portal"])) { ?>
			<a href="#"  class="texto-branco-maior"><b>Bem vindo, acesse o painel</b></a>
			<?php } else {?>
			<p style="LINE-HEIGHT: 1em;margin-top: 12px;font-weight:600;"><a href="#" class="texto-branco-maior"><b>Acesse sua conta</b></a><br><b><a href="cadastro-cliente-consumidor.php" class="texto-branco-maior" >Cadastro</a>/<a href="login.php" class="texto-branco-maior">Login</a></b></p>
			<?php } ?>
		</div>
		<div class="col-md-2 col-4">
			<div class="row">
				<div class="col-12 align-bottom">
					<img src="imagens/icone-carrinho.png" alt="icone carrinho" class="img-fluid">
					<a href="carrinho.php" class="texto-branco-maior"><b>Carrinho</b></a>
				</div>
			</div>
		</div>
	</div>
</section>


<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar-home">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="border-bottom: 1px solid #79767673;">
      <div class="navbar-nav mx-auto d-sm-flex d-block flex-sm-nowrap">
	  	<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  	<i class="fas fa-bars"></i> Todos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <li><a class="dropdown-item" href="loja.php">Todos produtos</a></li>
		  <?php foreach($categorias as $cat) {
			if($cat['posicao'] != 'principal') {
			?>
				<li><a class="dropdown-item" href="exibir-categoria.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></a></li>
			<?php } } ?>
          </ul>
        </li>
        <?php foreach($categorias as $cat) {
		if($cat['posicao'] == 'principal') {
		?>
      <a class="nav-link" href="exibir-categoria.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></a>
	  <?php } } ?>
      </div>
    </div>
</nav>

