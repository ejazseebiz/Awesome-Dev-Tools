<?php


use App\MonsTools\Tools\CheckGzipCompression;

include('helper/helpers.php');

$results = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['domain'])) {
    $domain = filter_var($_POST['domain'], FILTER_SANITIZE_URL);
    if (filter_var($domain, FILTER_VALIDATE_URL)) {
        $gzipChecker = new CheckGzipCompression();
        $content = $gzipChecker->handle($domain);

        $results = [
            'domain' => $domain,
            'content' => $content
        ];
    } else {
        $error = "Invalid domain name.";
    }
}
?>

<div>
    <h1>Check Gzip Compression</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="domain">Enter Domain Name:</label>
        <input type="text" name="domain" id="domain" required>
        <button type="submit">Check Compression</button>
    </form>
</div>



<?php if ($results) : ?>
    <div>
        <h2>Results for <?php echo htmlspecialchars($results['domain']); ?></h2>
        <table border="1">
            <tr>
                <th>Given URL</th>
                <td><?php echo htmlspecialchars($results['domain']); ?></td>
            </tr>
            <tr>
                <th>GZip</th>
                <td>
                    <?php echo isset($results['content']['encoding'][0]) && $results['content']['encoding'][0] === 'gzip' ? 'Gzip Enabled' : 'Gzip Disabled'; ?>
                </td>
            </tr>
            <tr>
                <th>Compressed Size</th>
                <td><?php echo formatSizeUnits($results['content']['pagesize_compressed']); ?></td>
            </tr>
            <tr>
                <th>Uncompressed Size</th>
                <td><?php echo formatSizeUnits($results['content']['pagesize_uncompressed']); ?></td>
            </tr>
            <tr>
                <th>Saving</th>
                <td><?php echo formatSizeUnits($results['content']['saving']); ?></td>
            </tr>
            <tr>
                <th>Compression</th>
                <td><?php echo $results['content']['compression']; ?>%</td>
            </tr>
            <tr>
                <th>Status Code</th>
                <td>HTTP/<?php echo $results['content']['protocol']; ?> <?php echo $results['content']['status_code']; ?></td>
            </tr>
            <?php if (isset($results['content']['headers']['Date'][0])) : ?>
                <tr>
                    <th>Date</th>
                    <td><?php echo $results['content']['headers']['Date'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Content-Type'][0])) : ?>
                <tr>
                    <th>Content-Type</th>
                    <td><?php echo $results['content']['headers']['Content-Type'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Transfer-Encoding'][0])) : ?>
                <tr>
                    <th>Transfer-Encoding</th>
                    <td><?php echo $results['content']['headers']['Transfer-Encoding'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Connection'][0])) : ?>
                <tr>
                    <th>Connection</th>
                    <td><?php echo $results['content']['headers']['Connection'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Cache-Control'][0])) : ?>
                <tr>
                    <th>Cache-Control</th>
                    <td><?php echo $results['content']['headers']['Cache-Control'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Expires'][0])) : ?>
                <tr>
                    <th>Expires</th>
                    <td><?php echo $results['content']['headers']['Expires'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Vary'][0])) : ?>
                <tr>
                    <th>Vary</th>
                    <td><?php echo $results['content']['headers']['Vary'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['Server'][0])) : ?>
                <tr>
                    <th>Server</th>
                    <td><?php echo $results['content']['headers']['Server'][0]; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($results['content']['headers']['CF-RAY'][0])) : ?>
                <tr>
                    <th>CF-RAY</th>
                    <td><?php echo $results['content']['headers']['CF-RAY'][0]; ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
<?php endif; ?>