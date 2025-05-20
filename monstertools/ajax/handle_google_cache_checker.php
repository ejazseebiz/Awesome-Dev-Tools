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
            // print_r($info);
            if ($info) {
                // $domain = $request->input('domain');
                $url = "https://webcache.googleusercontent.com/search?q=cache:" . $domain;
                $output = file_get_contents($url);

                if (preg_match('/snapshot of the page as it appeared on ([a-z0-9 :]+) GMT/i', $output, $mdc)) {
                    // $content['dt_cache'] = __('cacheDatetimeStr', ['datetime' => $mdc[1]]);
                    $content['dt_cache'] = 'Cache date: ' . $mdc[1];
                }

                $content['datetime'] = $mdc[1] ?? false;
                $results = ['content' => $content ?? false, 'url' => $url];

                header('Content-Type: application/json');
                echo json_encode(['domain' => $domain, 'content' => $results]);
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
