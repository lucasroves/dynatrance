<?php

require_once 'config.php';

// Executa a query para buscar os registros
$query = 'SELECT * FROM clientes';
$result = $connection->query($query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Listar Registros</title>
</head>

<body>
    <h2>Listar Registros</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['nome']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>