<?php include_once 'menu.php'; ?>

<?php
class Button
{
    private $label;
    private $class;
    private $link;

    public function __construct($label, $class, $link)
    {
        $this->label = $label;
        $this->class = $class;
        $this->link = $link;
    }

    public function render()
    {
        echo '<a class="' . $this->class . '" href="' . $this->link . '">' . $this->label . '</a>';
    }
}

$saibaMaisButton = new Button("Saiba Mais", "buttonS", "#");
$soliciteApresentacaoButton = new Button("Solicite uma Apresentação", "buttonA", "#");

?>

<!DOCTYPE html>
<html>

<head>
    <title>MetricMind APM Solutions</title>
    <link rel="stylesheet" href="img/style.css">
</head>

<body class="body">
    <div class="container">
        <div class="box-text">
            <h1>Descubra o poder do <br> monitoramento inteligente <br> MetricMind com Dynatrace<br>
                <p>Experimente o poder de uma inteligência artificial determinística e descubra como <br>dizimar o custo operacional, ganhando uma performance nunca vista.</p>

            </h1>
        </div>
        <div class="box">
            <?php
            $saibaMaisButton->render();
            $soliciteApresentacaoButton->render();
            ?>
        </div>
    </div>
    <div class="barra">.</div>
</body>

</html>
