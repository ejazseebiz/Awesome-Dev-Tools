<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  // function old($key = null, $default = null){
  //   return $instance->old($key, $default);
  // }


function old($key = null, $default = null){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $oldData = $_POST;
    } else {
        $oldData = $_GET;
    }
    if ($key === null) {
        return $oldData;
    }

    return isset($oldData[$key]) ? $oldData[$key] : $default;
}


function trans($key, $parameters = [], $locale = null)
{
    // This is a simplified example of a translation function
    // In a real-world scenario, you'd load translations from files or a database

    // Translations array (replace with your actual translations)
    $translations = [
        'hello' => [
            'en' => 'Hello',
            'fr' => 'Bonjour',
            // Add more translations as needed
        ],
        // Add more keys and translations as needed
    ];

    // Determine the current locale (or use the provided one)
    $currentLocale = $locale ?: 'en';

    // Check if the translation key exists
    if (isset($translations[$key][$currentLocale])) {
        $translation = $translations[$key][$currentLocale];

        // Replace placeholders in the translation
        foreach ($parameters as $paramKey => $paramValue) {
            $translation = str_replace(":$paramKey", $paramValue, $translation);
        }

        return $translation;
    }

    // If the translation key doesn't exist, return the key itself
    return $key;
}


?>