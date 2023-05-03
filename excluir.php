<form method="POST">
    <label for="nomeExcluir">Nome</label>
    <input type="text" name="nomeExcluir">
    <input type="submit" value="Excluir" name="acaoExcluir">
</form>
<div>
    <a href="index.php">Voltar</a>
</div>

<?php

include('conexao.php');

if(isset($_POST['acaoExcluir'])) {
    if(strlen($_POST['nomeExcluir']) == 0) {
        echo "<script> alert('Digite que jogador você deseja excluir.') </script>";
    } else {
        $nomeExclusao = $_POST['nomeExcluir'];

        $sql_exclusao = "DELETE FROM tb_usuario WHERE nome = '$nomeExclusao'";
        $exclusao = $mysqli->query($sql_exclusao) or die("Falha na consulta do código SQL: " . $mysqli->error);       
    }
}

?>
