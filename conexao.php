<?php

$hostname = "localhost";
$database = "usuarios";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);
if($mysqli->connect_errno) {
    echo "Falha ao conectar ao banco de dados: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    // echo "<script> alert('Banco de dados conectado com sucesso.') </script>";
}

?>
