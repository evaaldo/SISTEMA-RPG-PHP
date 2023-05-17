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
    <div class="chat">
        <?php
        include('conexaoMensagem.php');

        $mostrarMensagem = "SELECT * FROM tb_mensagens";
        $mostrarMensagem_query = $conexao->query($mostrarMensagem);

        $quantidade = $mostrarMensagem_query->num_rows;

        if($quantidade > 0) {
            while($row = $mostrarMensagem_query->fetch_object()) {
                print "<p class='mensagem-jogador'>" . $row->jogador . "</p>";
                print "<p class='mensagem-conteudo'>" . $row->mensagem . "</p>";
            }
        }       
        ?>
        <form method="post">
            <input type="text" name="mensagem" placeholder="Digite aqui.." required>
            <input type="submit" name="enviarMensagem" value="Enviar">
        </form>
    </div>

    <?php
    include('conexaoMensagem.php');
    if(isset($_POST['enviarMensagem'])) {
       $mensagem = $_POST['mensagem'];
       $jogador = $_SESSION['apelidoLogin'];

       $mensagem = "INSERT INTO tb_mensagens (jogador, mensagem) VALUES ('$jogador', '$mensagem')";
       $mensagem_query = $conexao->query($mensagem);
    }
    ?>

<script src="https://kit.fontawesome.com/88cbac72fc.js" crossorigin="anonymous"></script>
</body>
</html>