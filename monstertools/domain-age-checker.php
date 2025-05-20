<?php

// Include necessary files
include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\DomainAgeChecker;

$results = null;
$error = null;

$domainAgeChecker = new DomainAgeChecker();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['domain'])) {
    // Split the domain input by line breaks or other separators, if any
    $domains = explode(PHP_EOL, $_POST['domain']);
    // Keep only non-empty domains
    $domains = array_filter(array_map('trim', $domains));

    // Initialize an empty array to store results for each domain
    $results = ['domainAddresses' => $domains];

    foreach ($domains as $domain) {
        // Handle each domain individually
        $result = $domainAgeChecker->handle($domain);
        if (isset($result['error'])) {
            // Handle errors if necessary
            $error = $result['error'];
        } else {
            // Add the result to the results array
            $results[] = $result;
        }
    }
}

?>

<div>
    <h3>Enter Domain</h3>
    <form action="" method="post" role="form">
        <textarea name="domain" rows="5" placeholder="Enter domain here" required><?php echo isset($results['domain']) ? htmlspecialchars($results['domain']) : ''; ?></textarea>
        <button type="submit">Check Domain</button>
    </form>
</div>



<?php if (isset($results)) : ?>
    <div class="tool-results-wrapper">
        <div class="progress mb-3" style="height: 3px;">
            <div id="conversion-progress" class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4>Results</h4>
        <table class="table table-style mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Domain</th>
                    <th>Created On</th>
                    <th>Expiration Date</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody id="results-container">

            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3" id="loader">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
<?php elseif (isset($error)) : ?>
    <div class="text-danger">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const domains = <?php echo json_encode(isset($results['domainAddresses']) && is_array($results['domainAddresses']) ? $results['domainAddresses'] : []); ?>;
        console.log("Domains", domains); // Should log the domains array correctly

        if (!Array.isArray(domains)) {
            console.error("domains is not an array");
            return;
        }

        let cursor = 0;

        const getResult = async function() {
            if (domains.length === cursor) {
                return;
            }
            const domain = domains[cursor];
            console.log("Current domain being processed:", domain);
            initLoader(cursor);
            try {
                const pluginUrl = '<?php echo plugin_dir_url(__FILE__); ?>';
                const ajaxUrl = pluginUrl + 'ajax/handle_domain_age_checker.php';
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
            cursor++;
            if (cursor < domains.length) {
                getResult();
            } else {
                document.getElementById('loader').classList.add('d-none');
            }
        };

        const initLoader = function(cursor) {
            const element = document.querySelector('#results-container');
            const html = `<tr>
                <td>${cursor + 1}</td>
                <td>${domains[cursor]}</td>
                <td class="registered-${cursor}"><div class="placeholder-glow"><span class="placeholder col-8"></span></div></td>
                <td class="expiry-${cursor}"><div class="placeholder-glow"><span class="placeholder col-8"></span></div></td>
                <td class="age-${cursor}"><div class="placeholder-glow"><span class="placeholder col-8"></span></div></td>
            </tr>`;
            element.innerHTML += html;
        };

        const updateProgress = function() {
            const progress = Math.round(((cursor + 1) / domains.length) * 100);
            document.getElementById('conversion-progress').style.width = progress + '%';
        };

        const updateResult = function(res) {
            updateProgress();
            if (res.content) {
                document.querySelector(`#results-container .registered-${cursor}`).innerHTML = res.content.created || '';
                document.querySelector(`#results-container .expiry-${cursor}`).innerHTML = res.content.expiry || '';
                document.querySelector(`#results-container .age-${cursor}`).innerHTML = res.content.age || '';
            } else {
                resultError(cursor);
            }
        };

        const resultError = function() {
            const status = `<span class="small text-danger">Error</span>`;
            document.querySelector(`#results-container .registered-${cursor}`).innerHTML = status;
            document.querySelector(`#results-container .expiry-${cursor}`).innerHTML = status;
            document.querySelector(`#results-container .age-${cursor}`).innerHTML = status;
        };

        const APP = {
            init: function() {
                getResult();
            }
        };

        APP.init();
    });
</script>