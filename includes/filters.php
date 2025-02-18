<div class="filter-div">

  <?php
  require_once 'connection.php';


  if (isset($_GET['search'])) {
    // Obtener el término de búsqueda, $_GET['search'] lo que introduce el ususario en el campo buscar
    $searchInput = $_GET['search'];

    // Preparar y ejecutar la consulta SQL
    $sql = mysqli_query($conn, "SELECT * FROM Shops WHERE name LIKE '%$searchInput%' OR address  LIKE '%$searchInput%' OR city LIKE '%$searchInput%' OR state LIKE '%$searchInput%' OR category LIKE '%$searchInput%'");
    $numShops = mysqli_num_rows($sql);

    //validar y traer dats iterando con while
    if (mysqli_num_rows($sql) > 0) {

      echo "<div class='search-results'>";
      echo "<h3>Número de tiendas encontradas:  $numShops </h3>";

      while ($shop = mysqli_fetch_assoc($sql)) {
        echo "<div class='shop-card'>
          <h2>{$shop["name"]}</h2> 
            <ul>
                <li> <strong> Dirección: </strong> {$shop["address"]}, {$shop["city"]} ({$shop["state"]})</li>
                <li> <strong> Web: </strong> <a href='{$shop["web"]}' target='_blank'> {$shop["web"]}</a></li>
                <li> <strong> Teléfono: </strong>{$shop["phone"]}</li>
                <li> <strong> Email: </strong> {$shop["email"]}</li>
                <li> <strong> Descripción: </strong> {$shop["description"]}</li>
                <li> <strong> Categoría: </strong> {$shop["category"]} </li>
            </ul><hr>
            </div>";
      }

      echo "</div>";
    } else {
      echo "<h3>No hemos encontrado ninguna tienda con tu búsqueda, vuelve a intentarlo o visita el mapa para ver todas las tiendas</h3>";
    }
  }

  $conn->close(); // Cierra la conexión
  unset($searchInput); // Limpiar los datos del input


  echo '<p><button><a href="index.php?page=form">Nueva búsqueda</a></button></p>';

?>

</div>

<?php include 'components/back-to-top.php'; ?>