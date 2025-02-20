<?php 

//creamos estructura GEOJSON: convertir BD a la estructura necesaria formando la API

//include('connection.php'); lo necesitaríamos para PDO

require_once '../includes/connection.php'; 
header('Content-Type: application/json; charset=utf-8');

$data = mysqli_query($conn, "SELECT * FROM shops");  
    
//estructurar los datos correctamente en formato GeoJSON, luego, imprimir estos datos como un JSON

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
    
$conn->close(); 

//devolver respuesta en formato JSON
echo json_encode($returnData);

?>