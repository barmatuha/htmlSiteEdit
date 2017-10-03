<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';

function parse($file, $folder){

    $html = file_get_contents($folder . '/' . $file);
    $html = html_entity_decode($html);
    file_put_contents($folder . '/' . $file, $html);
    $checks = file('clearUrl.txt');

    $data = file_get_html($folder . '/' . $file);

    if (!empty($data)) {
        foreach ($data->find('a') as $item) {
            foreach ($checks as $ch)
                if ($item->href == trim($ch)){
                    $item->href = "#";
                }
        }

        file_put_contents($folder . '/' . $file, $data);
        $data->clear();
        unset($data);
    }
}

if ($_POST['urls'] != ''){
    file_put_contents('urls.txt', $_POST['urls']);
}

$cheks = file('urls.txt');
$urlOld = $_POST['urlOld'];
$urlNew = $_POST['urlNew'];

$clear_checks[] = '';

foreach ($cheks as $item){
    $item = str_replace( $urlOld , $urlNew, $item );
    array_push( $clear_checks, $item );
}

file_put_contents('clearUrl.txt', $clear_checks);

showTree("../", $clear_checks);

?>