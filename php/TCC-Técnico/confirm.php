<?php
session_start();

// Verifica se a compra foi realmente realizada
if (!isset($_SESSION['compra_realizada']) || !$_SESSION['compra_realizada']) {
	// Caso a compra não tenha sido realizada corretamente, redireciona para a página do carrinho
}

// Limpa o indicador da compra após carregar a página
unset($_SESSION['compra_realizada']);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirmação de Compra - Doomgym</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link href="css/style.css" rel="stylesheet" />
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f8f9fa;
			color: #333;
		}

		.container {
			background-color: white;
			padding: 30px;
			margin-top: 50px;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		.header {
			text-align: center;
			margin-bottom: 30px;
		}

		.alert {
			background-color: #28a745;
			color: white;
			padding: 10px;
			font-size: 18px;
			margin-bottom: 20px;
		}

		.message {
			font-size: 16px;
			margin-top: 20px;
		}

		.message p {
			margin-bottom: 10px;
		}

		.btn-primary {
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="header">
			<h2>Compra Confirmada com Sucesso!</h2>
		</div>

		<!-- Mensagem de Confirmação -->
		<div class="alert">
			<strong>Pedido Confirmado!</strong> Seu pagamento foi aprovado e estamos preparando seu pedido.
		</div>

		<!-- Mensagem de Envio -->
		<div class="message">
			<h4>O que acontecerá agora:</h4>
			<p><strong>Pedido confirmado e pago:</strong> Seu pagamento foi aprovado com sucesso e seu pedido está sendo preparado.</p>
			<p><strong>Em breve será enviado:</strong> A previsão é de que o seu pedido seja enviado dentro de 3 dias úteis.</p>
			<p><strong>Fique atento ao rastreamento:</strong> Você receberá um e-mail com o código de rastreamento assim que o pedido for enviado.</p>
		</div>

		<!-- Ação de Voltar -->
		<div class="d-flex justify-content-center">
			<a href="index.php" class="btn btn-primary">Voltar para a Página Inicial</a>
		</div>
	</div>
</body>

</html>