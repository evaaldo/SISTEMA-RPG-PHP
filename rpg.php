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
    <link rel="stylesheet" href="rpg.css">
    <script src="https://kit.fontawesome.com/88cbac72fc.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <div>
        <a class="logout" href="logout.php">Voltar</a>
        <h1>Taverna</h1>
        <?php
        print "<p class='usuario_nome'><i class='fa-solid fa-user'></i> " . $_SESSION['apelidoLogin'] . "</p>";
        ?>
    </div>
    <label for="chkChat"><i class="fa-solid fa-eye"></i></label>
    <input class="chkChat" type="checkbox" name="chkChat" id="chkChat">
    <label for="chkDice"><i class="fa-solid fa-dice"></i></label>
    <input class="chkDice" type="checkbox" name="chkDice" id="chkDice">
    <div class="chat">
        <h3>Bate-papo</h3>
        <?php
        include('conexaoMensagem.php');

        $mostrarMensagem = "SELECT * FROM tb_mensagens";
        $mostrarMensagem_query = $conexao->query($mostrarMensagem);

        $quantidade = $mostrarMensagem_query->num_rows;

        if($quantidade > 0 && $quantidade <= 10) {
            while($row = $mostrarMensagem_query->fetch_object()) {
                print "<div class='chat-mensagens'>";
                print "<p class='mensagem-jogador'>" . $row->jogador . ": </p>";
                print "<p class='mensagem-conteudo'>" . $row->mensagem . "</p>";
                print "</div>";
            }
        } if($quantidade > 10) {
            print "<p class='mensagem-vazia'>Máximo de 10 mensagens. Por favor, apague e recomece!</p>";
        } if($quantidade == 0) {
            print "<p class='mensagem-vazia'>Suas mensagens aparecerão aqui</p>";
        }     
        ?>
        <form method="post">
            <input class="chat-caixa_texto" type="text" name="mensagem" placeholder="Digite aqui..">
            <label for="enviarMensagem"><i class="fa-regular fa-paper-plane"></i></label>
            <input id="enviarMensagem" class="chat-caixa_botao" type="submit" name="enviarMensagem" value="Enviar">
            <label for="apagarMensagem"><i class="fa-solid fa-trash-can"></i></label>
            <input id="apagarMensagem" class="chat-caixa_botao apg" type="submit" name="apagarMensagem" value="Apagar">
        </form>
    </div>

    <?php
    include('conexaoMensagem.php');
    if(isset($_POST['enviarMensagem'])) {
        if(strlen($_POST['mensagem']) != 0) {
            $mensagem = $_POST['mensagem'];
            $jogador = $_SESSION['apelidoLogin'];

            $mensagem = "INSERT INTO tb_mensagens (jogador, mensagem) VALUES ('$jogador', '$mensagem')";
            $mensagem_query = $conexao->query($mensagem);

            header("Refresh: 0");
        } else {
            echo "<script>alert('Escreva uma mensagem!');</script>";
        }
    } if(isset($_POST['apagarMensagem'])) {
        $apagarTudo = "DELETE FROM tb_mensagens";
        $apagarTudo_query = $conexao->query($apagarTudo);
        header("Refresh: 0");
    }
    ?>

    <form class="dados" method="post">
        <label for="d20"><i class="fa-solid fa-dice-d20"></i></label>
        <input type="submit" value="" name="d20" id="d20">
        <label for="d6"><i class="fa-solid fa-dice-d6"></i></label>
        <input type="submit" value="" name="d6" id="d6">
    </form>

    <?php

    if(isset($_POST['d20'])) {
        print "<p class='dado_valor'>D20: " . mt_rand(1,20) . "</p>";
    }   else if(isset($_POST['d6'])) {
        print "<p class='dado_valor'>D6: " . mt_rand(1,6) . "</p>";
    }

    ?>

    <select onchange="mostrarImagem()" id="opcao">
        <option value="">Selecione uma opção</option>
        <option value="grama.jpg">Grama</option>
        <option value="mar.jpg">Mar</option>
    </select>
    <img id="imagem" class="hidden cenario" src="" alt="Cenário">

    <script>
        function mostrarImagem() {
            var opcao = document.getElementById("opcao");
            var imagem = document.getElementById("imagem");

            if(opcao.value !== "") {
                imagem.src = opcao.value;
                imagem.classList.remove("hidden");
            } else {
                imagem.src = "";
                imagem.classList.add("hidden");
            }
        }

    </script>

</body>
</html>