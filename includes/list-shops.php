<link rel="stylesheet" href="../assets/css/style.css">

<?php
require 'includes/connection.php';

//echo '<br>--> Traer la info de la BD con var_dump, traigo la info del array que me genera:<br><br>';       

//consulta desde php con vardump, no traigo datos, solo info del array que me genera
//la conexion la tengo en connection.php y me la traigo con $conn

$query = mysqli_query($conn, "SELECT * FROM shops");
//var_dump ($query);

echo "<section class='list-section'>";
echo '<h2>Listado de tiendas:</h2>';
echo "<div class='list-container'>"; //contenedor tiendas



// foreach($query as $key => $shop) {
//     echo '<p>' .$key+1 ."-" . $shop["name"] . ":". $shop["address"]. "," . $shop["city"] .  "</p>";
// }

//validar y traer dats iterando con while   

if (mysqli_num_rows($query) > 0) {

    while ($shop = mysqli_fetch_assoc($query)) {
        echo "<div class='list-shop-card'>";
        echo '<h3>' . $shop["name"] . " (" . $shop["id"] . ")" .  '</h3>';
        echo "<ul>
                <li> <strong> Dirección: </strong>" . $shop["address"] . "</li>
                <li> <strong> Ciudad: </strong>" . $shop["city"] . " (" . $shop["state"] . ")</li>
                <li> <strong> Web: </strong> <a href='" . $shop["web"] . "' target='_blank'>" . $shop["web"] . "</a></li>
                <li> <strong> Teléfono: </strong>" . $shop["phone"] . "</li>
                <li> <strong> Email: </strong>" . $shop["email"] . "</li>
                <li> <strong> Descripción: </strong>" . $shop["description"] . "</li>
                <li> <strong> Categoría: </strong>" . $shop["category"] . "</li>
                <li> <strong> Redes Sociales: </strong>" . $shop["social_media"] . "</li>
                <li> <strong> Horario: </strong>" . $shop["opening_hours"] . "</li>"
            . "
        </ul>";
        echo "</div>"; // Fin tarjeta de tienda
    }
} else {
    echo "<p>No hay resultados</p>";
}

//Es mas recomendable usar un WHILe con mysqli_fetch_assoc() que un foreach. Foreach solo funciona si $query ya es un array. Sin embargo, mysqli_query() devuelve un objeto mysqli_result, que necesita ser convertido a un array antes de usar foreach.
//Por otro lado, while (mysqli_fetch_assoc($query)) es la forma estándar de recorrer un mysqli_result en PHP.

echo "</div>"; // Fin del contenedor de tiendas

echo "</section>";



$conn->close(); // Cierra la conexión

@include 'components/back-to-top.php';
?>

