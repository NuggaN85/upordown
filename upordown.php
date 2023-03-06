<?php
function upordown($url)
{
    $cs = curl_init($url);
    curl_setopt($cs, CURLOPT_NOBODY, TRUE);
    curl_setopt($cs, CURLOPT_FOLLOWLOCATION, TRUE);
    $status_code = curl_getinfo($cs, CURLINFO_HTTP_CODE);
    return $status_code == 200;
}

if(isset($_POST['url']) && !empty($_POST['url']))
{
    $url = trim($_POST['url']);
    if(filter_var($url, FILTER_VALIDATE_URL))
    {
        if(upordown($url))
        {
            echo 'Website URL is up';
        }  
        else 
        {
            echo 'Sorry, Website URL is down'; 
        }
    }
    else 
    {
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
