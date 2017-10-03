<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';

function parse($file, $folder){

    $teg = $_POST['teg'];
    $data = file_get_html($folder . '/' . $file);

    if (!empty($data)) {
        foreach ($data->find($teg) as $item) {
            $item->outertext = '';
        }

        file_put_contents($folder . '/' . $file, $data);

        $data->clear();
        unset($data);
    }
}

showTree("../", "");