<?php

session_start(); // Inicia a sessão


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$usuario_correto = 'admin';
$senha_correta = '1234';

if ($usuario === $usuario_correto && $senha === $senha_correta) {
    $_SESSION['usuario'] = $usuario; // Salva o nome do usuário na sessão
    echo "<h2>Bem-vindo, $usuario!</h2>";
    echo "<p><a href='menu.php'>Ir para o menu</a></p>";
} else {
    echo '<p style="color: red;"<h2>Login inválido!</h2>"</p>';
    echo "<p><a href='login.php'>Tentar novamente</a></p>";
}
?>
