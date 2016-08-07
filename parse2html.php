<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php

if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "files/" . $_FILES["upfile"]["name"])) {
    chmod("files/" . $_FILES["upfile"]["name"], 0644);

    echo $_FILES["upfile"]["name"] . "を選択しました。<br>";
    $file = "files/" . $_FILES["upfile"]["name"];
  } else {
    echo "ファイルを選択できません。";
  }
} else {
  echo "ファイルが選択されていません。";
}




$html = file_get_contents($file);
// $html = file_get_contents('http://192.168.11.56/nuk/hello.html');
preg_match('/<title>.+<\/title>/', $html, $title);
preg_match('/<h1>.+<\/h1>/', $html, $h1);
preg_match('/<h2>.+<\/h2>/', $html, $h2);
preg_match('/<h3>.+<\/h3>/', $html, $h3);
 

$wd_title = str_replace("<title>", "", $title[0]);
$wd_h1 = str_replace("<h1>", "", $h1[0]);
$wd_h2 = str_replace("<h2>", "", $h2[0]);
$wd_h3 = str_replace("<h3>", "", $h3[0]);


$wd_title = str_replace("</title>", "", $wd_title);
$wd_h1 = str_replace("</h1>", "", $wd_h1);
$wd_h2 = str_replace("</h2>", "", $wd_h2);
$wd_h3 = str_replace("</h3>", "", $wd_h3);



echo 'title = '. $wd_title .'<br>';
echo 'h1 = ' . $wd_h1 .'<br>';
echo 'h2 = ' . $wd_h2 .'<br>';
echo 'h3 = ' . $wd_h3 .'<br>';


$domDocument = new DOMDocument();
@$domDocument->loadHTML($html);
$xml = simplexml_import_dom($domDocument);
$fff = $xml->xpath('string(//h1/text())');

$array = json_decode(json_encode($fff), true);
echo 'h1 = ' . $array['h1'] . "<br>\n";
echo 'h2 = ' . $array['h2'] . "<br>\n";



//$xmlString = $domDocument->saveXML();
//$xmlObject = simplexml_load_string($xmlString);

// $found_h1 = $xml->xpath("//h2");


var_dump($fff);
echo "<br>\n";
print_r($array);

?>

<p><a href="file.html">ファイル選択</a></p>
</body>
</html>
<?php
/*
$xmlString = $domDocument->saveXML();
$xmlObject = simplexml_load_string($xmlString);
var_dump($xmlObject);
// print_r($xmlObject);

$array = json_decode(json_encode($xmlObject), true);
echo 'h1 = ' . $array['body']['div']['header']['h1'];
*/

/*
$xml = simplexml_import_dom($domDocument);
*/

// $xpath = new DOMXPath($domDocument);
// $found_h1 = $xpath->query('html/body/div/article/h2');

?>