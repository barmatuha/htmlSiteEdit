<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';


function parse($file, $folder){

    $data = file_get_contents($folder . '/' . $file);
    if (!empty($data)) {
        $pos = strpos($data, '<');
        $data = substr($data, $pos);
        file_put_contents($folder . '/' . $file, $data);
    }
}

showTree("../", "");