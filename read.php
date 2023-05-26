<?php include_once 'menu.php'; ?>
<?php

require_once 'config.php';

class Cliente
{
    private $id;
    private $nome;
    private $cnpj;
    private $email;
    private $senha;
    private $dataPoc;

    public function __construct($id, $nome, $cnpj, $email, $senha, $dataPoc)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataPoc = $dataPoc;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getDataPocFormatted()
    {
        $dataPocTimestamp = strtotime($this->dataPoc);
        return date('d/m/Y', $dataPocTimestamp);
    }
}


// Executa a query para buscar os registros
$query = 'SELECT * FROM cliente';
$result = $conn->query($query);

$clientes = [];

while ($row = $result->fetch_assoc()) {
    $cliente = new Cliente($row['id'], $row['nome'], $row['cnpj'], $row['email'], $row['senha'], $row['dataPoc']);
    $clientes[] = $cliente;
}

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
            <th>Data POC</th>
        </tr>
        <?php foreach ($clientes as $cliente) : ?>
            <tr>
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getEmail(); ?></td>
                <td><?php echo $cliente->getDataPocFormatted(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>

