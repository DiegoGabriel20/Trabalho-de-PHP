<?php
session_start();

// Salvar receitas em sessão (simples pra teste)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $novaReceita = [
        "id" => uniqid(),
        "titulo" => $_POST["titulo"],
        "categoria" => $_POST["categoria"],
        "imagem" => $_POST["imagem"]
    ];

    $_SESSION["receitas"][] = $novaReceita;
    header("Location: menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Receita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">