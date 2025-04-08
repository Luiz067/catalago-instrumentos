<?php
session_start();
$usuario = 'admin';
$senhaHash = password_hash('admin', PASSWORD_DEFAULT);
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['usuario'] === $usuario && password_verify($_POST['senha'], $senhaHash)) {
        $_SESSION['logado'] = true;
        header('Location: protegido.php');
        exit;
    } else {
        $erro = 'Usuário ou senha inválidos';
    }
}
?>
<?php include 'includes/cabecalho.php'; ?>
<h2>Login</h2>
<form method="POST">
    <input name="usuario" class="form-control mb-2" placeholder="Usuário">
    <input name="senha" type="password" class="form-control mb-2" placeholder="Senha">
    <button class="btn btn-primary">Entrar</button>
</form>
<p class="text-danger"><?= $erro ?></p>
<?php include 'includes/rodape.php'; ?>
