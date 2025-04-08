<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        <?php include "../style.css" ?>
    </style>
    <title>Search Results</title>
</head>
<body>
    <?php include "../section/header.php"?>
    <div class="container">
        <div class="search-results">
            <h1>Available Hotels</h1>
            <div id="hotel-results" class="mostItems">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $destination = urldecode($_GET['destination'] ?? '');
                    $check_in = $_GET['check_in'] ?? '';
                    $check_out = $_GET['check_out'] ?? '';
                    $adults = $_GET['adults'] ?? '1';
                    $kids = $_GET['kids'] ?? '0';

                    // Load hotels.json
                    $json = file_get_contents('../data/hotels.json');
                    if ($json === false) {
                        echo "<p>Sorry, we couldn't load the hotel data at this time. Please try again later.</p>";
                        exit;
                    }

                    $data = json_decode($json, true);
                    if ($data === null) {
                        echo "<p>Sorry, there was an error processing the hotel data. Please try again later.</p>";
                        exit;
                    }

                    if (!isset($data['destinations'])) {
                        echo "<p>Sorry, no destinations are available at this time.</p>";
                        exit;
                    }

                    $destinations = $data['destinations'];

                    // Find matching destination
                    $selectedDestination = array_filter($destinations, function($dest) use ($destination) {
                        $destName = strtolower(trim($dest['name']));
                        $searchDest = strtolower(trim($destination));
                        return $destName === $searchDest;
                    });

                    if (empty($selectedDestination)) {
                        echo "<p>No hotels found for '$destination'. Please try a different destination.</p>";
                    } else {
                        $selectedDestination = array_values($selectedDestination)[0];
                        $hotels = $selectedDestination['hotels'];

                        if (empty($hotels)) {
                            echo "<p>No hotels are currently available in '$destination'.</p>";
                        } else {
                            foreach ($hotels as $hotel) {
                                echo "
                                    <div class='mostItem'>
                                        <img src='{$hotel['image']}' alt='{$hotel['name']}'/>
                                        <div class='hotel-info'>
                                            <h2>{$hotel['name']}</h2>
                                            <p>{$hotel['address']}</p>
                                            <div class='hotel-meta'>
                                                <span>Rating: {$hotel['rating']}</span>
                                                <span>Price: {$hotel['price']}</span>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    }
                } else {
                    echo "<p>Invalid request. Please use the search form to find hotels.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>