<?php
// Include necessary files
include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\DomainToIp;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $tool = new DomainToIp();
    $results = $tool->handle($domain);
}


?>

<div class="application-tools-wrapper">
    <div class="tool-wrapper">
        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <h3 class="h4">Enter a Valid Domain Name</h3>
                        </div>
                        <div class="form-group">
                            <input type="url" class="form-control" name="domain" id="domain" required
                                value="<?php echo $results['domain'] ?? old('domain'); ?>"
                                placeholder="Enter a Domain" />


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        Convert to IP
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="result">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody id="results-container">
                                    <tr>
                                        <th>Given URL</th>
                                        <th>Server IP</th>
                                        <th>Country</th>
                                        <th>Hosting</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $results['domain'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['ip'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['country'] ?? ''; ?></td>
                                        <td><?php echo $results['content']['isp'] ?? ''; ?></td>
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