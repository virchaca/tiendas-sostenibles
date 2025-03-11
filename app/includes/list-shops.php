<?php

// COGEMOS LOS DATOS DE UN JSON SIMULANDO QUE VIENEN DE BASE DE DATOS. 
// MÁS ABAJO EL CÓDIGO PARA TRAER DATOS DE BASE DE DATOS CON MYSQLI

$jsonData = file_get_contents(__DIR__ . '/../BD/data/shopsJson.json');
;
$shops = json_decode($jsonData, true); // Convertir JSON a array asociativo

echo "<section class='list-section'>";
// echo '<h2>Listado de tiendas:</h2>';
echo "<div class='list-container'>"; //contenedor tiendas
// var_dump($shops);
if (!empty($shops)) {
    foreach ($shops as $shop) {
        echo "<div class='list-shop-card'>"; //tarjeta de tienda
        echo '<h3>' . htmlspecialchars($shop["name"]) . "</h3>";
        echo
        "<ul>
                    <li> <strong> Dirección: </strong>" . htmlspecialchars($shop["address"] ?? "No disponible") . "</li>
                    <li> <strong> Ciudad: </strong>" . htmlspecialchars($shop["city"] ?? "No disponible") . " (" . htmlspecialchars($shop["state"] ?? "No disponible") . ")</li>
                    <li> <strong> Web: </strong> <a href='" . htmlspecialchars($shop["web"] ?? "No disponible") . "' target='_blank'>" . htmlspecialchars($shop["web"] ?? "No disponible") . "</a></li>
                    <li> <strong> Teléfono: </strong>" . htmlspecialchars($shop["phone"] ?? "No disponible") . "</li>
                    <li> <strong> Email: </strong>" . htmlspecialchars($shop["email"] ?? "No disponible") . "</li>
                    <li> <strong> Descripción: </strong>" . htmlspecialchars($shop["description"] ?? "No disponible") . "</li>
                    <li> <strong> Categoría: </strong>" . htmlspecialchars($shop["category"] ?? "No disponible") . "</li>
                    <li> <strong> Redes Sociales: </strong>" . htmlspecialchars($shop["social_media"] ?? "No disponible") . "</li>
                    <li> <strong> Horario: </strong>" . htmlspecialchars($shop["opening_hours"] ?? "No disponible") . "</li>                
                </ul>";

        echo "</div>"; // Fin tarjeta de tienda
    }
} else {
    echo "<p>No hay tiendas disponibles.</p>";
}

echo "</div>"; 
echo "</section>";
// usamos  htmlspecialchars para escapar los datos antes de mostrarlos en HTML, ayuda a prevenir ataques de Cross-Site Scripting (XSS).




// ****** RECOGIENDO DATOS DE BASE DE DATOS SERÍA ASÍ:

// require 'includes/connection.php';
// $query = mysqli_query($conn, "SELECT * FROM shops");
// //var_dump ($query);

// if (mysqli_num_rows($query) > 0) {

//     while ($shop = mysqli_fetch_assoc($query)) {
//         echo "<div class='list-shop-card'>";
//         echo '<h3>' . $shop["name"] . " (" . $shop["id"] . ")" .  '</h3>';
//         echo "<ul>
//                 <li> <strong> Dirección: </strong>" . $shop["address"] . "</li>
//                 <li> <strong> Ciudad: </strong>" . $shop["city"] . " (" . $shop["state"] . ")</li>
//                 <li> <strong> Web: </strong> <a href='" . $shop["web"] . "' target='_blank'>" . $shop["web"] . "</a></li>
//                 <li> <strong> Teléfono: </strong>" . $shop["phone"] . "</li>
//                 <li> <strong> Email: </strong>" . $shop["email"] . "</li>
//                 <li> <strong> Descripción: </strong>" . $shop["description"] . "</li>
//                 <li> <strong> Categoría: </strong>" . $shop["category"] . "</li>
//                 <li> <strong> Redes Sociales: </strong>" . $shop["social_media"] . "</li>
//                 <li> <strong> Horario: </strong>" . $shop["opening_hours"] . "</li>"
//             . "
//         </ul>";
//         echo "</div>"; // Fin tarjeta de tienda
//     }
// } else {
//     echo "<p>No hay resultados</p>";
// }

// // WHILe con mysqli_fetch_assoc() es la fomra más correcta de recorrer un resultado misql_result en PHP, ya que mysqli_query() devuelve un objeto mysqli_result, que necesita ser convertido a un array antes de usar foreach. Por esto es más recomendable usar un WHILE con mysqli_fetch_assoc(). Foreach solo funciona si $query es un array. 


// echo "</div>"; // Fin del contenedor de tiendas
// echo "</section>";

//$conn->close(); // Cierra la conexión

include 'components/back-to-top.php'; 
?>

