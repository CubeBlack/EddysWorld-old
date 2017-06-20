<pre>
<?php
function get_req($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
    $return = curl_exec($curl);
    curl_close($curl);
    return $return;
}
if(isset($_REQUEST["code"])){
    require_once 'configFace.php';
    $code = $_REQUEST["code"];
    
     /*
     graph.facebook.com/debug_token?
     input_token={token-to-inspect}
     &access_token={app-token-or-admin-token}
     */
    
    $url = "";
    $url .= "https://graph.facebook.com/debug_token?";
    $url .= "input_token=" . $access_token;
    $url .= "&access_token=" . $code;
    $resposta = get_req($url);
    $debug_token = json_encode($resposta);
    echo $resposta;
    
}
    