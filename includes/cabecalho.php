<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Instrumentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <!-- Título e Botões (Início e Login/Logout) à esquerda -->
            <a class="navbar-brand" href="index.php">Catálogo de Instrumentos</a>
            <div class="d-flex">
                <?php if (isset($_SESSION['logado']) && $_SESSION['logado']): ?>
                    <a href="logout.php" class="btn btn-outline-danger me-2">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary me-2">Login</a>
                <?php endif; ?>
                <a href="index.php" class="btn btn-outline-secondary">Início</a>
            </div>

            <!-- Caixa de pesquisa à direita -->
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control w-auto ms-3" placeholder="Pesquisar por nome" value="<?= $_GET['search'] ?? '' ?>">
                <button type="submit" class="btn btn-outline-primary ms-2">Pesquisar</button>
            </form>
        </div>
    </nav>

    <div class="container">