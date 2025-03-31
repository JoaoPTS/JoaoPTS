<?php
session_start();

// Verifica se o produto existe no carrinho
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Remove o produto do carrinho
	foreach ($_SESSION['carrinho'] as $key => $produto) {
		if ($produto['id'] == $id) {
			unset($_SESSION['carrinho'][$key]);
			break;
		}
	}

	// Redireciona de volta para o carrinho
	header('Location: carrinho.php');
	exit;
}
