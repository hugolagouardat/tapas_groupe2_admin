<?php
$path="json.json";
$convertedstring = file_get_contents($path);
$testdecode = json_decode($convertedstring,true);
//print_r($testdecode);
foreach ($testdecode as $decoded => $value) {
    echo $decoded+1 .':'." ".$value["type"].'<br/>';
}
?>