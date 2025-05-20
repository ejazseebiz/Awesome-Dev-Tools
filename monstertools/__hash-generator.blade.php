<?php
// Include necessary files

include('helper/helpers.php');
include('helper/strings.php');

// use App\MonsTools\Tools\GoogleCacheChecker;

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $domain = $_POST["domain"];
//     $tool = new GoogleCacheChecker();
//     $results = $tool->handle($domain, 'google-cache-checker');
// }

?>

<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <textarea type="text" name="string" class="mb-3" required autofocus>
            {{ $string ?? '' }}
            </textarea>
            <x-input-error :messages="$errors->get('string')" class="mt-2" />

            <div class="text-end">
                <button type="submit" class="btn-outline-primary rounded-pill">
                    Generate
                </button>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>

        <div class="page-wrapper">
            <table class="table table-style mb-0">
                <tbody>
                    @foreach ($results as $item)
                    <tr>
                        <th>{{ $item['label'] }}</th>
                        <td>
                            <div class="text-break">
                                {{ $item['value'] }}
                            </div>
                        </td>
                        <td>
                            <x-copy-text :text="$item['value']" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <?php endif; ?>

</div>