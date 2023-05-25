<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos foram preenchidos
    if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['email'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Prepara e executa a query para atualizar o registro
        $stmt = $connection->prepare('UPDATE clientes SET nome = ?, email = ? WHERE id = ?');
        $stmt->bind_param('ssi', $nome, $email, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo 'Registro atualizado com sucesso!';
        } else {
            echo 'Erro ao atualizar o registro.';
        }

        $stmt->close();
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}

// Recupera os dados do registro a ser atualizado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a query para buscar o registro
    $stmt = $connection->prepare('SELECT * FROM clientes WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $email = $row['email'];
    } else {
        echo 'Registro não encontrado.';
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Atualizar Registro</title>
</head>

<body>
    <h2>Atualizar Registro</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>

        <input type="submit" value="Atualizar">
    </form>
</body>

</html>