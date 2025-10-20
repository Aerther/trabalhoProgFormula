<?php

require_once __DIR__."/vendor/autoload.php";

use App\Classes\User;

$errorText = "";

if(isset($_POST["btn-submit"])) {
    $user = new User($_POST["user"], $_POST["password"]);
    $user->setEmail($_POST["email"]);

    if(!$user->userExists()) {
        if($_POST["password"] == $_POST["password-confirm"]) {
            $user->createUser();
            
            header("Location: index.php");
        } else {
            $errorText = "Senhas diferentes";
        }
    } else {
        $errorText = "Usuário já existe";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./src/styles/reset.css">
    <link rel="stylesheet" href="./src/styles/global.css">

    <title>Cadastrar Usuário</title>
    
    <style>
        #container {
            height: 580px;
            width: 550px;
        }

        form {
            grid-template-rows: repeat(6, 1fr) 30px;
        }
    </style>
</head>
<body>
    <div id="container">
        <form action="addUser.php" method="post">
            <section>
                <h2>Cadastrar</h2>
            </section>

            <section>
                <label for="user">Usuário</label>
                <input type="text" name="user" id="user" required>
            </section>

            <section>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </section>
            
            <section>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required>
            </section>

            <section>
                <label for="password-confirm">Confirmar Senha</label>
                <input type="password" name="password-confirm" id="password-confirm" required>
            </section>

            <section class="links">
                <a href="index.php">Retornar ao login</a>
                <input type="submit" value="Cadastrar" name="btn-submit" class="send-btn">
            </section>

            <section class="error">
                <p> <?php echo $errorText ?> </p>
            </section>
        </form>
    </div>
</body>
</html>