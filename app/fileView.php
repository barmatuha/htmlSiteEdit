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
            if ($type == 'html') {
                parse($file, $folder);
            }
        }
    }
}

?>