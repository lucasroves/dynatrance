<?php

// Configurações de conexão com o banco de dados
$host = 'localhost';
$username = 'seu_usuario';
$password = 'sua_senha';
$dbname = 'apm';

// Conexão com o banco de dados
$connection = new mysqli($host, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($connection->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $connection->connect_error);
}

?>
