<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 11/11/2017
 * Time: 22:21
 */

function remove_spaces($var){
    return trim(ltrim(rtrim(trim($var))));
}

// Pega a o parametro passado na URL ex editar/1
function get_param($param){
    $ci =& get_instance();
    return $ci->uri->segment($param+1);
}

// adiciona barra inversa a uma string
function slash($value){
    foreach ($value as $k => $v){
        $value[$k] = addslashes($value[$k]);
    }
    return $value;
}

// remove tags HTML
function strip($value){
    foreach ($value as $k => $v){
        $value[$k] = strip_tags($value[$k]);
    }
    return $value;
}

// remove tags HTML e adiciona barra inversa a uma string
function antiSQL($value){
    foreach ($value as $k => $v){
        $value[$k] = strip_tags(addslashes($value[$k]));
    }
    return $value;
}

// recebe uma string e a quantidade de casas a serem exibidas
function cut($string, $num){
    return substr($string, 0, $num);
}