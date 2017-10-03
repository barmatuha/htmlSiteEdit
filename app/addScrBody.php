<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';

function parse($file, $folder){

    $scr = $_POST['scr'];
    $data = file_get_html($folder . '/' . $file);
    foreach($data->find('body') as $body){
        $body->innertext = $body->innertext . $scr;
    }
    file_put_contents($folder . '/' . $file, $data);

    $data->clear();
    unset( $data );
}

showTree("../", "");
