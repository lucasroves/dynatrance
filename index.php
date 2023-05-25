<?php include_once 'menu.php'; ?>
<?php

class Button
{
    private $label;
    private $class;

    public function __construct($label, $class)
    {
        $this->label = $label;
        $this->class = $class;
    }

    public function render()
    {
        echo '<button class="' . $this->class . '">' . $this->label . '</button>';
    }
}

$saibaMaisButton = new Button("Saiba Mais", "button");
$soliciteApresentacaoButton = new Button("Solicite uma Apresentação", "button");

?>
<!DOCTYPE html>
<html>

<head>
    <title>METRICMID APM SOLUTIONS
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $saibaMaisButton->render();
    $soliciteApresentacaoButton->render();
    ?>
</body>

</html>