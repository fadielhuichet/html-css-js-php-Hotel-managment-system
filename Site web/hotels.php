<?php

$curl = curl_init();

$apiKey = "VOTRE_API_KEY"; // Remplacez par votre clé API RapidAPI

curl_setopt_array($curl, [
    CURLOPT_URL => "https://booking-com15.p.rapidapi.com/api/v1/hotels/searchHotelsByCoordinates?latitude=19.24232736426361&longitude=72.85841985686734&adults=1&children_age=0%2C17&room_qty=1&units=metric&page_number=1&temperature_unit=c&languagecode=en-us&currency_code=EUR&location=US",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: booking-com15.p.rapidapi.com",
        "x-rapidapi-key: $apiKey",
        "Accept: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// Enable CORS by adding this header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($err) {
    echo json_encode(["error" => "cURL Error: " . $err], JSON_PRETTY_PRINT);
} else {
    echo json_encode(json_decode($response), JSON_PRETTY_PRINT);
}
?>
