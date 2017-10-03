<?php
require_once 'fileView.php';

function parse($file, $folder){
    $head = file_get_contents($folder . '/' . $file);
    $head = str_replace('<head', '<head><meta charset="utf-8"', $head);
    file_put_contents($folder . '/' . $file, $head);
}

showTree("../", "");