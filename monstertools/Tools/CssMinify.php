<?php

namespace App\MonsTools\Tools;

use App\Models\Faqs;
use App\Models\Plan;
use App\Models\Tool;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Contracts\ToolInterface;
use Asika\Minifier\MinifierFactory;

class CssMinify
{
  public function handle($request,  $tool)
  {
    // $validated = $request->validate([
    //   'css' => 'required'
    // ]);
    // exit;
    $css = $_POST['css'] ?? '';
    $results = [];

    // $css = $request->input('css');
    $minify = MinifierFactory::create('css');
    $minify->addContent($css);
    $content = $minify->minify();
    $input_size = mb_strlen($css, '8bit');
    $out_size = mb_strlen($content, '8bit');
    $save_size = 100 - (($out_size / $input_size) * 100);

    $results = [
      'css' => $css,
      'content' => $content,
      'input_size' => $input_size,
      'output_size' => $out_size,
      'save_size' => round($save_size, 2)
    ];


    return  $results;
  }
}
