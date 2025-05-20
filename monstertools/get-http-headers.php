<?php
// Include necessary files

include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\GetHttpHeaders;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $tool = new GetHttpHeaders();
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
                            <h3 class="h4">Enter URL</h3>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="domain" id="domain" required
                                value="<?php echo $results['domain'] ?? old('domain'); ?>" placeholder="Enter Or Paste Url" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        Get Headers
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
                                        <th>Given Url</th>
                                        <td class="text-start ps-3"><?php echo $results['domain'] ?? ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Domain Name</th>
                                        <td class="text-start ps-3">
                                            <?php echo extractHostname($results['domain'] ?? '', true); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td class="text-start ps-3">
                                            <?php echo $results['content']['Date'][0] ?? ''; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ContentType</th>
                                        <td class="text-start ps-3">
                                            <?php echo $results['content']['Content-Type'][0] ?? ''; ?>
                                        </td>
                                    </tr>
                                    <?php if (!empty($results['content']['Transfer-Encoding'][0])): ?>
                                        <tr>
                                            <th>Transfer Encoding</th>
                                            <td class="text-start ps-3">
                                                <?php echo $results['content']['Transfer-Encoding'][0] ?? ''; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th>Connection</th>
                                        <td class="text-start ps-3">
                                            <?php echo $results['content']['Connection'][0] ?? ''; ?>
                                        </td>
                                    </tr>

                                    <?php if (!empty($results['content']['Cache-Control'][0])): ?>
                                        <tr>
                                            <th>Cache Control</th>
                                            <td class="text-start ps-3">
                                                <?php echo $results['content']['Cache-Control'][0] ?? ''; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if (!empty($results['content']['Expires'][0])): ?>
                                        <tr>
                                            <th>Expires</th>
                                            <td class="text-start ps-3">
                                                <?php echo $results['content']['Expires'][0] ?? ''; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if (!empty($results['content']['Vary'][0])): ?>
                                        <tr>
                                            <th>Vary</th>
                                            <td class="text-start ps-3">
                                                <?php echo $results['content']['Vary'][0] ?? ''; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if (!empty($results['content']['Server'][0])): ?>
                                        <tr>
                                            <th>Server</th>
                                            <td class="text-start ps-3">
                                                <?php echo $results['content']['Server'][0] ?? ''; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if (!empty($results['content']['CF-RAY'][0])): ?>
                                        <tr>
                                            <th>CF Ray</th>
                                            <td class="text-start ps-3"><?php echo $results['content']['CF-RAY'][0] ?? ''; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>