<?php include 'includes/cabecalho.php'; include 'dados/itens.php'; ?>
<form method="GET">
    <label>Categoria:</label>
    <select name="categoria" class="form-select">
        <option value="">Todas</option>
        <option value="Cordas">Cordas</option>
        <option value="Percussão">Percussão</option>
        <option value="Teclas">Teclas</option>
    </select>
    <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
</form>

<div class="row mt-3">
<?php
$categoria = $_GET['categoria'] ?? '';
foreach ($itens as $item):
    if ($categoria && $item['categoria'] !== $categoria) continue;
?>
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="<?= $item['imagem'] ?>" class="card-img-top">
            <div class="card-body">
                <h5><?= $item['titulo'] ?></h5>
                <a href="detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary">Ver mais</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php include 'includes/rodape.php'; ?>
