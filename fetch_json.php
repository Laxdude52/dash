<?php
// URL of the JSON file
$jsonUrl = "https://m.lkeportal.com/publicsolarbatch/ESS.json";
$jsonUrl2 = "https://m.lkeportal.com/publicsolarbatch/OF_now.json";


// Fetch the JSON content from the URL
$jsonContent = file_get_contents($jsonUrl);
$jsonContent2 = file_get_contents($jsonUrl2);

// Check if the content was fetched successfully
if ($jsonContent === FALSE || $jsonContent2 === FALSE) {
    // Handle error
    http_response_code(500);
    echo json_encode(["error" => "Failed to fetch JSON data"]);
    exit;
}

$data = array(json_decode($jsonContent), json_decode($jsonContent2));
$data = json_encode($data, JSON_PRETTY_PRINT);

// Send the JSON content to the client
echo $data
?>