<?php

namespace App\MonsTools\Tools;

use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;


class CheckGzipCompression
{

    public function handle($domain)
    {

        $content = [];

        $client = new Client([
            // 'curl' => guzzleMozCurlOptions(),
            'timeout'  => 30,
            'headers'  => [
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
            ],
            'verify' => true,
            RequestOptions::ALLOW_REDIRECTS => [
                'max'             => 10,        // allow at most 10 redirects.
                'strict'          => true,      // use "strict" RFC compliant redirects.
                'referer'         => true,      // add a Referer header
                'protocols'       => ['http', 'https'],
                'track_redirects' => true,
            ],
        ]);

        try {

            $response = $client->request('GET', $domain, [
                'on_stats' => function (TransferStats $stats) use (&$content) {
                    $content['pagesize_compressed'] = $stats->getHandlerStat('size_download');
                },
                'on_headers' => function (ResponseInterface $response) use (&$content) {
                    // dd($response->getHeader('x-encoded-content-encoding'),$response->getHeader('content-encoding'),$response->getHeaders());
                    $content['encoding'] = $response->getHeader('x-encoded-content-encoding');
                },
            ]);

            $content['status_code'] = $response->getStatusCode();
            $content['protocol'] = $response->getProtocolVersion();
            $content['headers'] = $response->getHeaders();
            $content['pagesize_uncompressed'] = mb_strlen($response->getBody(), '8bit');
            $content['saving'] = $content['pagesize_uncompressed'] - $content['pagesize_compressed'];
            $content['compression'] = round(($content['saving'] / $content['pagesize_uncompressed']) * 100, 2);


            return  $content;
        } catch (RequestException $e) {
            // Handle request exception
            // Log the error or throw a custom exception
            throw new \Exception("Request failed: " . $e->getMessage());
        }
    }
}
