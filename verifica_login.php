<?php
session_start(); 


$usuario_correto = 'admin';

$senha_hash = '$2y$10$pKK1GeM.ir6ZoyrvexIMhuz40P8FghCJadbBgm/vONhzeFIkkobL.'; // senha: 1234


$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';


if ($usuario === $usuario_correto && password_verify($senha, $senha_hash)) {
    $_SESSION['usuario'] = $usuario; 
    echo "<h2>Bem-vindo, $usuario!</h2>";
    echo "<p><a href='menu.php'>Ir para o menu</a></p>";
} else {
    echo '<p style="color: red;"><strong>Login inválido!</strong></p>';
    echo "<p><a href='login.php'>Tentar novamente</a></p>";
}
?>
