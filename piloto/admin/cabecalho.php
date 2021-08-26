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
							<p class="texto-branco" style="margin-top: 15px;">Usuario: <?php echo $usuario; ?></p>
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Vendas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Pedidos</a></li>
            <li><a class="dropdown-item" href="#">Faturas</a></li>
            <li><a class="dropdown-item" href="#">Entregas</a></li>
            <li><a class="dropdown-item" href="#">Reembolsos</a></li>
            <li><a class="dropdown-item" href="#">Transações</a></li>
            <li><a class="dropdown-item" href="#">Perfil Recorrente (beta)</a></li>
            <li><a class="dropdown-item" href="#">Termos de Cobrança</a></li>
            <li><a class="dropdown-item" href="#">Termos e Condições</a></li>
            <li><a class="dropdown-item" href="#">Impostos</a></li>
            <li><a class="dropdown-item" href="#">Sigep3</a></li>
          </ul>
        </li>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produtos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="gerenciar-produtos.php">Gerenciar Produtos</a></li>
            <li><a class="dropdown-item" href="gerenciar-categorias.php">Gerenciar Categorias</a></li>
            <li><a class="dropdown-item" href="atributos.php">Atributos</a></li>
            <li><a class="dropdown-item" href="gerenciar-reescrita-url.php">Gerenciar Reescrita de URL</a></li>
            <li><a class="dropdown-item" href="termos-pesquisa.php">Termos de Pesquisa</a></li>
            <li><a class="dropdown-item" href="avaliacoes-comentarios.php">Avaliações e Comentários</a></li>
            <li><a class="dropdown-item" href="sitemap.php">Google Sitemap</a></li>
          </ul>
        </li>
        <a class="nav-link" href="#">Catálogo</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="gerenciar-clientes.php">Gerenciar Clientes</a></li>
            <li><a class="dropdown-item" href="#">Grupos de Clientes</a></li>
            <li><a class="dropdown-item" href="#">Clientes Online</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Promoções
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Regras de Preços</a></li>
            <li><a class="dropdown-item" href="#">Regras da Promoção</a></li>
            <li><a class="dropdown-item" href="#">Reward Points Pro</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Newsletter e Blog
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Modelos</a></li>
            <li><a class="dropdown-item" href="#">Fila de Envio</a></li>
            <li><a class="dropdown-item" href="#">Assinaturas</a></li>
            <li><a class="dropdown-item" href="#">Relatório de Problemas</a></li>
            <li><a class="dropdown-item" href="#">Mailchimp</a></li>
            <li><a class="dropdown-item" href="#">Add Post</a></li>
            <li><a class="dropdown-item" href="#">Posts</a></li>
            <li><a class="dropdown-item" href="#">Comentarios</a></li>
            <li><a class="dropdown-item" href="#">Categorias</a></li>
            <li><a class="dropdown-item" href="#">Configurações</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Programa de Recompensa
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Earning Rules</a></li>
            <li><a class="dropdown-item" href="#">Spending Rules</a></li>
            <li><a class="dropdown-item" href="#">Customer Accounts</a></li>
            <li><a class="dropdown-item" href="#">Sell Products in Points</a></li>
            <li><a class="dropdown-item" href="#">All Transaction History</a></li>
            <li><a class="dropdown-item" href="#">Reports</a></li>
            <li><a class="dropdown-item" href="#">Configuration</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Banners
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Manage Sliders</a></li>
            <li><a class="dropdown-item" href="#">Manage Banners</a></li>
            <li><a class="dropdown-item" href="#">Preview Slider Styles</a></li>
            <li><a class="dropdown-item" href="#">Report Banners</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Relatórios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Vendas</a></li>
            <li><a class="dropdown-item" href="#">Carrinho</a></li>
            <li><a class="dropdown-item" href="#">Produtos</a></li>
            <li><a class="dropdown-item" href="#">Clientes</a></li>
            <li><a class="dropdown-item" href="#">Análises</a></li>
            <li><a class="dropdown-item" href="#">Termos Pesquisados</a></li>
            <li><a class="dropdown-item" href="#">Atualizar Estatisticas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sistema
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Minha Conta</a></li>
            <li><a class="dropdown-item" href="#">Notificações</a></li>
            <li><a class="dropdown-item" href="#">Ferramentas</a></li>
            <li><a class="dropdown-item" href="#">Compartilhar Recursos</a></li>
            <li><a class="dropdown-item" href="#">Visual</a></li>
            <li><a class="dropdown-item" href="#">Importar/Exportar</a></li>
            <li><a class="dropdown-item" href="#">Gerenciar Moeda</a></li>
            <li><a class="dropdown-item" href="#">E-mails de Transação</a></li>
            <li><a class="dropdown-item" href="#">Variáveis Personalizadas</a></li>
            <li><a class="dropdown-item" href="#">Permissões</a></li>
            <li><a class="dropdown-item" href="#">Magento Connect</a></li>
            <li><a class="dropdown-item" href="#">Gerenciar Cache</a></li>
            <li><a class="dropdown-item" href="#">Gerenciar Índices</a></li>
            <li><a class="dropdown-item" href="#">Gerenciar Lojas</a></li>
            <li><a class="dropdown-item" href="#">Status do Pedido</a></li>
            <li><a class="dropdown-item" href="#">Configuração</a></li>

          </ul>
        </li>
      </div>
    </div>
</nav>

