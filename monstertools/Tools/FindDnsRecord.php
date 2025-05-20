<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Contracts\ToolInterface;


class FindDnsRecord
{

    public function handle($request,  $tool)
    {
        // $validated = $request->validate([
        //     'domain' => 'required|fqdn',
        // ]);

        $hostname = extractHostname($request, true);
        $content = dns_get_record($hostname, DNS_A);

        $results = [
            'domain' => $request,
            'content' => $content[0] ?? null
        ];

        return $results;
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
}
