

<?php
//si nos conectáramos a la BD sería aquí
// require_once __DIR__ . '/../app/includes/connection.php';

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
    <?php include '../app/templates/head.php'; ?>
</head>

<body>
    <header id='header'>
        <?php include '../app/templates/navbar.php'; ?>
    </header>

    <main id="main">

        <?php
        $file = "../app/includes/$page.php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "<p class='no-page'>No se ha encontrado la página</p>";
        }
        ?>

    </main>

    <?php require_once '../app/templates/footer.php'; ?>


    <script src="./assets/js/main.js"></script>

</body>


</html>