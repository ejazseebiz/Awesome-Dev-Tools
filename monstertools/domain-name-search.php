<?php

// Assume necessary imports and initializations are done here
include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\DomainNameSearch;
use Illuminate\Support\MessageBag;

$domainNameSearch = new DomainNameSearch();

// exit;
// Fetch the tool data
$tool = ""; // Implement the correct logic to fetch the tool data

$results = $results ?? null;
$errors = $errors ?? new MessageBag();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = $_POST['domain'] ?? null;
    $type = $_POST['type'] ?? null;

    if ($domain && $type) {
        $results = $domainNameSearch->handle($domain, $type);
    } else {
        $errors->add('form', 'Both domain and type are required.');
    }
}
?>

<div class="box-shadow my-3 py-5">
    <form method="post" action="">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <h3>Enter Domain Name or Keyword</h3>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <input class="form-control" name="domain" id="domain" required placeholder="Enter a keyword" value="<?php echo isset($results['domain']) ? $results['domain'] : old('domain'); ?>" />
                    <?php if ($errors->has('domain')) : ?>
                        <div class="mt-2">
                            <?php foreach ($errors->get('domain') as $error) : ?>
                                <div class="error"><?php echo $error; ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select name="type" id="type" required class="form-control form-select">
                        <option value=".com" <?php echo isset($results['type']) && $results['type'] == '.com' ? 'selected' : ''; ?>>.com</option>
                        <option value=".net" <?php echo isset($results['type']) && $results['type'] == '.net' ? 'selected' : ''; ?>>.net</option>
                        <option value=".org" <?php echo isset($results['type']) && $results['type'] == '.org' ? 'selected' : ''; ?>>.org</option>
                        <option value=".us" <?php echo isset($results['type']) && $results['type'] == '.us' ? 'selected' : ''; ?>>.us</option>
                        <option value=".info" <?php echo isset($results['type']) && $results['type'] == '.info' ? 'selected' : ''; ?>>.info</option>
                        <option value=".co.in" <?php echo isset($results['type']) && $results['type'] == '.co.in' ? 'selected' : ''; ?>>.co.in</option>
                        <option value=".me" <?php echo isset($results['type']) && $results['type'] == '.me' ? 'selected' : ''; ?>>.me</option>
                        <option value=".co" <?php echo isset($results['type']) && $results['type'] == '.co' ? 'selected' : ''; ?>>.co</option>
                    </select>
                    <?php if ($errors->has('type')) : ?>
                        <div class="mt-2">
                            <?php foreach ($errors->get('type') as $error) : ?>
                                <div class="error"><?php echo $error; ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-outline-primary rounded-pill">Check Domain Name</button>
            </div>
        </div>
    </form>
</div>

<?php if (isset($results)) : ?>
    <div class="tool-results-wrapper">
        <div class="result">
            <div class="row">
                <div class="col-md-6">
                    <h3>Popular Extensions</h3>
                    <table class="table table-style mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Domain Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="results-container">
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3 loader-search" id="loader">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Suggestions</h3>
                    <table class="table table-style mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Domain Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="suggestions-container">
                            <?php if (!$results['has_suggestions']) : ?>
                                <tr>
                                    <td class="text-center" colspan="4">No Suggestions</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if ($results['has_suggestions']) : ?>
                        <div class="d-flex justify-content-center mt-3 loader-search" id="loader-1">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    const APP = (function() {
        const search_domains = <?php echo json_encode($results['domainAddresses'] ?? []); ?>;

        const getReslut = async function(element, cursor, domains) {
            console.log(domains.length, cursor);
            if (domains.length === cursor) {
                console.log("END CURSOR");
                document.querySelector(`#${element}`).parentNode.parentNode.querySelector('.loader-search').classList.remove('d-flex');
                document.querySelector(`#${element}`).parentNode.parentNode.querySelector('.loader-search').style.display = 'none';
                return;
            }
            const domain = domains[cursor];
            initResult(element, cursor, domain);

            try {
                const pluginUrl = '<?php echo plugin_dir_url(__FILE__); ?>';
                const ajaxUrl = pluginUrl + 'ajax/handle_domain_name_search.php';

                const response = await fetch(ajaxUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        domain: domain
                    })
                });

                const responseText = await response.text();

                // Debugging: log the raw response text
                // console.log('Raw response:', responseText);

                const res = JSON.parse(responseText);

                // Debugging: log the parsed response
                // console.log('Parsed response:', res);

                updateResult(element, cursor, res);
            } catch (err) {
                console.error('Fetch error:', err);
                resultError(element, cursor);
            }
            cursor++;
            getReslut(element, cursor, domains);
        };

        const initResult = function(element, cursor, domain) {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `<td>${cursor + 1}</td><td>${domain}</td><td><div class="dot-flashing"></div></td>`;
            document.querySelector(`#${element}`).append(newRow);
        };

        const resultError = function(element, cursor) {
            const elementTd = document.querySelector(`#${element} tr:nth-child(${cursor + 1}) td:nth-child(3)`);
            elementTd.innerHTML = '<span class="badge bg-danger">Error</span>';
        };

        const updateResult = function(element, cursor, result) {
            const elementTd = document.querySelector(`#${element} tr:nth-child(${cursor + 1}) td:nth-child(3)`);
            if (result.status === 'Available') {
                elementTd.innerHTML = '<span class="badge bg-success">Available</span>';
            } else {
                elementTd.innerHTML = '<span class="badge bg-danger">Registered</span>';
            }
        };

        return {
            search_domains: search_domains,
            getReslut: getReslut
        };
    })();

    document.addEventListener('DOMContentLoaded', () => {
        if (APP.search_domains) {
            if (APP.search_domains.search) {
                APP.getReslut('results-container', 0, APP.search_domains.search);
            }
            if (APP.search_domains.suggestions) {
                APP.getReslut('suggestions-container', 0, APP.search_domains.suggestions);
            }
        }
    });
</script>