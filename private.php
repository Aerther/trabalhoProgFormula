<?php

session_start();

if(!isset($_SESSION["idUser"])) {
    header("Location: index.php");
}



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div id="container">
        <header>

        </header>

        <main>
            <?php
            
            

            ?>
        </main>

        <footer>

        </footer>
    </div>
</body>
</html>