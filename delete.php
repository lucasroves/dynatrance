<?php

require_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a query para excluir o registro
    $stmt = $connection->prepare('DELETE FROM clientes WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Registro excluído com sucesso!';
    } else {
        echo 'Erro ao excluir o registro.';
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Registro</title>
</head>
<body>
    <h2>Excluir Registro</h2>
    <p>Digite o ID do registro que deseja excluir:</p>
    <form method="GET" action="delete.php">
        <input type="text" name="id" required>
        <input type="submit" value="Excluir">
    </form>
</body>
</html>
