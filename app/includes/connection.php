<?php
//ARCHIVO PARA CONFIGURAR LA CONEXION A LA BASE DE DATOS
//cargo el autoload de vendor para usar .env
require __DIR__ . '/../../vendor/autoload.php';

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// Depuración: Verificar que el archivo .env se haya cargado correctamente
$dotenvPath = __DIR__ . '/../../.env';
if (!file_exists($dotenvPath)) {
    die('Error: El archivo .env no existe en la ruta especificada: ' . $dotenvPath);
}
    
$servername = "localhost"; 
$username = "root";
$password = $_ENV['DB_PASSWORD'] ?? null;
$database = "greenshops_db";
  
    
// Depuraciones
// echo 'Contenido de $_ENV: ' . print_r($_ENV, true) . '<br>';
// echo 'Contenido de $_SERVER: ' . print_r($_SERVER, true) . '<br>';

// echo 'Ruta del archivo .env: ' . $dotenvPath . '<br>';
// echo 'Contenido de DB_PASSWORD: ' . $password . '<br>';

//Me aseguro que si el password falla me lo avise
if ($password === false) {
    die('Error: No se pudo obtener la variable de entorno DB_PASSWORD');
} 


// Creo la conexión
$conn = new mysqli($servername, $username, $passwordd, $database); //mysqli es la manera de hacer la conexion en php
//$conn = mysqli_connect ($servername, $username, $password, $database); -> otra forma

// Verifica la conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    //$conn->connect_errno - nos dice el numero de error que es
    //$conn->connect_error nos dice el tipo:  Unknown database 'greenshops_db'
}
//echo $mysqli->host_info . "\n"; //nos da informacion

// Establecer el conjunto de caracteres a UTF-8
mysqli_query($conn, "SET NAMES 'utf8'"); //para que acepte ñ, tildes, ....

?>