<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "jogadores";

$conexao = mysqli_connect($hostname, $username, $password, $database);
if($conexao->error) {
    exit("Ocorreu um erro na conexão: " . $conexao->error);
}

?>