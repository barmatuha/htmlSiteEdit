<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';

function parse($file, $folder){

    $html = file_get_contents($folder . '/' . $file);
    $html = html_entity_decode($html);
    file_put_contents($folder . '/' . $file, $html);
    $checks = file('clearImg.txt');
    $data = file_get_html($folder . '/' . $file);

    if (!empty($data)) {
        foreach ($data->find('img') as $item) {
            foreach ($checks as $ch)
                if ($item->src == trim($ch)){
                    $item->outertext = '';
                }
        }

        file_put_contents($folder . '/' . $file, $data);
        $data->clear();
        unset($data);
    }
}

if ($_POST['imgs'] != ''){
    file_put_contents('imgs.txt', $_POST['imgs']);
}

$checks = file('imgs.txt');
$urlOld = $_POST['imgOld'];
$urlNew = $_POST['imgNew'];

$clear_checks[] = '';

foreach ($checks as $item){
    $item = str_replace( $urlOld , $urlNew, $item );
    array_push( $clear_checks, $item );
}

file_put_contents('clearImg.txt', $clear_checks);

showTree("../", $clear_checks);

?>