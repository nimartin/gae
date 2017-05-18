<?php 
require 'vendor/autoload.php';
?>
<div><br> ---- Appel avec une clé valide : YV4N, N1C0L4S ---- </div>
<?php
$client = new Guzzle\Http\Client(['http_errors' => false]);

$request = $client->get('http://1-dot-inf63app9.appspot.com/rest/shopping?account=YV4N&isbn=3409&quantite=3');
$response = $request->send();
echo $response->getStatusCode().' : '.$response->getBody();
?>
<br>

<div><br> ---- Appel avec une clé non valide ---  </div>

<?php
try {
	$request = $client->get('http://1-dot-inf63app9.appspot.com/rest/shopping?account=dfsd&isbn=3409&quantite=3');
    $response = $request->send();
} catch ( Guzzle\Http\Exception\ClientErrorResponseException $exception) {
    $responseStatus = $exception->getResponse()->getStatusCode(true);
    echo $responseStatus." : ";
    $responseBody = $exception->getResponse()->getBody(true);
    echo $responseBody;
}



/*$response = $client->put('service/method2/te')->send();

echo $response->getBody();
echo $response->getStatusCode(); */
?>

<div><br> ---- Appel avec un isbn non valide ----</div>

<?php
try {
	$request = $client->get('http://1-dot-inf63app9.appspot.com/rest/shopping?account=N1C0L4S&isbn=sdfsd&quantite=5');
    $response = $request->send();
} catch ( Guzzle\Http\Exception\ClientErrorResponseException $exception) {
	$responseStatus = $exception->getResponse()->getStatusCode(true);
    echo $responseStatus." : ";
    $responseBody = $exception->getResponse()->getBody(true);
    echo $responseBody;
}
?>

<div><br> ---- Appel avec params invalident ----</div>

<?php
try {
	$request = $client->get('http://1-dot-inf63app9.appspot.com/rest/shopping?account=sdf&isbn=sdfsd&sdf=5');
    $response = $request->send();
} catch ( Guzzle\Http\Exception\ClientErrorResponseException $exception) {
	$responseStatus = $exception->getResponse()->getStatusCode(true);
    echo $responseStatus." : ";
    $responseBody = $exception->getResponse()->getBody(true);
    echo $responseBody;
}
?>