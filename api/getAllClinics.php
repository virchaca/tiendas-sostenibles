<?php 


require_once '../includes/connection.php'; 

header('Content-Type: application/json; charset=utf-8');
//include('connection.php'); eso es para PDO



$data = mysqli_query($conn, "SELECT * FROM Clinics");  
    
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
                'id' => $eventData['Id_clinic'],
                'name' => $eventData['Name'],
                'city' => $eventData['City'],
                'address' => $eventData['Address'],
                'State' => $eventData['State'],
                'zip' => $eventData['Zip'],
                'country' => $eventData['Country'],
                'phone' => $eventData['Phone'],
                'link' => $eventData['Permalink'],
                'acronimus' => $eventData['Country_iso'],
                'Status' => $eventData['Status'],
                
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [(float)$eventData['Lng'], (float)$eventData['Lat']]
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