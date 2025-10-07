<?php

require_once __DIR__."/vendor/autoload.php";

use App\Classes\User;

if(isset($_POST["btn-submit"])) {
    $user = new User($_POST["user"], $_POST["password"]);
    $user->setEmail($_POST["email"]);

    if($_POST["password"] == $_POST["password-confirm"]) {
        $user->saveUser();
        
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <div id="container">
        <form action="addUser.php" method="post">
            <section>
                <label for="user">Usuário</label>
                <input type="text" name="user" id="user">
            </section>

            <section>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </section>
            
            <section>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password">
            </section>

            <section>
                <label for="password-confirm">Confirmar Senha</label>
                <input type="password" name="password-confirm" id="password-confirm">
            </section>

            <section>
                <input type="submit" value="Entrar" name="btn-submit">
            </section>
        </form>
    </div>
</body>
</html>