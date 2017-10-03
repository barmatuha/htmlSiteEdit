<?php

require_once 'fileView.php';

function parse($file, $folder){

    if ( $file != 'index.html' ){
        rename($folder . '/' . $file, '../../' . $file);
    }
}

showTree("../", "");

