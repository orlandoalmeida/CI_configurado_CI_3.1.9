<?php

function upload_files($path = 'img/')
{
    $field_name = key($_FILES);

    $cpt = count($_FILES[$field_name]['name']);
    for ($i = 0; $i < $cpt; $i++) {
        unset($config);
        $config = array();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '5000';
        $config['overwrite'] = FALSE;

        // Create a new 'f' element of the $_FILES object, and assign the name, type, tmp_name, error, and size properties to the corresponding 'userfile' of this iteration of the FOR loop.

        // Dar explode no nome e pegar a extensao para renomear o arquivo
        $_FILES['f']['name'] = $_FILES[$field_name]['name'][$i];
        $_FILES['f']['type'] = $_FILES[$field_name]['type'][$i];
        $_FILES['f']['tmp_name'] = $_FILES[$field_name]['tmp_name'][$i];
        $_FILES['f']['error'] = $_FILES[$field_name]['error'][$i];
        $_FILES['f']['size'] = $_FILES[$field_name]['size'][$i];

        $ci = & get_instance();
        $ci->load->library('upload', $config);
        $ci->upload->initialize($config);
        if (!$ci->upload->do_upload('f')) {
            echo '<pre>';
            print_r($ci->upload->display_errors());
            echo '</pre>';
            exit;
        } else {
            $data[] = $_FILES['f']['name'];
        }
    }
    return $data;
}

function upload_file($path = 'img/', $field_name)
{
    $config = array();
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|pdf';
    $config['max_size'] = '5000';
    $config['overwrite'] = TRUE;

    $ci = & get_instance();
    $ci->load->library('upload', $config);
    $ci->upload->initialize($config);
    if (!$ci->upload->do_upload("$field_name")) {
        echo '<pre>';
        print_r($ci->upload->display_errors());
        echo '</pre>';
        exit;
    } else {
        $data = $_FILES["$field_name"]['name'];
        return $data;
    }
}