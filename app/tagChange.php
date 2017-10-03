<?php
require_once 'fileView.php';
require_once 'simple_html_dom.php';


function parse($file, $folder){

    $data = file_get_html($folder . '/' . $file);
    if (!empty($data)) {
        $value = $_POST['value'];
        $newValue = $_POST['newValue'];
        $tags = $_POST['tags'];
        $attribute = $_POST['attribute'];

        foreach ($data->find($tags) as $item) {
                if ($item->$attribute === trim($value)) {
                    $item->$attribute = str_replace(trim($value), trim($newValue), $item->$attribute);
                }
        }
        file_put_contents($folder . '/' . $file, $data);
    }
}

showTree("../", "");