<?php

// Configurações de conexão com o banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dynatrace';

// Conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

?>
