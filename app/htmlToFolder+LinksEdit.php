<?php

require_once 'simple_html_dom.php';
require_once 'fileView.php';

function parse($file, $folder){

    $pathEdit = $_POST['pathEdit'];

    $data = file_get_html($folder . '/' . $file);
    if (!empty($data)) {
        foreach ($data->find('img') as $img) {
            $img->src = '../' . $img->src;
        }
        foreach ($data->find('link') as $link) {
            $link->href = '../' . $link->href;
        }
        foreach ($data->find('a') as $a) {
            $a->href = $pathEdit . str_replace('.html', '/', $a->href);
        }
        foreach ($data->find('script') as $scr) {
            $scr->src = '../' . $scr->src;
        }

        if ($file != 'index.html') {
            $new = str_replace('.html', '', $file);
            mkdir('../' . $new);
            file_put_contents('../../' . $new . '/index.html', $data);
            unlink($folder . '/' . $file);
        }

        $data->clear();
        unset($data);
    }
}


showTree("../", "");