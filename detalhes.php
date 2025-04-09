<?php
session_start();
$id = $_GET["id"] ?? "";
$receitas = $_SESSION["receitas"] ?? [];

$receitaEncontrada = null;
foreach ($receitas as $r) {
    if ($r["id"] === $id) {
        $receitaEncontrada = $r;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Receita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <?php
    if ($receitaEncontrada) {
        echo "<h2>" . htmlspecialchars($receitaEncontrada["titulo"]) . "</h2>";
        echo "<p class='text-muted'>Categoria: " . htmlspecialchars($receitaEncontrada["categoria"]) . "</p>";
        echo "<img src='" . htmlspecialchars($receitaEncontrada["imagem"]) . "' class='img-fluid mb-4' alt='Imagem da Receita'>";

        // Ingredientes
        if (!empty($receitaEncontrada["ingredientes"])) {
            echo "<h4>Ingredientes:</h4>";
            echo "<ul class='list-group mb-3'>";
            $listaIngredientes = explode("\n", $receitaEncontrada["ingredientes"]);
            foreach ($listaIngredientes as $item) {
                if (trim($item) !== '') {
                    echo "<li class='list-group-item'>" . htmlspecialchars($item) . "</li>";
                }
            }
            echo "</ul>";
        }

        echo "<p>Mais detalhes da receita podem ser adicionados aqui...</p>";
        echo "<a href='menu.php' class='btn btn-secondary'>Voltar</a>";
    } else {
        echo "<p class='text-danger'>Receita não encontrada.</p>";
        echo "<a href='menu.php' class='btn btn-secondary'>Voltar</a>";
    }
    ?>
</div>

</body>
</html>
