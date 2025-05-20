<?php

namespace App\MonsTools\Tools;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Contracts\ToolInterface;
// use App\Helpers\Classes\Minifer\HTMLMinify as Minifer;
use App\MonsTools\Helpers\Classes\Minifer\HTMLMinify as Minifer;


class HtmlMinify
{


    public function handle($html,  $tool)
    {
        // $validated = $request->validate([
        //     'html' => 'required'
        // ]);

        // $html = $request->input('html');
        // $html = $_POST['html'] ?? '';

        $content = Minifer::minify($html, ['optimizationLevel' => 1, 'removeDuplicateAttribute' => true, 'emptyElementAddWhitespaceBeforeSlash' => true]);
        $input_size = mb_strlen($html, '8bit');
        $out_size = mb_strlen($content, '8bit');
        $save_size = 100 - (($out_size / $input_size) * 100);

        $results = [
            'html' => $html,
            'content' => $content,
            'input_size' => $input_size,
            'output_size' => $out_size,
            'save_size' => round($save_size, 2)
        ];

        return $results;
    }
}
