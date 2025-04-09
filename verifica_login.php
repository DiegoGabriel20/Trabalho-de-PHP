<?php
session_start(); // Inicia a sessão

// Simulando um "banco de dados" com hash da senha
$usuario_correto = 'admin';
// A senha '1234' foi criptografada com password_hash()
$senha_hash = '$2y$10$pKK1GeM.ir6ZoyrvexIMhuz40P8FghCJadbBgm/vONhzeFIkkobL.'; // senha: 1234

// Pegando os dados do formulário
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se o usuário é correto e se a senha confere
if ($usuario === $usuario_correto && password_verify($senha, $senha_hash)) {
    $_SESSION['usuario'] = $usuario; // Salva o nome do usuário na sessão
    echo "<h2>Bem-vindo, $usuario!</h2>";
    echo "<p><a href='menu.php'>Ir para o menu</a></p>";
} else {
    echo '<p style="color: red;"><strong>Login inválido!</strong></p>';
    echo "<p><a href='login.php'>Tentar novamente</a></p>";
}
?>
