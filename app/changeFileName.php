<?php

require_once 'fileView.php';

function parse($file, $folder){

    if ($_POST['fileName'] == 'fileNameA')
        $new = str_replace( '-', '_', $file );

    if ($_POST['fileName'] == 'fileNameB')
        $new = str_replace( '_', '-', $file );

        rename( $folder . '/' . $file, $folder . '/' . $new );

}

showTree("../", "");