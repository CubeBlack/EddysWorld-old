Verificando...
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
    //------------------------verificar code
    $code = $_REQUEST["code"];
    /*
   https://graph.facebook.com/v2.9/oauth/access_token?
   client_id={app-id}
   &redirect_uri={redirect-uri}
   &client_secret={app-secret}
   &code={code-parameter}
   */
    $url = "";
    $url .= "https://graph.facebook.com/v2.9/oauth/access_token?";
        $url .= "client_id=" . $app_id;
        $url .= "&redirect_uri=https://dannkestudios.websiteseguro.com/Eddysword/facebook/verificarCodigo.php";
        $url .= "&client_secret=$client_secret";
        $url .= "&code=$code";
    $resposta = get_req($url);
   
    /*
{
  "access_token": {access-token}, 
  "token_type": {type},
  "expires_in":  {seconds-til-expiration}
}
     *      */
    //echo $resposta;
    //$access_token = json_decode($resposta);
    $resposta = json_decode($resposta);
    $access_token = $resposta->access_token;
    //------------------------------------------------------------pegar usuario
       /*
     graph.facebook.com/debug_token?
     input_token={token-to-inspect}
     &access_token={app-token-or-admin-token}
   */
    $url = "";
    $url .= "https://graph.facebook.com/debug_token?";
        $url .= "&input_token=$input_token";
        $url .= "&access_token=$access_token";
    //echo $url;
    $resposta = get_req($url);
   
    /*
{
    "data": {
        "app_id": 138483919580948, 
        "application": "Social Cafe", 
        "expires_at": 1352419328, 
        "is_valid": true, 
        "issued_at": 1347235328, 
        "metadata": {
            "sso": "iphone-safari"
        }, 
        "scopes": [
            "email", 
            "publish_actions"
        ], 
        "user_id": 1207059
    }
}
     *      */
    
    //$access_token = json_decode($resposta);
    $resposta = json_decode($resposta);
    echo "User ID: {$resposta->data->user_id}";
    require_once "../engine/sala.php";
    
    User::forceLogon($resposta->data->user_id, "face");
    echo "<meta http-equiv=\"refresh\" content=1;url=\"view.php\">";
    
}
else{
    echo "Sem o codigo de verificação";
}
    