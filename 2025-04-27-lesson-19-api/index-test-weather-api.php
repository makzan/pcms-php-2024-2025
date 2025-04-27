<?php
    $url = "https://api.open-meteo.com/v1/forecast?latitude=22.2006&longitude=113.5461&hourly=temperature_2m";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    echo "<pre>";
    // var_dump($data);
    var_dump($data['hourly']['time'][8]);
    var_dump($data['hourly']['temperature_2m'][8]);

    // echo $data['hourly']['temperature_2m'][0];
?>

<h1>Test</h1>

