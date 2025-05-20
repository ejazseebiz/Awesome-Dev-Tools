<?php

use App\MonsTools\Tools\BlacklistCheck;
// require_once '../../Tools/BlacklistCheck.php';



// Check if POST data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON data from the request body
    $requestData = json_decode(file_get_contents('php://input'), true);

    // Check if domain and search IP are provided
    if (isset($requestData['domain']) && isset($requestData['search_ip'])) {
        // Create an instance of BlacklistCheck class
        // $blacklistCheck = new BlacklistCheck();

        // Execute postAction function with domain and search IP
        $domain = $requestData['domain'];
        $ip = $requestData['search_ip'];
        // $result = $blacklistCheck->postAction($domain, $searchIp);

        $listed = [];
        if ($ip) {
            // Reverse the IP address
            $reverse_ip = implode(".", array_reverse(explode(".", $ip)));

            // Check DNS records for the domain and IP combination
            if (checkdnsrr($reverse_ip . "." . $domain . ".", "A")) {
                $listed['status'] = '<span class="text-danger">Listed</span>';
                $listed['host'] = $domain;
            } else {
                $listed['status'] = '<span class="text-success">Not Listed</span>';
                $listed['host'] = $domain;
            }
        }
        // Return the result as JSON response
        header('Content-Type: application/json');
        echo json_encode($listed);
    } else {
        // Return error if domain or search IP is missing
        echo json_encode(['error' => 'Domain or search IP is missing']);
    }
} else {
    // Return error if the request method is not POST
    echo json_encode(['error' => 'Invalid request method']);
}
