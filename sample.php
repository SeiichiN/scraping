<?php
$dom = new DOMDocument();
$dom->loadHTML(mb_convert_encoding('<h1>2015.12.9</h1><h2>サンプルページを更新しました。</h2>', 'HTML-ENTITIES', 'UTF-8'));
$xml = $dom->saveXML();
$res = json_decode(json_encode(simplexml_load_string($xml)), true);
?>
<html><body>
<p>h1 => <?php echo $res['body']['h1'], "\n"; ?></p>
<p>h2 => <?php echo $res['body']['h2'], "\n"; ?></p>
</body></html>
