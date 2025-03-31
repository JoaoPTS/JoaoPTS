<?php
session_start();
include_once("database/Mydatasource.php");

if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = [];
}

// Função para calcular o total do carrinho
function calcularTotal()
{
	$total = 0;
	// Verifica se o carrinho não está vazio
	if (!empty($_SESSION['carrinho'])) {
		foreach ($_SESSION['carrinho'] as $produto) {
			$total += $produto['preco'] * $produto['quantidade'];
		}
	}
	return number_format($total, 2, ',', '.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantidade']) && isset($_POST['id'])) {
	$id = $_POST['id'];
	$quantidade = (int) $_POST['quantidade'];

	// Verifica se o ID do produto existe no carrinho
	if (isset($_SESSION['carrinho'][$id])) {
		// Atualiza a quantidade do produto no carrinho
		$_SESSION['carrinho'][$id]['quantidade'] = $quantidade;

		// Você pode adicionar uma mensagem de sucesso ou algo para indicar que a atualização foi feita
		// exemplo: $_SESSION['mensagem'] = "Carrinho atualizado com sucesso!";
	}

	// Redireciona de volta para a página do carrinho para refletir a atualização
	header('Location: cart.php');
	exit();
}


?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Site Metas -->
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>Doomgym</title>

	<!-- slider stylesheet -->
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

	<!-- fonts style -->
	<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
		rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />
	<!-- responsive style -->
	<link href="css/responsive.css" rel="stylesheet" />

	<script src="https://kit.fontawesome.com/8a6a993d63.js" crossorigin="anonymous"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

</head>

<body class="sub_page about_page">
	<div class="hero_area">
		<!-- header section strats -->
		<header class="header_section">
			<div class="container">
				<nav class="navbar navbar-expand-lg custom_nav-container">
					<a class="navbar-brand" href="index.php">
						<img src="images/logo.png" alt="" />
						<span>
							Doomgym
						</span>
					</a>
					<div class="cadastro_nav" id="">
						<ul class="navbar-nav ">
							<li class="nav-item">
								<a class="nav-link" href="about.php">
									<img src="images/location.png" alt="" />
									<span>No.123, loram ipusm</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">
									<img src="images/call.png" alt="" />
									<span>Ligar : + 55 1899193-8909</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">
									<img src="images/envelope.png" alt="" />
									<span> Doomgymofc@gmail.com</span>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>

		</header>
		<!-- end header section -->
		<!-- slider section -->
		<section class=" slider_section position-relative">
			<div class="container">
				<div class="custom_nav2">
					<nav class="navbar navbar-expand-lg custom_nav-container ">

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="d-flex  flex-column flex-lg-row align-items-center">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="index.php">Home </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="about.php">Sobre </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="training.php">Treinos </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="Loja.php">Loja </a>
									</li>

									<?php

									if (!isset($_SESSION['id'])) {

										echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='register.php'>Cadastro</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='login.php'>Login</a>
                    </li>
                    ";
									} else {
										$id = $_SESSION['id'];
										$query = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
										$result = mysqli_query($conn, $query);
										$row = mysqli_fetch_assoc($result);

										$username = $row['username'];
										$name = $row['name'];
										$email = $row['email'];
										echo "
										<li class='nav-item dropdown'>
											<a class='nav-link dropdown-toggle text-body-secondary' href='' role='button' data-bs-toggle='dropdown' data-bs-auto-close='outside'>$username</a>
											<ul class='dropdown-menu dropdown-menu-right'>
												<li><a class='dropdown-header'>Login</a>
												<li><a class='dopdown-text'>Nome: $name</a></li>
												<li><a class='dopdown-text'>Email: $email</a></li>
												<div class='dropdown-divider'></div>
												<li><a class='dropdown-item' href='update.php'>Editar dados</a></li>
											</ul>
										</li>
										
										<form class='form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0' method='POST'>
											<button class='btn  my-2 my-sm-0 nav_search-btn' type='submit' name='deslogar'>
											</button>
										</form>
                  ";
									}

									if ($_SERVER['REQUEST_METHOD'] == 'POST') {
										if (isset($_POST['deslogar'])) {
											unset($_SESSION['id']);
											echo '<script> location.replace("index.php"); </script>';
										}
									}

									?>

							</div>
						</div>
					</nav>
				</div>
			</div>
		</section>
		<!-- end slider section -->
	</div>


	<!-- about section -->

	<section class="about_section layout_padding">
		<div class="heading_container">
			<h2>Seu carrinho</h2>
		</div>
		<div class="container mt-5">

			<?php if (empty($_SESSION['carrinho'])): ?>
				<p>Seu carrinho está vazio.</p>
			<?php else: ?>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Imagem</th>
								<th>Produto</th>
								<th>Preço</th>
								<th>Quantidade</th>
								<th>Total</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($_SESSION['carrinho'] as $key => $produto): ?>
								<tr>
									<td><img src="images/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" height="50"></td>
									<td><?php echo $produto['nome']; ?></td>
									<td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
									<td>
										<form action="cart.php" method="POST">
											<input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" min="1" class="form-control" style="width: 80px;">
											<input type="hidden" name="id" value="<?php echo $key; ?>"> <!-- Aqui usamos $key como ID do produto -->
											<button type="submit" class="btn btn-primary mt-2">Atualizar</button>
										</form>
									</td>
									<td>R$ <?php echo number_format($produto['preco'] * $produto['quantidade'], 2, ',', '.'); ?></td>
									<td>
										<a href="./database/routes/cartDelete.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger">Remover</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="d-flex justify-content-between">
					<h4>Total: R$ <?php echo calcularTotal(); ?></h4>
					<a href="cartSend.php" class="btn btn-success">Finalizar Compra</a>
				</div>
			<?php endif; ?>
		</div>




	</section>

	<!-- end about section -->

	<!-- info section -->


</body>

</html>