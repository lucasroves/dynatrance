<?php include_once 'menu.php'; ?>
<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos 'cnpj' e 'senha' foram preenchidos
    if (!empty($_POST['cnpj']) && !empty($_POST['senha'])) {
        $cnpj = $_POST['cnpj'];
        $senha = $_POST['senha'];

        // Verifica se o CNPJ e a senha correspondem a um registro na tabela
        $stmt = $conn->prepare('SELECT * FROM cliente WHERE cnpj = ? AND senha = ?');
        $stmt->bind_param('ss', $cnpj, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // O CNPJ e a senha estão corretos, então prossegue com a exclusão do registro
            $stmt = $conn->prepare('DELETE FROM cliente WHERE cnpj = ?');
            $stmt->bind_param('s', $cnpj);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo 'Registro excluído com sucesso!';
            } else {
                echo 'Erro ao excluir o registro.';
            }

            $stmt->close();
        } else {
            echo 'CNPJ e/ou senha incorretos.';
        }
    } else {
        echo 'Por favor, preencha os campos CNPJ e senha.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Registro</title>
</head>
<body>
    <h2>Excluir Registro</h2>
    <form method="POST" action="delete.php">
        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Excluir">
        <button onclick="location.href='index.php'">Cancelar</button>
    </form>
</body>
</html>
