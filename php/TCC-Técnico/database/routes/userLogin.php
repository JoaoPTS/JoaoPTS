<?php
session_start();
include_once("../Mydatasource.php");

if ((isset($_POST["username"])) && (isset($_POST["password"]))) {

    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT * FROM user WHERE username = '$user' && password = '$pass' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($row)) {
        $_SESSION['id'] = $row['id'];

        header("Location: ../../index.php"); //index

    } else {
        $_SESSION['loginError'] = "Usuário ou senha Inválido";
        header("Location: ../../login.php"); //login

    }
} else {
    $_SESSION['loginError'] = "Usuário ou senha Inválido";
    header("Location: ../../login.php"); //login
}
