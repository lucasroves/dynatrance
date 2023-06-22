<?php include_once 'menu.php'; ?>
<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o campo CNPJ foi preenchido
    if (isset($_POST['cnpj'])) {
        $cnpj = $_POST['cnpj'];

        // Prepara e executa a query para buscar o registro pelo CNPJ
        $stmt = $conn->prepare('SELECT * FROM cliente WHERE cnpj = ?');
        $stmt->bind_param('s', $cnpj);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $nome = $row['nome'];
            $email = $row['email'];
            $senha = $row['senha'];
            $dataPoc = $row['dataPoc'];
        } else {
            echo 'Registro não encontrado.';
        }

        $stmt->close();
    } else {
        echo 'Por favor, preencha o campo CNPJ.';
    }
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
        <?php if (isset($id)) : ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>

            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" value="<?php echo $cnpj; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="<?php echo $senha; ?>" required><br>

            <label for="dataPoc">Data POC:</label>
            <input type="date" name="dataPoc" value="<?php echo $dataPoc; ?>" required><br>

            <input type="submit" value="Atualizar">
        <?php else : ?>
            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" required><br>

            <input type="submit" value="Localizar">
        <?php endif; ?>
        <button onclick="location.href='index.php'">Cancelar</button>
    </form>
</body>

</html>


