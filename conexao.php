<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ingredientes";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checar conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
echo "Conexão bem sucedida";