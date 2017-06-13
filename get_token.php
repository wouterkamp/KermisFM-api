///methode in php hoe je een token kunt opvragen 
/// LETOP! dit kan alleen in PHP omdat je via php wel crossdomain aanvragen kun uitvoeren 
$key = "*************";
$key_secret = "*************"; 


$token = loadtoken($key,$key_secret); 


function loadtoken($key,$key_secret){
    global $baseurl;
    
$postfields = array("key"=>$key,"key_secret"=>$key_secret);
    
$url = $baseurl."auth/"; 
$data = curl_download($url,$postfields);
      
    
    
    
 return $data['token'];    
}



function curl_download($Url,$postfields){

    // is cURL installed yet?
    if (!function_exists('curl_init')){
         echo "error";
        die('Sorry cURL is not installed!');
    }
 
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
 
    // Now set some options (most are optional)
 
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
 
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
 
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
 
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
    // Download the given URL, and return output
    $output = curl_exec($ch);
 
    // Close the cURL resource, and free system resources
    curl_close($ch);
    return json_decode($output,true);
}



?> 
