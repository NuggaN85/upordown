<?php
function checkWebsiteStatus($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return $statusCode;
}

$resultMessage = '';

if (isset($_POST['url']) && !empty($_POST['url'])) {
    $url = trim($_POST['url']);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $statusCode = checkWebsiteStatus($url);
        if ($statusCode == 200) {
            $resultMessage = 'Website URL is up';
        } else {
            $resultMessage = 'Sorry, Website URL is down';
        }
    } else {
        $resultMessage = 'Invalid URL';
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Website Status Checker</title>
</head>
<body>
    <h1>Website Status Checker</h1>
    <form action="" method="post">
        <label for="url">Website URL:</label>
        <input type="text" id="url" name="url" placeholder="Enter URL" required>
        <input type="submit" value="Check">
    </form>
    <?php if (!empty($resultMessage)): ?>
    <p><?php echo $resultMessage; ?></p>
    <?php endif; ?>
</body>
</html>
