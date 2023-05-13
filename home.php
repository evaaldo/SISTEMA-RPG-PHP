<?php

session_start();
if(!isset($_SESSION['apelidoLogin'])) {
    header('Location: index.php');
    exit;
} else {
    echo "oi";
    echo "<a href=logout>Voltar</a>";
}

?>