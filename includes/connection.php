<?php

//conexion

$servername = "localhost"; //nos conectamos mediante el puerto 3307, con MariaDB=mysql, root sin pasword
$username = "root";
$password = ""; //no tiene password porque se esta conectando DESDE XAMPP
$database = "clinicsFake_db";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database); //mysqli es la manera de hacer la conexion en php
//$conn = mysqli_connect ($servername, $username, $password, $database); -> victor lo hace así

// Verifica la conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    //$conn->connect_errno - nos dice el numero de error que es
    //$conn->connect_error nos dice el tipo:  Unknown database 'clinicsFake_d'
}
//echo $mysqli->host_info . "\n"; //nos da informacion


mysqli_query($conn, "SET NAMES 'utf-8'"); //para que acepte ñ, tildes, ....


?>