<?php include_once 'menu.php'; ?>
<?php

require_once 'config.php';

class Cliente
{
    private $nome;
    private $email;
    private $senha;
    private $cnpj;
    private $dataPoc;

    public function __construct($nome, $email, $senha, $cnpj, $dataPoc)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->cnpj = $cnpj;
        $this->dataPoc = $dataPoc;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getDataPoc()
    {
        return $this->dataPoc;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function criarRegistro()
    {
        global $conn;

        // Prepara e executa a query para inserir o registro
        $stmt = $conn->prepare('INSERT INTO cliente (nome, email, senha, cnpj, dataPoc) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $this->nome, $this->email, $this->senha, $this->cnpj, $this->dataPoc);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo 'Registro criado com sucesso!';
        } else {
            echo 'Erro ao criar o registro.';
        }

        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos foram preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cnpj']) && !empty($_POST['data_poc'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cnpj = $_POST['cnpj'];
        $dataPoc = $_POST['data_poc'];

        $cliente = new Cliente($nome, $email, $senha, $cnpj, $dataPoc);
        $cliente->criarRegistro();
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Criar Registro</title>
    <link rel="stylesheet" href="img/style.css">
</head>

<body class="wp-create">
    <h2>Criar Registro</h2>
    <form method="POST" action="create.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" required><br>

        <label for="data_poc">Data POC:</label>
        <input type="date" name="data_poc" required><br>

        <input type="submit" value="Salvar">
        <button onclick="location.href='index.php'">Cancelar</button>

        <button onclick="location.href='delete.php'">Deletar Registro</button>


    </form>
</body>

</html>