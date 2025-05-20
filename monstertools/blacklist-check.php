<?php

use App\MonsTools\Tools\BlacklistCheck;

include('helper/helpers.php');
include('helper/strings.php');

$results = null;
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['domain'])) {

    $domain = filter_var($_POST['domain'], FILTER_SANITIZE_URL);
    if (filter_var($domain, FILTER_VALIDATE_URL)) {
        $blacklistCheck = new BlacklistCheck();
        // $content = $blacklistCheck->handle($domain);
        $results = $blacklistCheck->handle($domain);

        // $results = [
        //     'domain' => $domain,
        //     'content' => $content
        // ];
        if (isset($results['error'])) {
            $error = $results['error'];
            $results = null;
        }
    }
}



// if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['domain'])) {
//     $url = filter_var($_POST['domain'], FILTER_SANITIZE_URL);
//     $blacklistCheck = new BlacklistCheck();
//     $results = $blacklistCheck->handle($url);
//     if (isset($results['error'])) {
//         $error = $results['error'];
//         $results = null;
//     } else {
//         $domains = json_decode($results['domainAddresses'], true);
//         $listings = $blacklistCheck->dnsbllookup($results['domainIp'], $domains);
//     }
// }

?>

<form action="" method="post" role="form">
    <div class="box-shadow my-3 py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <h3 class="h4">Blacklist Checker</h3>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="domain" id="domain" required value="<?php echo htmlspecialchars($results['domain'] ?? '', ENT_QUOTES); ?>" placeholder="Enter a Domain" />
                </div>
                <?php if ($error) : ?>
                    <p class="text-danger"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-end">
            <button type="submit" name="submit" class="btn btn-outline-primary rounded-pill">Check Blacklist</button>
        </div>
    </div>
</form>



<?php if ($results) : ?>
    <div class="tool-results-wrapper">
        <div class="result mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="progress mb-3">
                        <div id="conversion-progress" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <table class="table table-style mb-0">
                        <tr>
                            <th>#</th>
                            <th>Host</th>
                            <th>Status</th>
                        </tr>
                        <tbody id="results-container"></tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3 loader-search" id="loader">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const APP = function() {
            const domains = <?php echo $results['domainAddresses']; ?>;
            const search_ip = "<?php echo $results['domainIp']; ?>";
            let cursor = 0;
            const getResult = async function() {
                if (domains.length === cursor) {
                    return;
                }
                const domain = domains[cursor];
                initRequest();
                try {
                    const pluginUrl = '<?php echo plugin_dir_url(__FILE__); ?>';
                    const ajaxUrl = pluginUrl + 'ajax/handle_blacklist_check.php';
                    const res = await fetch(ajaxUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            domain: domain,
                            search_ip: search_ip
                        })
                    });
                    const data = await res.json();
                    addResult(data);
                } catch (error) {
                    resultError();
                }
                cursor++;
                if (cursor < domains.length) {
                    getResult();
                } else {
                    document.getElementById('loader').classList.add('d-none');
                }
            };
            const updateProgress = function() {
                const progress = Math.round(((cursor + 1) / domains.length) * 100);
                document.getElementById('conversion-progress').style.width = progress + '%';
            };
            const initRequest = function() {
                const element = document.querySelector('#results-container');
                const html = `<tr>
                        <td>${cursor + 1}</td>
                        <td>${domains[cursor]}</td>
                        <td class="blacklist-status-${cursor}"><div class="placeholder-glow"><span class="placeholder col-4"></span></div></td>
                    </tr>`;
                element.innerHTML += html;
            };
            const resultError = function() {
                addResult({
                    status: '<span class="text-danger">Error</span>'
                });
            };
            const addResult = function(res) {
                updateProgress();
                document.querySelector(`.blacklist-status-${cursor}`).innerHTML = res.status;
            };
            return {
                init: function() {
                    getResult();
                }
            };
        }();
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
<?php endif; ?>