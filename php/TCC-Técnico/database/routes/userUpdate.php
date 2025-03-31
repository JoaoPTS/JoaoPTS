<?php
session_start();
include_once("../Mydatasource.php");

$id = $_SESSION['id'];

$query = "SELECT * FROM user WHERE id=:id LIMIT 1";
$result = $conn2->prepare($query);
$result->bindParam(':id', $id, PDO::PARAM_INT);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

$result = mysqli_query($conn, $query);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados)) {
    if ($dados['password'] == $row['password']) {
        $query =
            "UPDATE user 

        SET 

        name=:name, 
        username=:username, 
        email=:email

        WHERE id=:id";

        $edit = $conn2->prepare($query);
        $edit->bindParam(':name', $dados['name'], PDO::PARAM_STR);
        $edit->bindParam(':username', $dados['username'], PDO::PARAM_STR);
        $edit->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $edit->bindParam(':id', $id, PDO::PARAM_INT);


        if ($edit->execute()) {
            $_SESSION['msg'] = "Usuário editado com sucesso!";
            header("Location: ../../index.php");
        } else {
            $_SESSION['msg'] = "Usuáio não editado com sucesso!";
            header("Location: ../../update.php");
        }
    } else {
        $_SESSION['msg'] = "Senha Errada!";
        header("Location: ../../update.php");
    }
}else { 
    $_SESSION['msg'] = "Erro: alguma coisa deu errado!";
    header("Location: ../../update.php");
}
