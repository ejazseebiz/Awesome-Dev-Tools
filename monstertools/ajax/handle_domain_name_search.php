<?php

require_once '../../../vendor/autoload.php'; // Adjust path as necessary

use Iodev\Whois\Factory as Whois;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $domain = $input['domain'] ?? null;

    $response = [
        'status' => 'Error',
        'message' => 'Invalid domain'
    ];

    if ($domain) {
        try {
            $whois = Whois::get()->createWhois();

            // Remove debugging print statements
            // error_log("Checking domain: $domain");

            $isAvailable = $whois->isDomainAvailable($domain);

            // Remove debugging print statements
            // error_log("Domain $domain is " . ($isAvailable ? 'Available' : 'Registered'));

            $response = [
                'status' => $isAvailable ? 'Available' : 'Registered'
            ];
        } catch (Exception $e) {
            // Log the error message
            error_log($e->getMessage());

            // Return an error response
            $response = [
                'status' => 'Error',
                'message' => 'Whois lookup failed: ' . $e->getMessage()
            ];
        }
    }

    // Set Content-Type header and echo JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
