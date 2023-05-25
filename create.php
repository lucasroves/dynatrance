<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos foram preenchidos
    if (isset($_POST['nome']) && isset($_POST['email'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Prepara e executa a query para inserir o registro
        $stmt = $connection->prepare('INSERT INTO clientes (nome, email) VALUES (?, ?)');
        $stmt->bind_param('ss', $nome, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo 'Registro criado com sucesso!';
        } else {
            echo 'Erro ao criar o registro.';
        }

        $stmt->close();
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Registro</title>
</head>
<body>
    <h2>Criar Registro</h2>
    <form method="POST" action="create.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
