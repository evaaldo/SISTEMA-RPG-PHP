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
        <input type="submit" value="Cadastrar">
    </form>
    <div>
        <a href="index.php">Voltar</a>
        <br/>
        <a href="login.php">Já é um jogador?</a>
    </div>

    <?php

        include('conexao.php');

        $nome = msqli_real_escape_string($conexao, $_POST['nome']);
        $usuario = mysqli_real_escape_string($conexao, $_POST['cargo']);

        $sql = "SELECT COUNT(*) AS TOTAL FROM tb_usuario WHERE nome = '$nome'";
        $result = mysqli_query($sql);
        

    ?>
</body>
</html>