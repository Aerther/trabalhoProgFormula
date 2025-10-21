<?php

require_once __DIR__."/vendor/autoload.php";

session_start();

if(!isset($_SESSION["idUser"])) {
    header("Location: index.php");
}

$pages = ["drivers" => "drivers.php", "races" => "races.php", "shareddrivers" => "shareddrivers.php"];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./src/styles/reset.css">
    <link rel="stylesheet" href="./src/styles/index.css">

    <script src="./src/js/main.js" defer></script>

    <title>Home</title>
</head>
<body>
    <div id="container">
        <header>
            <h1>Sharing Formulas</h1>

            <div class="buttons">
                <a href="private.php?page=drivers" class=<?php if($_GET["page"] == "drivers") : ?> "visit" <?php endif; ?>>Pilotos</>
                <a href="private.php?page=races" class=<?php if($_GET["page"] == "races") : ?> "visit" <?php endif; ?>>Corridas</a>
                <a href="private.php?page=shareddrivers" class=<?php if($_GET["page"] == "shareddrivers") : ?> "visit" <?php endif; ?>>Pilotos compartilhados</a>
            </div>

            <div class="profile-img">
                <figure>
                    <img src="./src/images/profile.png" alt="profile picture">
                </figure>
            </div>
        </header>

        <main>
            <?php
            
            require __DIR__."/pages/".$pages[$_GET["page"]];

            ?>
        </main>

        <footer>
            <a href="#" class="come-to-top">Subir</a>
        </footer>
    </div>
</body>
</html>