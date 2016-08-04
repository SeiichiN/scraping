<?php
$html = file_get_contents('http://192.168.11.56/nuk/hello.html');
$domDocument = new DOMDocument();
$domDocument->loadHTML($html);
$xmlString = $domDocument->saveXML();
$xmlObject = simplexml_load_string($xmlString);
// var_dump($xmlObject);
// print_r($xmlObject);

$array = json_decode(json_encode($xmlObject), true);
echo $array['body']['header']['p'];
?>
