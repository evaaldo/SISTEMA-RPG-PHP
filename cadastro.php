<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoro - Cadastrar Jogador</title>
</head>
<body>
    <form method="POST">
        <label for="nomeCadastro">Nome</label>
        <input type="text" name="nomeCadastro">
        <label for="cargoCadastro">Cargo</label>
        <input type="text" name="cargoCadastro">
        <input type="submit" value="Cadastrar" name="">
    </form>
    <div>
        <a href="index.php">Voltar</a>
        <br/>
        <a href="login.php">Já é um jogador?</a>
    </div>

    <?php

        include('conexao.php');

        if(!isset($_POST['nomeCadastro'])) {
            echo "<script> alert('Insira um nome, por favor.') </script>";
        } else {
            if(!isset($_POST['cargoCadastro'])) {
                echo "<script> alert('insira um cargo, por favor.') </script>";
            } else {
                $nomeCadastro = $_POST["nomeCadastro"];
                $cargoCadastro = $_POST["cargoCadastro"];

                $sql = "INSERT INTO tb_usuario (nome, cargo) VALUES ('$nomeCadastro', '$cargoCadastro')";

                $res = $mysqli->query($sql);
            }
        }

    ?>
</body>
</html>