<?php
// Include necessary files
include('helper/helpers.php');
include('helper/strings.php');


use App\MonsTools\Tools\DomainHostingChecker;
// Example usage of the DomainHostingChecker class
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $tool = new DomainHostingChecker();
    $results = $tool->handle($domain);
}

?>

<!-- HTML Template -->
<div class="application-tools-wrapper">
    <div class="tool-wrapper">
        <!-- Advertisement slot above form -->
        <div class="advertisement">
            <!-- Advertisement content goes here -->
        </div>
        <form method="post" action="" class="box-shadow my-3 py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <h3 class="h4">Enter Domain Name</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="domain" id="domain" required placeholder="Enter a Domain" />
                        <!-- Error message for domain input -->
                        <div class="input-error">
                            <!-- Error message goes here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Advertisement slot below form -->
            <div class="advertisement">
                <!-- Advertisement content goes here -->
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        Check Domain Name
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Tool results -->
    <?php if (isset($results)) : ?>
        <div class="tool-results-wrapper">
            <div class="advertisement">
                <!-- Advertisement content goes here -->
            </div>
            <div class="page-wrapper">
                <div class="result">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody id="results-container">
                                    <tr>
                                        <th>Given Url</th>
                                        <td class="text-start ps-3"><?php echo $domain ?? ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Domain Name</th>
                                        <td class="text-start ps-3"><?php echo $results['info']->domainName ?? ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Hosting</th>
                                        <td class="text-start ps-3">
                                            <?php echo $results['content']['isp'] ?? ''; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Server IP </th>
                                        <td class="text-start ps-3">
                                            <?php echo $results['content']['ip'] ?? ''; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Name Servers </th>
                                        <td class="text-start ps-3">
                                            <?php
                                            foreach ($results['info']->nameServers as $nameserver) {
                                                echo $nameserver . "<br>";
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Last Update On </th>
                                        <td class="text-start ps-3">
                                            <?php
                                            $updatedDate =  $results['info']->updatedDate;
                                            // If it's a timestamp, convert it to a human-readable format
                                            if (is_numeric($updatedDate)) {
                                                $updatedDate = date('Y-m-d H:i:s', $updatedDate);
                                            }

                                            echo $updatedDate;
                                            ?>
                                        </td>
                                    </tr>
                                    <!-- Add more result fields here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="advertisement">
                <!-- Advertisement content goes here -->
            </div>
        </div>
    <?php endif; ?>
</div>