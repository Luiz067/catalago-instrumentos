<?php include 'includes/cabecalho.php'; include 'dados/itens.php'; ?>

<h1>Instrumentos Musicais</h1>

<form method="GET" class="mb-4">
    <label for="categoria" class="form-label">Filtrar por Categoria:</label>
    <select name="categoria" id="categoria" class="form-select w-25 mb-3">
        <option value="">Todas</option>
        <option value="Cordas" <?= ($_GET['categoria'] ?? '') === 'Cordas' ? 'selected' : '' ?>>Cordas</option>
        <option value="Percussão" <?= ($_GET['categoria'] ?? '') === 'Percussão' ? 'selected' : '' ?>>Percussão</option>
        <option value="Teclas" <?= ($_GET['categoria'] ?? '') === 'Teclas' ? 'selected' : '' ?>>Teclas</option>
        <option value="Sopro" <?= ($_GET['categoria'] ?? '') === 'Sopro' ? 'selected' : '' ?>>Sopro</option>
        <option value="Eletrônicos" <?= ($_GET['categoria'] ?? '') === 'Eletrônicos' ? 'selected' : '' ?>>Eletrônicos</option>
        <option value="Acessórios" <?= ($_GET['categoria'] ?? '') === 'Acessórios' ? 'selected' : '' ?>>Acessórios</option>
    </select>
    <button type="submit" class="btn btn-outline-primary">Aplicar Filtro</button>
</form>

<div class="row">
<?php
$categoriaFiltro = $_GET['categoria'] ?? '';
foreach ($itens as $item):
    if ($categoriaFiltro && $item['categoria'] !== $categoriaFiltro) continue;
?>
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <img src="<?= $item['imagem'] ?>" class="card-img-top" style="width: 100%; height: 250px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= $item['titulo'] ?></h5>
                <p class="card-text"><strong><?= $item['categoria'] ?></strong></p>
                <a href="detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary mt-auto">Ver mais</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?php include 'includes/rodape.php'; ?>
