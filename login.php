<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <label for="apelidoLogin">Apelido</label>
        <input required type="text" name="apelidoLogin">
        <label for="cargoLogin">Cargo</label>
        <input required type="text" name="cargoLogin">
        <input type="submit" value="Entrar" name="entrar">
    </form>
    <a href="index.php">Voltar</a>

    <?php

    include('conexao.php');

    if(isset($_POST['entrar'])) {
        $apelido = $_POST['apelidoLogin'];
        $cargo = $_POST['cargoLogin'];

        $entrar = "SELECT * FROM tb_jogadores WHERE apelido = '$apelido' AND cargo = '$cargo'";
        $entrar_query = $conexao->query($entrar) or exit('Houve um erro ao procurar os jogadores. ' . $conexao->error);

        $quantidade = $entrar_query->num_rows;

        if($quantidade == 1) {
            $_SESSION['apelidoLogin'] = $_POST['apelidoLogin'];
            header('Location: home.php');
        } else {
            echo "<script> alert('Erro no login.') </script>";
        }
    }
    ?>
</body>
</html>
