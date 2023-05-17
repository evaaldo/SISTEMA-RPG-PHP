<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "mensagens";

$conexao = mysqli_connect($hostname, $username, $password, $database);
if($conexao->error) {
    exit("Ocorreu um erro ao conectar-se com o banco. " . $conexao->error);
}

?>