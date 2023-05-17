<?php

session_start();
if(!isset($_SESSION['apelidoLogin'])) {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div>
        <a class="logout" href="logout.php">Voltar</a>
        <h1>Taverna</h1>
        <?php
        print "<p class='usuario_nome'><i class='fa-solid fa-user'></i> " . $_SESSION['apelidoLogin'] . "</p>";
        ?>
    </div>

<script src="https://kit.fontawesome.com/88cbac72fc.js" crossorigin="anonymous"></script>
</body>
</html>