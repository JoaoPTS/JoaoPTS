<?php
session_start();
include_once("database/Mydatasource.php");

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
	header('Location: carrinho.php');
	exit();
}

// Função para calcular o total do carrinho
function calcularTotal()
{
	$total = 0;
	if (!empty($_SESSION['carrinho'])) {
		foreach ($_SESSION['carrinho'] as $produto) {
			$total += $produto['preco'] * $produto['quantidade'];
		}
	}
	return number_format($total, 2, ',', '.');
}

// Processa a compra quando o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'], $_POST['endereco'], $_POST['telefone'])) {
	// Dados da compra
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];

	// Você pode adicionar aqui a lógica para salvar os dados da compra no banco de dados.

	// Limpa o carrinho após a compra
	$_SESSION['carrinho'] = [];

	// Exibe uma mensagem de sucesso
	$_SESSION['compra_sucesso'] = "Compra realizada com sucesso!";
	header('Location: confirmacao_compra.php'); // Redireciona para uma página de agradecimento
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Finalizar Compra - Doomgym</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link href="css/style.css" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/8a6a993d63.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

		<!-- Finalizar Compra Section -->
		<section class="about_section layout_padding">
			<div class="heading_container">
				<h2>Finalizar Compra</h2>
			</div>

			<div class="container mt-5">
				<h3>Produtos no Carrinho</h3>

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
								</tr>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['carrinho'] as $produto): ?>
									<tr>
										<td><img src="images/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" height="50"></td>
										<td><?php echo $produto['nome']; ?></td>
										<td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
										<td><?php echo $produto['quantidade']; ?></td>
										<td>R$ <?php echo number_format($produto['preco'] * $produto['quantidade'], 2, ',', '.'); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div class="d-flex justify-content-between">
						<h4>Total: R$ <?php echo calcularTotal(); ?></h4>
					</div>

					<!-- Formulário de Finalização -->
					<form action="confirm.php" method="POST" class="mt-5">
						<div class="mb-3">
							<label for="nome" class="form-label">Nome Completo</label>
							<input type="text" class="form-control" id="nome" name="nome" required>
						</div>
						<div class="mb-3">
							<label for="endereco" class="form-label">Endereço de Entrega</label>
							<input type="text" class="form-control" id="endereco" name="endereco" required>
						</div>
						<div class="mb-3">
							<label for="telefone" class="form-label">Telefone</label>
							<input type="text" class="form-control" id="telefone" name="telefone" required>
						</div>

						<button type="submit" class="btn btn-success">Confirmar Compra</button>
					</form>
				<?php endif; ?>
			</div>
		</section>
		<!-- end Finalizar Compra Section -->
	</div>
</body>

</html>