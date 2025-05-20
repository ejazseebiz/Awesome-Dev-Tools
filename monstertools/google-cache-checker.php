<?php
// Include necessary files

include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\GoogleCacheChecker;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $tool = new GoogleCacheChecker();
    $results = $tool->handle($domain, 'google-cache-checker');
}

?>

<div class="application-tools-wrapper">
    <div class="tool-wrapper">
        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <h3 class="h4">Enter Domain Limit Label - no_domain_tool</h3>
                            <textarea rows="5" class="form-control" name="domain" id="domain"
                                placeholder="Enter Domain Limit Placeholder" required><?php echo $results['domain'] ?? old('domain'); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        Check Google Cache
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>

        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="result mt-4">
                    <div class="progress mb-3" style="height: 3px;">
                        <div id="conversion-progress" class="progress-bar bg-success" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <table class="table table-style mb-0">
                        <thead>
                            <th></th>
                            <th>Domain Url</th>
                            <th>Last Modified</th>
                            <th class="text-center">Cache Url</th>
                        </thead>
                        <tbody id="results-container">

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3" id="loader">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">@lang('common.loading')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if (isset($results)): ?>
        <script>
            const APP = function() {
                // const domains = {
                //     !!$results['domainAddresses'] !!
                // };
                const domains = <?php echo $results['domainAddresses']; ?>;

                var cursor = 0;
                const getReslut = async function() {
                        if (domains.length == cursor) {
                            return;
                        }
                        // alert(domains[0]);
                        const domain = domains[cursor]
                        // alert(cursor);

                        initLoader(cursor)
                        try {
                            const pluginUrl = '<?php echo plugin_dir_url(__FILE__); ?>';
                            const ajaxUrl = pluginUrl + 'ajax/handle_google_cache_checker.php';
                            // console.log("DOMAIN", domain);
                            const response = await fetch(ajaxUrl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    domain: domain
                                })
                            });
                            const res = await response.json();
                            updateResult(res);
                        } catch (err) {
                            resultError(cursor);
                        }
                        cursor++
                        if (cursor < domains.length) {
                            getReslut()
                        } else {
                            document.getElementById('loader').classList.add('d-none')
                        }
                    },
                    initLoader = function() {
                        const element = document.querySelector('#results-container')
                        const html = `<tr>
                                <td>${cursor+1}</td>
                                <td>${domains[cursor]}</td>
                                <td class="cache-${cursor}"><div class="placeholder-glow"><span class="placeholder col-8">==</span></div></td>
                                <td class="modified-${cursor}"><div class="placeholder-glow"><span class="placeholder col-8"></span></div></td>
                            </tr>`;

                        element.innerHTML += html
                    },
                    updateProgress = function() {
                        var progress = (parseInt(cursor + 1) / domains.length) * 100;
                        progress = Math.round(progress);

                        document.getElementById('conversion-progress').style.width = progress + '%'
                    },
                    updateResult = function(res) {
                        console.log(res);
                        updateProgress()
                        document.querySelector(`#results-container .cache-${cursor}`).innerHTML = res.content.content.datetime || ''
                        document.querySelector(`#results-container .modified-${cursor}`).innerHTML = res.content.url ? `<a href="${res.content.url}" target="_blank"
                                                        rel="nofollow noreferrer noopener"
                                                        class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        title="@lang('admin.visitSite')">
                                                        View Cache
                                                    </a>` : ''
                    },
                    resultError = function() {
                        const status = `<span class="small text-danger">{{ __('common.error') }}</span>`
                        updateResult({
                            age: status
                        })
                    };

                return {
                    init: function() {
                        getReslut()
                    }
                }
            }();

            document.addEventListener("DOMContentLoaded", function(event) {
                APP.init();
            });
        </script>
    <?php endif; ?>
</div>