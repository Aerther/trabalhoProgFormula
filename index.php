<?php

require_once __DIR__."/vendor/autoload.php";

use App\Classes\User;

if(isset($_POST["btn-submit"])) {
    
    $user = new User($_POST["user"], $_POST["password"]);
    
    if($user->authenticate()) {
        header("Location: private.php?page=drivers");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <div id="container">
        <form action="index.php" method="post">
            <section>
                <label for="user">Usuário</label>
                <input type="text" name="user" id="user">
            </section>
            
            <section>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password">
            </section>

            <section>
                <a href="addUser.php">Não possui cadastro? Crie aqui</a>
                <input type="submit" value="Entrar" name="btn-submit">
            </section>
        </form>
    </div>
</body>
</html>