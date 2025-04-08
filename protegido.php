<?php
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header('Location: login.php');
    exit;
}

$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem']) && isset($_POST['titulo'])) {
    $arquivo = $_FILES['imagem'];
    $nomeTemp = $arquivo['tmp_name'];
    $nomeFinal = 'uploads/' . uniqid() . '-' . basename($arquivo['name']);

    if (move_uploaded_file($nomeTemp, $nomeFinal)) {
        $novo = [
            'id' => time(),
            'titulo' => $_POST['titulo'],
            'categoria' => $_POST['categoria'],
            'imagem' => $nomeFinal,
            'descricao' => $_POST['descricao']
        ];
        $_SESSION['novos_itens'][] = $novo;
        $_SESSION['mensagem'] = "Item cadastrado com sucesso!";
        header('Location: protegido.php');
        exit;
    } else {
        $mensagem = "Erro ao fazer upload da imagem.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id'])) {
    $idExcluir = $_POST['excluir_id'];

    if (isset($_SESSION['novos_itens'])) {
        foreach ($_SESSION['novos_itens'] as $key => $item) {
            if ($item['id'] == $idExcluir) {
                if (strpos($item['imagem'], 'uploads/') === 0 && file_exists($item['imagem'])) {
                    unlink($item['imagem']);
                }
                unset($_SESSION['novos_itens'][$key]);
                break;
            }
        }
        $_SESSION['novos_itens'] = array_values($_SESSION['novos_itens']);
    }

    $_SESSION['mensagem'] = "Item excluído com sucesso!";
    header('Location: protegido.php');
    exit;
}

include 'includes/cabecalho.php';
include 'dados/itens.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Painel Admin</h1>
</div>

<?php if ($mensagem): ?>
    <div class="alert alert-info"><?= $mensagem ?></div>
<?php endif; ?>

<button class="btn btn-success mb-4" onclick="document.getElementById('formCadastro').classList.toggle('d-none')">
    + Novo Item
</button>
<div id="formCadastro" class="card p-4 mb-5 d-none">
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input name="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria" class="form-select" required>
                <option value="">Selecione</option>
                <option value="Cordas">Cordas</option>
                <option value="Percussão">Percussão</option>
                <option value="Teclas">Teclas</option>
                <option value="Sopro">Sopro</option>
                <option value="Eletrônicos">Eletrônicos</option>
                <option value="Acessórios">Acessórios</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagem (arquivo)</label>
            <input type="file" name="imagem" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<div class="row">
    <?php
    // Pegando o valor da pesquisa
    $pesquisa = $_GET['search'] ?? '';

    // Filtrando os itens com base no nome
    foreach ($itens as $item):
        if ($pesquisa && stripos($item['titulo'], $pesquisa) === false) continue; // Pesquisa case-insensitive
    ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="<?= $item['imagem'] ?>" class="card-img-top"
                    style="width: 100%; height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $item['titulo'] ?></h5>
                    <p class="card-text"><strong><?= $item['categoria'] ?></strong></p>
                    <a href="detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary mb-2 mt-auto">Ver mais</a>

                    <form method="POST">
                        <input type="hidden" name="excluir_id" value="<?= $item['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/rodape.php'; ?>