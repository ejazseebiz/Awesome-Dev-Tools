<?php

namespace App\MonsTools\Tools;


use Illuminate\Support\Str;
use Iodev\Whois\Factory as Whois;

class DomainNameSearch
{
    protected $whois;

    public function __construct()
    {
        try {
            $this->whois = Whois::get()->createWhois();
            // print_r("Whois initialized successfully");
        } catch (Exception $e) {
            error_log("Whois initialization failed: " . $e->getMessage());
            throw $e;
        }
    }

    public function handle($domain, $type)
    {
        $available_tlds = [".com", ".net", ".org", ".co.in", ".me", ".us", ".co", ".info"];
        $results = [
            'domainAddresses' => [
                'search' => [],
                'suggestions' => [],
            ],
            'has_suggestions' => false,
            'domain' => $domain,
            'type' => $type,
        ];

        // Check the main domain with different TLDs
        foreach ($available_tlds as $tld) {
            $fullDomain = "{$domain}{$tld}";
            $results['domainAddresses']['search'][] = $fullDomain;
        }

        // Get suggestions
        $suggestions = $this->getSugesstionWords($domain, $type);
        foreach ($suggestions as $suggestion) {
            $results['domainAddresses']['suggestions'][] = $suggestion;
        }
        $results['has_suggestions'] = !empty($suggestions);

        return $results;
    }

    public function getSugesstionWords($keyword, $type)
    {
        $list = collect([]);

        $amazon = $this->amazonSuggetions($keyword);

        $google = $this->googleSuggetions($keyword);
        $bing = $this->bingSuggetions($keyword);
        $yahoo = $this->yahooSuggetions($keyword);

        $list = $list->merge([...$amazon, ...$google, ...$bing, ...$yahoo]);

        $suggestions = $list
            ->sort()
            ->filter(function ($item) {
                return str_word_count($item) > 1 && str_word_count($item) < 4;
            })
            ->map(function ($item) use ($type) {
                return Str::of($item)->slug('')->finish($type)->tostring();
            })
            ->unique()
            ->take(20);

        return array_values($suggestions->toArray());
    }

    protected function googleSuggetions($keyword)
    {
        $endpoint = "http://suggestqueries.google.com/complete/search?output=chrome&&hl=en&q=" . $keyword;

        $json = makeHttpRequest($endpoint);
        $list = json_decode($json, TRUE);
        return $list[1] ?? [];
    }

    protected function bingSuggetions($keyword)
    {
        $endpoint = "https://api.bing.com/osjson.aspx?JsonType=callback&JsonCallback&Query={$keyword}&Market=en-us";
        $json = makeHttpRequest($endpoint);
        $list = json_decode($json, TRUE);
        return $list[1] ?? [];
    }

    protected function yahooSuggetions($keyword)
    {
        $endpoint = "https://ff.search.yahoo.com/gossip?output=json&nresults=20&command={$keyword}";
        $json = makeHttpRequest($endpoint);
        $list = json_decode($json, TRUE);
        return collect($list['gossip']['results'])->pluck('key')->toArray() ?? [];
    }

    protected function amazonSuggetions($keyword)
    {
        $endpoint = "https://completion.amazon.com/search/complete?q={$keyword}&method=completion&search-alias=aps&mkt=1";
        $json = makeHttpRequest($endpoint);
        $list = json_decode($json, TRUE);
        return $list['gossip']['results'] ?? [];
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
