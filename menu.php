<?php 
session_start();

if (!isset($_SESSION["receitas"])) {
    $_SESSION["receitas"] = [];
}

$filtro = $_GET["filtro"] ?? "";
$receitas = $_SESSION["receitas"];

if ($filtro !== "") {
    $receitas = array_filter($receitas, function($r) use ($filtro) {
        return stripos($r["titulo"], $filtro) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Receitas Fitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Receitas Fitness🥕🍆🥦</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="menu.php">Início</a>
                </li>
                <?php 
                if (!isset($_SESSION['usuario'])) {
                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                
                <?php 
                if (isset($_SESSION['usuario'])) {
                    echo '<li class="nav-item"><a class="nav-link text-warning" href="cadastro_receita.php">Cadastrar Receita</a></li>';
                }
                ?>
            </ul>

            <!-- Filtro -->
            <form class="d-flex" role="search" method="GET">
                <input class="form-control me-2" type="search" name="filtro" placeholder="Buscar receita..." value="<?= htmlspecialchars($filtro) ?>">
                <button class="btn btn-outline-success" type="submit">Filtrar</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');

        if ($hora >= 5 && $hora < 12) {
            echo '<h4 style="color: blue; font-weight: bold;">Bom dia! Bem-vindo(a)☀️</h4>';
        } elseif ($hora >= 12 && $hora < 18) {
            echo '<h4 style="color: blue; font-weight: bold;">Boa tarde! Bem-vindo(a)⛅</h4>';
        } else {
            echo '<h4 style="color: blue; font-weight: bold;">Boa noite! Bem-vindo(a)🌃</h4>';
        }
    ?>
</div>

<div class="container mt-4">
    <div class="row">
        <?php 
        if (empty($receitas)) {
            echo '<p class="text-muted">Nenhuma receita cadastrada no momento.<br>
            Para cadastrar uma receita faça o login! </p>';
        } else {
            foreach ($receitas as $r) {
                echo '<div class="col-md-4 mb-4">';
                echo '  <div class="card h-100 shadow-sm">';
                echo '      <img src="' . htmlspecialchars($r["imagem"]) . '" class="card-img-top" alt="Imagem da Receita">';
                echo '      <div class="card-body">';
                echo '          <h5 class="card-title">' . htmlspecialchars($r["titulo"]) . '</h5>';
                echo '          <p class="card-text">Categoria: ' . htmlspecialchars($r["categoria"]) . '</p>';
                echo '          <a href="detalhes.php?id=' . urlencode($r["id"]) . '" class="btn btn-primary">Ver mais</a>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>