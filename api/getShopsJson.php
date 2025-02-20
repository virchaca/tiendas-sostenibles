<?php
header("Content-Type: application/json"); // Indica que es JSON

$jsonData = file_get_contents("../BD/data/shopsJson.json");
$shops = json_decode($jsonData, true); // Convertir JSON a array asociativo

$returnData = [
    'type' => 'FeatureCollection',
    'features' => []
];

if(!empty($shops)){
    foreach($shops as $shop){
        $returnData['features'][] = [
            'type' => 'Feature',
            'properties' => [
                'id' => $shop['id'],
                'name' => $shop['name'],
                'city' => $shop['city'] ?? "No disponible",
                'address' => $shop['address'] ?? "No disponible",
                'state' => $shop['state'] ?? "No disponible",
                'zip' => $shop['zip'] ?? "No disponible",
                'country' => $shop['country'] ?? "No disponible",
                'phone' => $shop['phone'] ?? "No disponible",
                'web' => $shop['web'] ?? "No disponible",
                'description' => $shop['description'] ?? "Sin descripción",
                'category' => $shop['category'] ?? "Sin categoría",
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [(float)$shop['lng'], (float)$shop['lat']]
            ]
        ];
    }
}

// Devolver la respuesta en formato JSON
echo json_encode($returnData, JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT para que sea legible
