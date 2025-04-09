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
    <?php if ($receitaEncontrada): ?>
        <h2><?= htmlspecialchars($receitaEncontrada["titulo"]) ?></h2>
        <p class="text-muted">Categoria: <?= htmlspecialchars($receitaEncontrada["categoria"]) ?></p>
        <img src="<?= htmlspecialchars($receitaEncontrada["imagem"]) ?>" class="img-fluid mb-4" alt="Imagem da Receita">
        <p>Mais detalhes da receita podem ser adicionados aqui...</p>
        <a href="menu.php" class="btn btn-secondary">Voltar</a>
    <?php else: ?>
        <p class="text-danger">Receita não encontrada.</p>
        <a href="menu.php" class="btn btn-secondary">Voltar</a>
    <?php endif; ?>
</div>

</body>
</html>
