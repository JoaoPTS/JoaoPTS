<?php
session_start();

// Verifica se o produto já está no carrinho
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	include_once("../Mydatasource.php");

	// Obtém os detalhes do produto
	$result = mysqli_query($conn, "SELECT * FROM produtos WHERE id = $id");
	$produto = mysqli_fetch_assoc($result);

	// Verifica se o produto já existe no carrinho
	$existe = false;
	foreach ($_SESSION['carrinho'] as &$item) {
		if ($item['id'] == $id) {
			$item['quantidade']++;
			$existe = true;
			break;
		}
	}

	// Se o produto não existe no carrinho, adiciona-o
	if (!$existe) {
		$_SESSION['carrinho'][] = [
			'id' => $produto['id'],
			'nome' => $produto['nome'],
			'descricao' => $produto['descricao'],
			'preco' => $produto['preco'],
			'imagem' => $produto['imagem'],
			'quantidade' => 1
		];
	}

	// Redireciona de volta para a página de produtos ou carrinho
	header('Location: ../../cart.php');
	exit;
}
