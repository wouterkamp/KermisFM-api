<?php 

$token = "*******************"; /// je token 
$eindpunt = "gids/"; /// het api eindpunt 
$actie = "gids_radio"; /// de actie die het script moet uitvoeren (GET fucntie)
$post_fields = array(
    'parameter' => 'waarde',
    'nog_een_parameter' => 'waarde'
); /// extra parameters /// (kan leeg gelaten worden )

$output = get_form_api($token,$eindpunt,$actie,$post_fields); // de kfm api methode
print_r($output); // output in een php array als resultaat (letop wordt nog niet gecontroleerd op errors)








function get_form_api($token,$eindpunt,$actie,$post_fields = array()){ 
$postfield['token'] = $token;       
$data = http_build_query($postfield);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.kermisfm.nl/".$eindpunt."?actie=".$actie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_POST, 1);
    
$headers = array();
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    die(); 
}
curl_close ($ch);
$output =  json_decode($result,true);
    
return $output;     

}

?> 
