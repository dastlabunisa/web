<?php
$xml=simplexml_load_file("news.xml") or die("Error: Cannot create object");
$json = json_encode($xml);
echo $json;
?>