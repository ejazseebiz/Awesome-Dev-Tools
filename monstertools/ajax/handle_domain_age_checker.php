<?php

// Include Composer autoloader
require_once '../../../vendor/autoload.php'; // Adjust path as necessary

use Iodev\Whois\Factory;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    if (isset($requestData['domain'])) {
        $domain = filter_var($requestData['domain'], FILTER_SANITIZE_SPECIAL_CHARS);
        $domain = preg_replace('#^https?://#', '', $domain);

        try {
            $whois = Factory::get()->createWhois();
            $info = $whois->loadDomainInfo($domain);

            if ($info) {
                $expire_date = date_create("@{$info->expirationDate}");
                $registered_date = date_create("@{$info->creationDate}");
                $domain_age = date_diff($registered_date, date_create())->y;

                $result = [
                    'expiry' => date_format($expire_date, 'Y-m-d'),
                    'created' => date_format($registered_date, 'Y-m-d'),
                    'age' => $domain_age . ' years',
                    'domain' => $info->domainName,
                    'owner' => $info->owner,
                ];

                header('Content-Type: application/json');
                echo json_encode(['domain' => $domain, 'content' => $result]);
            } else {
                echo json_encode(['error' => 'Could not retrieve domain information']);
            }
        } catch (Exception $e) {
            error_log("Exception while retrieving domain info for $domain: " . $e->getMessage());
            echo json_encode(['error' => 'Exception occurred while retrieving domain information']);
        }
    } else {
        echo json_encode(['error' => 'Domain is missing']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
