<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Contracts\ToolInterface;
use Psr\Http\Message\ResponseInterface;

class GetHttpHeaders
{


    public function handle($request,  $tool)
    {
        // $validated = $request->validate([
        //     'domain' => 'required|fqdn',
        // ]);

        $domain = $request;
        $content = [];

        $client = new Client();
        $response = $client->request('GET', $domain, [
            'on_headers' => function (ResponseInterface $response) {
                $servers = array_filter($response->getHeader('server'), function ($value) {
                    return !in_array($value, ['amazon', 'cloudflare', 'gws', 'Server', 'Apple', 'tsa_o', 'ATS']);
                });
                $content['hsts'] = count($response->getHeader('Strict-Transport-Security')) !== 0;
                $content['servers'] = $servers;
                $content['encoding'] = $response->getHeader('x-encoded-content-encoding');
            },
        ]);
        $content = $response->getHeaders() ?? null;

        $results = [
            'domain' => $request,
            'content' => $content
        ];

        return $results;
    }
}
