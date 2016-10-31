<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

/*$wxopenid = '';
if(is_wechat_browser()) {
    $code = isset($_GET['code']) ? $_GET['code'] : '';
    if (!$code) {
        $baseUrl = urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : ''));
        $url = CreateOauthUrlForCode($baseUrl);
        header("Location: $url");
    } else {
        $code = $_GET['code'];
        $wxopenid = getOpenidFromMp($code);
        echo $wxopenid;
    }
}
function CreateOauthUrlForOpenid($code){
    $urlObj["appid"]  = 'wx71820ab710681683';
    $urlObj["secret"] = '393ec60cb8aeec1eebe8f2696b947ddc';
    $urlObj["code"] = $code;
    $urlObj["grant_type"] = "authorization_code";
    $bizString = ToUrlParams($urlObj);
    return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
}
function GetOpenidFromMp($code){
    $url = CreateOauthUrlForOpenid($code);
    //初始化curl
    $ch = curl_init();
    //设置超时
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    //运行curl，结果以jason形式返回
    $res = curl_exec($ch);
    curl_close($ch);
    //取出openid
    $data = json_decode($res,true);
    $openid = $data['openid'];
    return $openid;
}
function CreateOauthUrlForCode($redirectUrl){
    $urlObj["appid"] = 'wx71820ab710681683';
    $urlObj["redirect_uri"] = "$redirectUrl";
    $urlObj["response_type"] = "code";
    $urlObj["scope"] = "snsapi_userinfo";
    $urlObj["state"] = "STATE"."#wechat_redirect";
    $bizString = ToUrlParams($urlObj);
    return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
}

function ToUrlParams($urlObj){
    $buff = "";
    foreach ($urlObj as $k => $v){
        if($k != "sign"){
            $buff .= $k . "=" . $v . "&";
        }
    }

    $buff = trim($buff, "&");
    return $buff;
}
function is_wechat_browser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'MicroMessenger') === false) {
        return false;
    } else {
        return true;
    }
}

$response->withCookie(cookie()->forever('wxopenid', $wxopenid))->send();*/
$response->send();

$kernel->terminate($request, $response);
