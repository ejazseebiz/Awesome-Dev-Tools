<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use Iodev\Whois\Factory;
use Illuminate\Http\Request;
use App\Components\ToolsManager;
use App\Contracts\ToolInterface;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class DomainHostingChecker
{
    protected $endpoint = "http://ip-api.com/json/";

    public function handle($domain)
    {
        $validated = isset($domain);
        if ($validated) {
            $whois = Factory::get()->createWhois();
            $domain = extractHostname($domain, true);
            $hostname = extractHostname($domain);
            $info = $whois->loadDomainInfo($domain);

            $content = $this->parse($hostname);

            $results = [
                'info' => $info,
                'domain' => $domain,
                'content' => $content
            ];

            return $results;
        } else {
            return "Domain is required.";
        }
    }

    public static function getProperties()
    {
        $properties = ['Daily Usage', 'Word Count'];

        return $properties;
    }

    public function parseComments($contents, $meta_list)
    {
        $file_data = str_replace("\r", "\n", $contents);
        $all_headers = $meta_list;

        foreach ($all_headers as $field => $regex) {
            if (
                preg_match('/^[ \t\/*#@]*' . preg_quote($regex, '/') . ':(.*)$/mi', $file_data, $match)
                && $match[1]
            )
                $all_headers[$field] = trim(preg_replace("/\s*(?:\*\/|\?>).*/", '', $match[1]));
            else
                $all_headers[$field] = '';
        }

        return $all_headers;
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

    protected function validateIp($ip)
    {
        return in_array($ip, ['::1', '127.0.0.1']) ? '' : $ip;
    }
}
