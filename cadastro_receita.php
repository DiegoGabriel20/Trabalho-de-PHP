<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST["titulo"] ?? "";
    $categoria = $_POST["categoria"] ?? "";
    $imagem = $_POST["imagem"] ?? "";
    $ingredientes = $_POST["ingredientes"] ?? "";

    
    $id = uniqid();

    
    $novaReceita = [
        "id" => $id,
        "titulo" => $titulo,
        "categoria" => $categoria,
        "imagem" => $imagem,
        "ingredientes" => $ingredientes
    ];

    
    $_SESSION["receitas"][] = $novaReceita;

    
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Receita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Cadastrar Nova Receita</h2>

        <form method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título da Receita</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" required>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="url" class="form-control" id="imagem" name="imagem" required>
            </div>

            <div class="mb-3">
                <label for="ingredientes" class="form-label">Ingredientes</label>
                <textarea class="form-control" id="ingredientes" name="ingredientes" rows="4" placeholder="Ex: 2 ovos, 1 banana, aveia..." required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="menu.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
