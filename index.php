<?php include 'includes/cabecalho.php'; include 'dados/itens.php'; ?>
<h1>Instrumentos Musicais</h1>
<div class="row">
<?php foreach ($itens as $item): ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="<?= $item['imagem'] ?>" class="card-img-top">
            <div class="card-body">
                <h5><?= $item['titulo'] ?></h5>
                <p><strong><?= $item['categoria'] ?></strong></p>
                <a href="detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary">Ver mais</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php include 'includes/rodape.php'; ?>
