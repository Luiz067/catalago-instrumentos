<?php include 'includes/cabecalho.php'; include 'dados/itens.php'; ?>

<h1>Instrumentos Musicais</h1>

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
