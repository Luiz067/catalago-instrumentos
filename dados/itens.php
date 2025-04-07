<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$itens = $_SESSION['novos_itens'] ?? [];
?>