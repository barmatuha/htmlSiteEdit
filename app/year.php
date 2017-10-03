<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';


function parse($file, $folder){

    $data = file_get_html($folder . '/' . $file);
    if (!empty($data)) {
        $curYear = $_POST['curYear'];
        $corrYear = $_POST['corrYear'];
        $textcontainer = $_POST['folder'];

        foreach ($data->find($textcontainer) as $item) {
            $item->outertext = str_replace($curYear, $corrYear, $item->outertext);
        }

        file_put_contents($folder . '/' . $file, $data);
    }
}

showTree("../", "");