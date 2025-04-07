<?php
function buscarItemPorId($id, $itens) {
    foreach ($itens as $item) {
        if ($item['id'] == $id) return $item;
    }
    return null;
}
?>
