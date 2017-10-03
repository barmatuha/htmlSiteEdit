<?php

function showTree($folder) {
    $files = scandir($folder);
    foreach($files as $file) {
        if (($file == '.') || ($file == '..')) continue;
        $f0 = $folder . '/' . $file;
        if (is_dir($f0)) {
            showTree($f0);
        }
        else {
            $type = pathinfo($file, PATHINFO_EXTENSION);
            if ($type == $_POST['type1']) {
                echo $file . "</br>";
                parse($file, $folder);
            }
        }
    }
}

function parse($file, $folder){

    $new = str_replace($_POST['type1'], $_POST['type2'], $file);
    $content = file_get_contents($folder. '/' . $file);
    file_put_contents($folder . '/' . $new, $content);
    unlink( $folder . '/' . $file );
}

showTree("../", "");

?>


