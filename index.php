<?php require 'includes/connection.php'; ?>
<?php
// Definir qué página cargar (por defecto, el mapa)
if (isset($_GET['search'])) {
    $page = 'filters';
} else {
    $page = isset($_GET['page']) ? $_GET['page'] : 'landing';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/head.php'; ?>
</head>

<body>
    <header id='header'>
        <?php include 'templates/navbar.php'; ?>
    </header>

    <main id="main">

        <?php

        $file = "includes/$page.php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "<p class='no-page'>No se ha encontrado la página</p>";
            // require "includes/mapIndex.php";
        }
        ?>

    </main>

    <?php require_once 'templates/footer.php'; ?>

    <script src="./assets/js/main.js"></script>

</body>


</html>