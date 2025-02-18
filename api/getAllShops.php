<?php 


require_once '../includes/connection.php'; 

header('Content-Type: application/json; charset=utf-8');
//include('connection.php'); eso es para PDO



$data = mysqli_query($conn, "SELECT * FROM shops");  
    
//estructurar los datos correctamente en formato GeoJSON, similar a  json de la API. Luego, imprimir estos datos como un JSON
$returnData = [
    'type' => 'FeatureCollection',
    'features' => []
];

if (mysqli_num_rows($data) > 0) {
    foreach ($data as $key => $eventData) {
        $returnData['features'][] = [
            'type' => 'Feature',
            'properties' => [
                'id' => $eventData['id'],
                'name' => $eventData['name'],
                'city' => $eventData['city'],
                'address' => $eventData['address'],
                'State' => $eventData['state'],
                'zip' => $eventData['zip'],
                'country' => $eventData['country'],
                'phone' => $eventData['phone'],
                'web' => $eventData['web'],
                'descripcion' => $eventData['description'],
                'categoria' => $eventData['category'],
                
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [(float)$eventData['lng'], (float)$eventData['lat']]
            ]
        ];
    }
} else {
    $returnData['features'] = [];
}

    

//////




// //validar y traer dats iterando con while
// if(mysqli_num_rows($data)>0){

//     $returnData = [];

//     foreach ($data as $key => $eventData) {
//         $returnData[] = [
//             'type' => 'Feature'.$eventData['id'],
//             'properties' => [
//                 'name' => '<strong>' . $eventData['Name'] . '</strong><p>',
//                 'city' => $eventData['City'], // Nuevo campo 'city'
//                 'icon' => '../assets/images/nesaLog'
//             ],
//             'geometry' => [
//                 'type' => 'Point',
//                 'coordinates' => [$eventData['Lat'], $eventData['Lng']]
//             ]
//         ];
//     }
// }else {
//     echo "0 resultados";
// }
    
$conn->close(); // Cierra la conexión


//bottom of file
echo json_encode($returnData);


?>