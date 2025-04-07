<?php include 'includes/cabecalho.php'; include 'dados/itens.php'; include 'includes/funcoes.php';
$id = $_GET['id'] ?? 0;
$item = buscarItemPorId($id, $itens);
if (!$item): echo "<p>Item não encontrado.</p>";
else: ?>
    <h2><?= $item['titulo'] ?></h2>
    <img src="<?= $item['imagem'] ?>" class="img-fluid mb-3">
    <p><strong>Categoria:</strong> <?= $item['categoria'] ?></p>
    <p><?= $item['descricao'] ?></p>
<?php endif; include 'includes/rodape.php'; ?>
