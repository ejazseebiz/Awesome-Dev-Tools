<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Components\ToolsManager;
use App\Contracts\ToolInterface;
use GuzzleHttp\Client;

class DomainToIp
{

    protected $endpoint = "http://ip-api.com/json/";

    public function handle($request)
    {
        // $validated = $request->validate([
        //     'domain' => 'required|fqdn',
        // // ]);
        // echo "<h1>TEst</h1>";
        $validated = isset($request);
        if ($validated) {

            $url = extractHostname($request);
            // $driver = new IpApiDriver();
            // $content = $driver->parse($url);
            $content = $this->parse($url);
            $results = [
                'domain' => $request,
                'content' => $content
            ];
            // print_r($results);
            return $results;
        } else {
            return "Domain is required.";
        }
    }

    public static function getFileds()
    {
        $array = [
            'title' => "Drivers",
            'fields' => [
                [
                    'id' => "driver",
                    'field' => "tool-options-select",
                    'placeholder' => "Driver",
                    'label' => "Driver",
                    'required' => true,
                    'options' => [['text' => "Default", 'value' => "WhoisDomainChecker"]],
                    'validation' => "required",
                    'type' => 'dropdown',
                    'classes' => "",
                    'dependant' => null,
                ],
            ],
            "default" => ['driver' => 'WhoisDomainChecker']
        ];

        return $array;
    }



    protected function parse($ip)
    {

        $endpoint = $this->endpoint . $ip;

        $response = (new Client())->request('GET', $endpoint, ['query' => []]);
        $body = json_decode($response->getBody(), true);

        return $this->results($body);
    }

    protected function results(array $body): array|bool
    {
        return $body['status'] == 'fail' ? false : [
            'country' => $body['country'],
            'country_code' => $body['countryCode'],
            'city' => $body['city'],
            'region' => $body['regionName'],
            'region_code' => $body['region'],
            'zip' => $body['zip'],
            'lat' => $body['lat'],
            'lon' => $body['lon'],
            'timezone' => $body['timezone'],
            'isp' => $body['org'],
            'ip' => $body['query'],
        ];
    }
}
