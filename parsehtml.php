<?php
$html = file_get_contents('http://localhost/phpwork/tmp3.html');
$domDocument = new DOMDocument();
$domDocument->loadHTML($html);
$xmlString = $domDocument->saveXML();
$xmlObject = simplexml_load_string($xmlString);
var_dump($xmlObject);
// print_r($xmlObject);

$array = json_decode(json_encode($xmlObject), true);
//echo $array['h1'];
echo $array['body']['header']['h1'];
?>
