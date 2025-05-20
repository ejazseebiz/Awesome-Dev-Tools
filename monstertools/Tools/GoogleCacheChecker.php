<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Components\ToolsManager;
use App\Contracts\ToolInterface;

use App\MonsTools\helper\MultipleDomainsValidator;
use App\MonsTools\helper\MultipleMaxlinesValidator;

class GoogleCacheChecker
{
    public function handle($request,  $tool)
    {
        // $validated = $request->validate(['domain' => ['required', new MultipleDomainsValidator, new MultipleMaxlinesValidator($tool->no_domain_tool ?? 1)]]);
        $results = ['domain' => $request, 'domainAddresses' => fqdnList($request)];
        return $results;
    }

    public function postAction($request, $tool)
    {
        $domain = $request->input('domain');
        $url = "https://webcache.googleusercontent.com/search?q=cache:" . $domain;
        $output = file_get_contents($url);

        if (preg_match('/snapshot of the page as it appeared on ([a-z0-9 :]+) GMT/i', $output, $mdc)) {
            $content['dt_cache'] = __('tools.cacheDatetimeStr', ['datetime' => $mdc[1]]);
        }

        $content['datetime'] = $mdc[1] ?? false;
        $results = ['content' => $content ?? false, 'url' => $url];

        return $results;
    }
}
