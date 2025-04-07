<?php
session_start();
$itensFixos = [
    ['id' => 1, 'titulo' => 'Violão Acústico', 'categoria' => 'Cordas', 'imagem' => 'img/violao.jpg', 'descricao' => 'Violão de nylon para iniciantes.'],
    ['id' => 2, 'titulo' => 'Bateria Eletrônica', 'categoria' => 'Percussão', 'imagem' => 'img/bateria.jpg', 'descricao' => 'Ideal para ensaios em apartamento.'],
    ['id' => 3, 'titulo' => 'Teclado Yamaha', 'categoria' => 'Teclas', 'imagem' => 'img/teclado.jpg', 'descricao' => 'Teclado com funções avançadas.']
];
$itensSessao = $_SESSION['novos_itens'] ?? [];

$itens = array_merge($itensFixos, $itensSessao);
?>
