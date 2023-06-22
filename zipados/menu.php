<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="img/style.css">
    <title>MetricMind APM Solutions</title>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
    <div class="header">
        <a href="index.php"><img src="img/logo.png" alt="Logo da Empresa" class="logo"></a>
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
        ];

        
        class CustomButton
        {
            private $label;
            private $url;

            public function __construct($label, $url)
            {
                $this->label = $label;
                $this->url = $url;
            }

            public function render()
            {
                echo '<a href="' . $this->url . '" class="button">' . $this->label . '</a>';
            }
        }

        // Criando os botões
        $loginButton = new CustomButton('Login', 'login.php');

        // Renderizando os botões
       

        // Instanciando a classe Menu e renderizando o menu
        $menu = new Menu($items);
        $menu->render();
        echo '<div class="button-container">';
        $loginButton->render();
        echo '</div>';
        ?>
    </div>
</body>

</html>
