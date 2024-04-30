

    <style>   

      h3 {
        margin: auto;
        text-align: center;
      }
      img {
        margin: 0;        
      }
      .div{
        width: fit-content;
        margin: auto;
        text-align: center;

      }
    </style>

    <h3 style="margin:auto">Aquí tienes los resultados de tu búsqueda:</h3>
    <br>
<div class="div">

<img style="margin:auto" src="assets/images/buscar.jpeg" alt="buscar">
    <br>

<?php

require_once 'includes/connection.php';

//$_GET['search'] lo que introduce el ususario en el campo buscar

if(isset($_GET['search'])) {
    // Obtener el término de búsqueda y aplicar comodines
    $searchInput = $_GET['search'];
    // echo 'hola';
    
    // Preparar y ejecutar la consulta SQL
    $sql = mysqli_query($conn, "SELECT * FROM Clinics WHERE name LIKE '%$searchInput%' OR address  LIKE '%$searchInput%'");
    $numClinics= mysqli_num_rows($sql);

    //validar y traer dats iterando con while
    if(mysqli_num_rows($sql)>0){

      echo "Número de clínicas encontradas: ".$numClinics;
      echo '<br><a href="index.php">Volver a index.php</a>';
      
      // echo 'otro hola';
        while($clinic = mysqli_fetch_assoc($sql)) {
          echo '<h4>' ."Clinica: " . $clinic["Name"] .'</h4>'. "<br>"
          ." - ID: " . $clinic["Id_clinic"]. "<br>"
          ." - Direccion: " . $clinic["Address"]. "<br>"
          ." - Estatus: " . $clinic["Status"]. "<br>"
          . " - Link: " . $clinic["Permalink"]. "<br>"
          . " - Ciudad: " . $clinic["City"]. "<br>"
          . " - Provincia: " . $clinic["State"]. "<br>"
          . " - Codigo: " . $clinic["Zip"]. "<br>"
          . " - Pais: " . $clinic["Country"]. "<br>"
          . " - Acronimo: " . $clinics["Country_iso"]. "<br>"
          . " - Latitud de coordenada: " . $clinic["Lat"]. "<br>"
          . " - Longitud de coordenada: " . $clinic["Lng"]. "<br>"
          . " - Telefono: " . $clinic["Phone"]. "<br>"
          ."<hr>";
        }
      }else {
      echo "0 resultados";
    }
 
}

$conn->close(); // Cierra la conexión
unset($searchInput); // Limpiar los datos del input
echo '<br><a href="index.php">Volver a index.php</a>';

?>




</div>
    
    


