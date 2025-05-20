<?php

namespace App\MonsTools\Tools;

use App\MonsTools\helper\MultipleDomainsValidator;
use App\MonsTools\helper\MultipleMaxlinesValidator;

// require_once plugin_dir_path(__DIR__) . '/helper/classes.php';
// MultipleDomainsValidator

class DomainAgeChecker
{
    public function handle($domain)
    {
        $errors = [];

        // Step 1: Check if the domain is present (required)
        if (empty($domain)) {
            $errors[] = 'Domain is required';
        }

        // Step 2: Validate using MultipleDomainsValidator
        // $domainValidator = new MultipleDomainsValidator();
        // if (!empty($domain) && !$domainValidator->passes('domain', $domain)) {
        //     $errors[] = $domainValidator->message();
        // }

        // Step 3: Validate using MultipleMaxlinesValidator
        // $maxlinesValidator = new MultipleMaxlinesValidator(10);
        // if (!empty($domain) && !$maxlinesValidator->passes('domain', $domain)) {
        //     $errors[] = $maxlinesValidator->message();
        // }

        // Handle validation errors
        if (!empty($errors)) {
            // Here you can either throw an exception, return an error response, or handle it as per your requirement
            // For example, you could return an error response like this:
            echo json_encode(['errors' => $errors]);
            exit;
        }


        // $validated = $request->validate(['domain' => ['required', new MultipleDomainsValidator, new MultipleMaxlinesValidator($tool->no_domain_tool)]]);
        $results = ['domain' => $domain, 'domainAddresses' => fqdnList($domain)];


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
