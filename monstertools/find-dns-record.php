<?php
// Include necessary files

include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\FindDnsRecord;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $tool = new FindDnsRecord();
    $results = $tool->handle($domain, 'domain-to-ip');
}

?>
<div class="application-tools-wrapper">
    <div class="tool-wrapper">
        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <h3 class="h4">Enter Valid Domain Name</h3>
                        </div>
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                name="domain"
                                id="domain"
                                required
                                value="<?php echo $results['domain'] ?? old('domain'); ?>"
                                placeholder="Enter a Domain" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        Get Records
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="result mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover table-border">
                                <tbody id="results-container">
                                    <tr>
                                        <th>Host</th>
                                        <th>IP</th>
                                        <th>Class</th>
                                        <th>TTL</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $results['content']['host'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['ip'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['class'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['ttl'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['type'] ?? ''; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>