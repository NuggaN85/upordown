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

if(isset($_POST['url']) && !empty($_POST['url'])) {
    $url = trim($_POST['url']);
    if(filter_var($url, FILTER_VALIDATE_URL)) {
        $statusCode = checkWebsiteStatus($url);
        if($statusCode == 200) {
            echo 'Website URL is up';
        } else {
            echo 'Sorry, Website URL is down'; 
        }
    } else {
        echo 'Invalid URL'; 
    }   
}
?>
<!doctype html>
<html>
    <body>
        <form action="" method="post">
            <label for="url">Website URL:</label>
            <input type="text" id="url" name="url" placeholder="Enter URL">
            <input type="submit" value="Check">
        </form>
    </body>
</html>
