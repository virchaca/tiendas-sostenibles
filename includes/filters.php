<div class="filter-div">

  <?php
  // BUSCAREMOS LOS DATOS EN EL JSON SIMULANDO QUE VIENEN DE BASE DE DATOS. 
  // MÁS ABAJO ESTÁ EL CÓDIGO DE COMO FILTRAR DIRECTAMENTE DE LA BASE DE DATOS


  // HACER BÚSQQUEDA EN JSON
  
  $jsonData = file_get_contents('./BD/data/shopsJson.json');
  $shops = json_decode($jsonData, true);

  // Verificar si se ha enviado un término de búsqueda

    if(isset($_GET['search']) && !empty($_GET['search'])){
      $searchInput = strtolower($_GET['search']);

      //filtrar
      $filteredShops = array_filter($shops, function($shop) use($searchInput){
        return  stripos($shop['name'], $searchInput) !== false || 
                stripos($shop['address'], $searchInput) !== false || 
                stripos($shop['city'], $searchInput) !== false || 
                stripos($shop['state'], $searchInput) !== false || 
                stripos($shop['category'], $searchInput) !== false || 
                stripos($shop['description'], $searchInput) !== false;        
        });

      $numShops = count($filteredShops);
      
      if($numShops > 0){
        echo "<div class='search-results'>";
        echo "<h3>Número de tiendas encontradas:  $numShops </h3>";

        foreach($filteredShops as $shop){
          echo "<div class='shop-card'>
          <h2>{$shop["name"]}</h2> 
          <ul>
              <li><strong>Dirección:</strong> {$shop["address"]}, {$shop["city"]} ({$shop["state"]})</li>
              <li><strong>Web:</strong> <a href='{$shop["web"]}' target='_blank'> {$shop["web"]}</a></li>
              <li><strong>Teléfono:</strong> {$shop["phone"]}</li>
              <li><strong>Email:</strong> {$shop["email"]}</li>
              <li><strong>Descripción:</strong> {$shop["description"]}</li>
              <li><strong>Categoría:</strong> {$shop["category"]} </li>
          </ul><hr>
        </div>";
        }

        echo "</div>";
      }else{
        echo "<h3>No hemos encontrado ninguna tienda con tu búsqueda, vuelve a intentarlo o visita el mapa para ver todas las tiendas</h3>";
      }
    }
    
    echo '<p><button><a href="index.php?page=form">Nueva búsqueda</a></button></p>';
    
  

  // *****************HACER BÚSQUEDA EN BASE DE DATOS *******************
    
  // require_once 'connection.php';

  // if (isset($_GET['search'])) {
  //   // Meto en una variable el término de búsqueda, $_GET['search'] que escribe el ususario al buscar
  //   $searchInput = $_GET['search'];

  //   $sql = mysqli_query($conn, "SELECT * FROM Shops WHERE 
  //        name LIKE '%$searchInput%' OR 
  //        address  LIKE  '%$searchInput%' OR 
  //        city LIKE '%$searchInput%' OR 
  //        state LIKE '%$searchInput%' OR 
  //        category LIKE '%$searchInput%' OR 
  //        description LIKE '%$searchInput%'");

  //   $numShops = mysqli_num_rows($sql);

  //   if ($numShops > 0) {

  //     echo "<div class='search-results'>";
  //     echo "<h3>Número de tiendas encontradas:  $numShops </h3>";

  //     while ($shop = mysqli_fetch_assoc($sql)) {
  //       echo "<div class='shop-card'>
  //         <h2>{$shop["name"]}</h2> 
  //           <ul>
  //               <li> <strong> Dirección: </strong> {$shop["address"]}, 
  //                    {$shop["city"]} ({$shop["state"]})</li>
  //               <li> <strong> Web: </strong> <a href='{$shop["web"]}' target='_blank'> 
  //                    {$shop["web"]}</a></li>
  //               <li> <strong> Teléfono: </strong>{$shop["phone"]}</li>
  //               <li> <strong> Email: </strong> {$shop["email"]}</li>
  //               <li> <strong> Descripción: </strong> {$shop["description"]}</li>
  //               <li> <strong> Categoría: </strong> {$shop["category"]} </li>
  //           </ul><hr>
  //           </div>";
  //     }

  //     echo "</div>";
  //   } else {
  //     echo "<h3>No hemos encontrado ninguna tienda con tu búsqueda, vuelve a intentarlo o visita el mapa para ver todas las tiendas</h3>";
  //   }
  // }

  // $conn->close(); // Cierra la conexión
  // unset($searchInput); // Limpiar los datos del input

  // echo '<p><button><a href="index.php?page=form">Nueva búsqueda</a></button></p>';

  ?>

</div>

<?php include 'components/back-to-top.php'; ?>