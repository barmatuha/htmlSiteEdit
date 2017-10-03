<?php

require_once 'fileView.php';
require_once 'simple_html_dom.php';

function parse($file, $folder){

    $teg = $_POST['teg'];
    $det = $_POST['det'];
    $nam = $_POST['nam'];
    $data = file_get_html($folder . '/' . $file);

    if (!empty($data)) {
        foreach ($data->find($teg) as $item) {
            if (($nam != '') && (trim($item->$det) == trim($nam))) {
                $item->outertext = '';
            }
        }

    file_put_contents($folder . '/' . $file, $data);
    $data->clear();
    unset($data);
    }
}

showTree("../", "");