<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="img/style.css">
    <title>METRICMIND APM SOLUTIONS</title>
</head>

<body>
    <div class="header">
        <img src="img/logo.png" alt="Logo da Empresa" class="logo">
        <?php
        class Menu
        {
            private $items;

            public function __construct($items)
            {
                $this->items = $items;
            }

            public function render()
            {
                echo '<div class="menu">';
                foreach ($this->items as $item) {
                    echo '<a href="' . $item['url'] . '">' . $item['label'] . '</a>';
                }
                echo '</div>';
            }
        }

        // Criando os itens do menu
        $items = [
            ['label' => 'Quem Somos Nós', 'url' => 'quem-somos.php'],
            ['label' => 'Soluções', 'url' => 'solucoes.php'],
            ['label' => 'Blog', 'url' => 'blog.php'],
            ['label' => 'Contato', 'url' => 'contato.php'],
            ['label' => 'Clientes', 'url' => 'clientes.php'],
            ['label' => 'Login', 'url' => 'login.php'],
            ['label' => 'Cadastro', 'url' => 'create.php']
        ];

        // Instanciando a classe Menu e renderizando o menu
        $menu = new Menu($items);
        $menu->render();
        ?>
    </div>
</body>

</html>