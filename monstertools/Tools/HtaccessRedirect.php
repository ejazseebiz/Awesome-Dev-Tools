<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Contracts\ToolInterface;


class HtaccessRedirect
{
    public function handle($domain,  $type)
    {
        // $validated = $request->validate([
        //     'domain' => 'required|fqdn',
        //     'type' => 'required',
        // ]);
        $content = "";
        $type = $type;
        $domain = $domain;
        $hostname = extractHostname($domain);

        if ($type == 1) {
            $content = "RewriteEngine On
RewriteCond %{HTTP_HOST} ^{$hostname} [NC]
RewriteRule ^(.*)$ http://www.{$hostname}/$1 [L,R=301]";
        } else {
            $content = "RewriteEngine On
RewriteCond %{HTTP_HOST} ^www.{$hostname} [NC]
RewriteRule ^(.*)$ http://{$hostname}/$1 [L,R=301]";
        }

        $results = [
            'domain' => $domain,
            'hostname' => $hostname,
            'content' => $content,
        ];

        return $results;
    }

    public static function getProperties()
    {
        $properties = ['Daily Usage'];

        return $properties;
    }
}
