<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$usuario_correto = 'admin';
$senha_correta = '1234';

if ($usuario === $usuario_correto && $senha === $senha_correta) {
    echo "<h2>Bem-vindo, $usuario!</h2>";
    echo "<p><a href='menu.php'>Ir para o menu</a></p>";
} else {
    echo "<h2>Login inválido!</h2>";
    echo "<p><a href='login.php'>Tentar novamente</a></p>";
}
?>
