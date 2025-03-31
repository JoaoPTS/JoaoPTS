<?php
session_start();
include_once("../Mydatasource.php");

$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$username == $row) {
    if ($confirm == $password) {

        $post = mysqli_query(
            $conn,

            "INSERT INTO user(name, username, email, password) 
            VALUES ('$name', '$username', '$email', '$password')"
        );

        if (mysqli_insert_id($conn)) {
            $_SESSION['msg'] = "Usuário cadastrado com sucesso. Realize o Login.";
            header("Location: ../../login.php");
        } else {
            $_SESSION['msg'] = "Usuário não foi cadastrado com sucesso";
            header("Location: ../../cadastro.php");
        }
    } else {
        $_SESSION['msg'] = "Senhas não coincidem";
        header("Location: ../../cadastro.php");
    }
} else {
    $_SESSION["msg"] = "Usuário já existente";
    header("Location: ../../cadastro.php");
}
