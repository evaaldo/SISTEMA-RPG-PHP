<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de jogador</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <h1>Cadastro</h1>
    <form class="cadastro" method="post">
        <label for="usuario">Usuário</label>
        <input required type="text" name="usuario">
        <label for="cargo">Cargo</label>
        <input required type="text" name="cargo">
        <label for="apelido">Apelido</label>
        <input required type="text" name="apelido">
        <input class="botao_crud" type="submit" value="Criar" name="criar">
    </form>
    <a href="index.php">Voltar</a>

    <?php
    include('conexao.php');

    if(isset($_POST['criar'])) {
        $usuario = $_POST['usuario'];
        $cargo = $_POST['cargo'];
        $apelido = $_POST['apelido'];

        $cadastro = "INSERT INTO tb_jogadores (usuario, cargo, apelido) VALUES ('$usuario', '$cargo', '$apelido')";
        $cadastro_query = $conexao->query($cadastro) or exit("Ocorreu um erro na criação do usuário. " . $conexao->error);

        echo "<script> alert('Conta criada!') </script>";
    }
    ?>
</body>
</html>