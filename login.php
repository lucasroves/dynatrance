<?php include_once 'menu.php'; ?>
<?php

class LoginPage
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Página de Login</title>
            <style>
                .loginPage {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 400px;
                    height: 400px;
                    background-color: rgb(3, 2, 2);
                    border-radius: 10px;
                    padding: 20px;
                    background-image: url(/);
                }
            </style>
        </head>

        <body>

            <div class="loginPage">
                <h2>Página de Login</h2>
                <form method="POST" action="login.php">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required><br>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" required><br>

                    <input type="submit" value="Entrar">
                    <button onclick="location.href='index.php'">Cancelar</button>
                    <a href="recuperar_senha.php">Recuperar Senha</a>
                </form>
            </div>

        </body>

        </html>
<?php
    }
}

// Instanciar e exibir a página de login
$loginPage = new LoginPage();
$loginPage->render();
?>