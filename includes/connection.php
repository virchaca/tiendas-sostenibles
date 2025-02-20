<?php
//ARCHIVO PARA CONFIGURAR LA CONEXION A LA BASE DE DATOS


require 'vendor/autoload.php';
//conexion
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Depuración: Verificar que el archivo .env se haya cargado correctamente
// if (!file_exists(__DIR__ . '/../.env')) {
//     die('Error: El archivo .env no existe en la ruta especificada');
// }

// Verificar que la variable de entorno se haya cargado correctamente
// if (getenv('DB_PASSWORD') === false) {
//     die('Error: No se pudo cargar la variable de entorno DB_PASSWORD');
// }

$servername = "localhost"; 
$username = "root";
$password = getenv('DB_PASSWORD');  
$database = "greenshops_db";

// // Depuración: Verificar que la variable de entorno se haya cargado correctamente
// if ($password === false) {
//     die('Error: No se pudo obtener la variable de entorno DB_PASSWORD');
// } else {
//     echo 'DB_PASSWORD: ' . $password . '<br>';
// }

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database); //mysqli es la manera de hacer la conexion en php
//$conn = mysqli_connect ($servername, $username, $password, $database); -> victor lo hace así

// Verifica la conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    //$conn->connect_errno - nos dice el numero de error que es
    //$conn->connect_error nos dice el tipo:  Unknown database 'greenshops_db'
}
//echo $mysqli->host_info . "\n"; //nos da informacion


mysqli_query($conn, "SET NAMES 'utf8'"); //para que acepte ñ, tildes, ....


?>