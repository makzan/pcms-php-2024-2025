<?php

include "Parsedown.php";

function ask_ai($message, $image_url) {


    // Your custom API endpoint URL
    $apiEndpoint = 'https://openrouter.ai/api/v1/chat/completions';

    // Your API key
    $apiKey = 'YOUR_KEY_HERE';

    // Request payload
    $requestData = [
        'model' => 'google/gemini-2.5-flash-preview', // Or your custom model name
        'messages' => [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.'
            ],
            [
                'role' => 'user',
                'content' =>  [
                    [
                        "type" => "text",
                        "text" => $message
                    ],
                    [
                        "type" => "image_url",
                        "image_url" => [
                            "url" => $image_url
                        ]
                    ]
                ]
            ]
        ],
        'temperature' => 0.7,
        'max_tokens' => 15000,
    ];

    // Initialize cURL session
    $ch = curl_init($apiEndpoint);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);

    // Execute the cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Process the response
        if ($httpCode == 200) {
            $responseData = json_decode($response, true);

            // var_dump($responseData);

            // Extract the assistant's response
            if (isset($responseData['choices'][0]['message']['content'])) {
                return $responseData['choices'][0]['message']['content'];
            } else {
                return "Unexpected response format";
            }
        } else {
            return "HTTP Error: " . $httpCode . "\n";
        }
    }

    // Close cURL session
    curl_close($ch);

}

?>
<form action="" method="post">
    <label for="message">問 AI:</label>
    <input type="text" name="message" id="message">
    <button type="submit">Submit</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    // TODO: change to dynamic image URL.
    $image_url = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Gfp-wisconsin-madison-the-nature-boardwalk.jpg/2560px-Gfp-wisconsin-madison-the-nature-boardwalk.jpg";
    $data = file_get_contents($image_url);
    $base64 = 'data:image/jpeg' . ';base64,' . base64_encode($data);

    $response = ask_ai($message, $base64);
    echo "<p>AI:</p>";
    // echo "<pre>$response</pre>";

    echo "<img src='$base64' style='max-width:100%'>";

    $Parsedown = new Parsedown();
    echo $Parsedown->text($response);
}

?>