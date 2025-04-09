<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Navbar com Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Receitas Fitness</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Links da navbar -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="menu.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre.php">Sobre</a>
                </li>

                <!-- Só mostra se o usuário estiver logado -->
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="cadastro_receita.php">Cadastrar Receita</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Formulário de filtro alinhado à direita -->
            <form class="d-flex" role="search" action="menu.php" method="GET">
                <input class="form-control me-2" type="search" name="filtro" placeholder="Buscar receita..." aria-label="Buscar">
                <button class="btn btn-outline-success" type="submit">Filtrar</button>
            </form>
        </div>
    </div>
</nav>

<!-- Conteúdo da página -->
<div class="container mt-4">
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('H');

        if ($hora >= 5 && $hora < 12) {
            echo '<h1 style="color: blue; font-weight: bold;">Bom dia! Bem-vindo(a)</h1>';
        } elseif ($hora >= 12 && $hora < 18) {
            echo '<h1 style="color: blue; font-weight: bold;">Boa tarde! Bem-vindo(a)</h1>';
        } else {
            echo '<h1 style="color: blue; font-weight: bold;">Boa noite! Bem-vindo(a)</h1>';
        }

        echo '<h2>Receitas Fitness!</h2>';
    ?>
</div>

<!-- Script do Bootstrap (JS + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
