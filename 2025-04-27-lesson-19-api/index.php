<?php

function ask_ai($message) {


    // Your custom API endpoint URL
    $apiEndpoint = 'https://openrouter.ai/api/v1/chat/completions';

    // Your API key
    $apiKey = 'YOUR_API_KEY_HERE';

    // Request payload
    $requestData = [
        'model' => 'openai/gpt-4o-mini', // Or your custom model name
        'messages' => [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.'
            ],
            [
                'role' => 'user',
                'content' =>  $message
            ]
        ],
        'temperature' => 0.7,
        'max_tokens' => 150
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $response = ask_ai($message);
    echo "<p>AI: $response</p>";
}

?>
<form action="" method="post">
    <label for="message">問 AI:</label>
    <input type="text" name="message" id="message">
    <button type="submit">Submit</button>
</form>