<?php

echo 'Hola nueva tienda <br>';

session_start(); // para iniciar una sesión y luego almacenar el mensaje de éxito o error en una variable de sesión y poder mostra esa variable/mensaje en la pagina elformulario, en este caso index.php (pero la llamo en el fomrulario)

//conexion
require_once 'connection.php';

//comprobar datos que vienen por POST
if(isset($_POST)){

    //recoger datos del formulario
    $name = isset($_POST['name']) ? $_POST['name'] : false;
    $address = isset($_POST['address']) ? $_POST['address'] : false;
    $city = isset($_POST['city']) ? $_POST['city'] : false;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
    // $lat = isset($_POST['Lat']) ? $_POST['Lat'] : false;
    // $lng = isset($_POST['Lng']) ? $_POST['Lng'] : false;

    var_dump($_POST);
    echo '<br>';

    //array de errores
    $errors = array();

    //validar los datos antes de guardarlos en la base de datos, HABRÁ QUE HACER MAS VALIDACIONES DE DATOS
    // if(!empty($name)) {
    //     echo 'el nombre es correcto <br>';
    //     //$nombre_validado = true;  //no entiendo muy bien para que
    // }else{
    //     //$nombre_validado = false;
    //     $errors['name'] = 'el nombre está vacío <br>';
    // }

    // if(!empty($address)) {
    //     echo 'la direccion es correcta <br>';        
    // }else{
    //     $errors['address'] = 'la direccion está vacía <br>';
    // }

    // if(!empty($city)) {
    //     echo 'la ciudad es correcta <br>';        
    // }else{
    //     $errors['city'] = 'la ciudad está vacía <br>';
    // }

    $variables = ['name', 'address', 'city', 'phone'];
    // $variables = ['name', 'address', 'city', 'phone', 'lat', 'lng'];

    foreach ($variables as $variable) {
        if (empty($$variable)) {
            $errors[$variable] = "el campo \"$variable\" está vacío <br>";
        }
    }

    if (isset($errors['variable_empty'])) {
        echo $errors['variable_empty'];
    } else {
        echo 'Todas las validaciones pasaron correctamente <br>';
    }


     // Mostrar errores en insertedData.php, pero lo he desactivado al poner header('location:...')
    foreach ($errors as $key => $value) {
    echo "Error en $key: $value <br>";
    }

    var_dump ($errors);

    // Si no hay errores, realizar la inserción

    if(empty($errors)) {
        // preparar la consulta SQL para evitar la inyección SQL
        $sql = "INSERT INTO Shops (name, address, city, phone) VALUES ('$name', '$address', '$city', '$phone')";
        $newShop = mysqli_query($conn, $sql);
        if ($newShop) {
            $_SESSION['message'] = "Registro insertado correctamente";
            //Creo una variable session para recoger el mensaje y mostrarlo luego            
        } else {
            $_SESSION['message'] = "Error al insertar el registro: " . mysqli_error($conn);
        }
        header('location: ../../public/index.php'); // Redirigir de vuelta al formulario
        exit(); // Terminar la ejecución del script
    } else {
        $_SESSION['errors'] = $errors;        
        header('location: ../../public/index.php'); // Redirigir de vuelta al formulario
        exit(); // Terminar la ejecución del script
    }


    // Así lo tenía antes, y mostraba los errores o el exito en la pagina insertedData.php, ahora me lo muestra en el mismo index.php, ya que he iniciado sesión y creado una variable de sesion que recoge los mensajes de éxito/error
    // if(empty($errors)) {
    //     // preparar la consulta SQL para evitar la inyección SQL
    //     $sql = "INSERT INTO Clinics (name, address) VALUES ('$name', '$address')";
    //     $newClinic = mysqli_query($conn, $sql);
    //     echo "Registro insertado correctamente";
    //     // Mostrar botón para volver a index.php
    //     echo '<br><a href="index.php">Volver a index.php</a>';
    //     //header('location: ../../public/index.php'); //esto te redirige a la pagina que quieras
    //     exit(); // Terminar la ejecución del script
    // }else{
    //     echo "Error al insertar el registro: " . mysqli_error($conn);
    //     echo '<br><a href="index.php">Volver a index.php</a>';
    // }
    
}


//query comnpleta

// $sql = "INSERT INTO Clinics (name, address, status, permalink, city, state,
//         zip, country, country_iso, lat, lng, phone) VALUES ($name, $address, $status, $permalink, $city, $state,
//         $zip, $country, $country_iso, $lat, $lng, $phone);";


//Falta VALIDAR los ERRORES para que no inserte la clinica
// los PERMISOS para que pueda insertar solo cierta gente

  
//otra manera de enfocar el array de errres
    // if(count($errors) == 0) {
    //     $saveData = true;
    //     // INSERTAR CLINICA
    // }else{
    //     //ya vemos
    //     header('location: index.php'); 
    // }


   

//todas las variables de la tabla

// $name = isset($_POST['Name']) ? $_POST['Name'] : false;
// $address = isset($_POST['Address']) ? $_POST['Address'] : false;
// $status =  isset($_POST['Status']) ? $_POST['Status'] : false;
// $permalink =  isset($_POST['Permalink']) ? $_POST['Permalink'] : false;
// $city =  isset($_POST['City']) ? $_POST['City'] : false;
// $state =  isset($_POST['State']) ? $_POST['State'] : false;
// $zip =  isset($_POST['Zip']) ? $_POST['Zip'] : false;;
// $country =  isset($_POST['Country']) ? $_POST['Country'] : false;
// $country_iso =  isset($_POST['Country_iso']) ? $_POST['Country_iso'] : false;
// $lat =  isset($_POST['Lat']) ? $_POST['Lat'] : false;
// $lng =  isset($_POST['Lng']) ? $_POST['Lng'] : false;
// $phone =  isset($_POST['Phone']) ? $_POST['Phone'] : false;
  

// Name, Address, Status, Permalink, City, State, Zip, Country, Country_iso, Lat, Lng, Phone

?>