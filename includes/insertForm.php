<?php
session_start(); //inicio la sesion para traer la variable del mensaje

require 'connection.php';
?>

<div id='insertDiv'>
    <h3>Registra una nueva tienda</h3>

    <?php
    // Mostrar mensaje de éxito o error, verifico si esa variable de sesión está configurada y muestro el mensaje correspondiente.
    if (isset($_SESSION['message'])) {
        echo "<p>{$_SESSION['message']}</p>";
        unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
    }

    // Mostrar errores si hay segúin las vaslidaciones que yo le cree en ionsertedData.php
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $key => $value) {
            echo "<p>Error en $key: $value</p>";
        }
        //unset($_SESSION['errors']); // Limpiar los errores después de mostrarlos
    }
    ?>


    <form class='insertForm' action="insertedData.php" method='POST'>

        <label for="name">Nombre tienda:
            <input type="text" name="name"> </label>

        <label for="address">Direccion:
            <input type="text" name="address"> </label>

        <!-- <label for="zip">Código postal
            <input type="text" name="zip"> </label> -->


        <label for="city">Ciudad
            <input type="text" name="city"> </label>

        <!-- <label for="state">Provincia
            <input type="text" name="state"> </label>

        <label for="country">País <input type="text" name="country"> </label> -->


        <!-- <label for="lat">Latitud (coordenada)
            <input type="text" name="lat" pattern="^-?\d{1,3}(?:\.\d+)?$" title="Por favor, ingrese una latitud válida" required> </label>

        <label for="lng">Longitud (coordenada)
            <input type="text" name="lng" pattern="^-?\d{1,3}(?:\.\d+)?$" title="Por favor, ingrese una longitud válida" required> </label>  -->
<!-- 
        <label for="web">Página Web
            <input type="text" name="web"> </label>

        <label for="email">Email de contacto
            <input type="text" name="email"> </label> -->

        <label for="phone">Telefono
            <input type="number" name="phone"> </label>

        <!-- <label for="description">Descripción
            <input type="text" name="description"> </label>

        <label for="category">Categoría
            <input type="text" name="category"> </label>

        <label for="opening_hours">Horario
            <input type="text" name="opening_hours"> </label>

        <label for="social_media">Redes sociales
            <input type="text" name="social_media"> </label>

        <label for="image">Imagen
            <input type="text" name="image"> </label> -->

        <input type="submit" name='submit' value="Registrar">
        
    </form>

</div>