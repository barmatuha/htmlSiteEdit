<?php

require_once 'fileView.php';
include 'simple_html_dom.php';

function parse( $file, $folder ){

    $data = file_get_html( $folder . '/' . $file );
    if (!empty($data)) {
        if ($_POST['dash'] == 'urlA') {
            foreach ($data->find('a') as $a) {
                $a->href = str_replace('-', '_', $a->href);
            }
        }
        if ($_POST['dash'] == 'urlB') {
            foreach ($data->find('a') as $a) {
                $a->href = str_replace('_', '-', $a->href);
            }
        }
        file_put_contents( $folder . '/' . $file, $data );
        $data->clear();
        unset($data);
    }
}

showTree("../", "");