<?php

function check_session(){
    if(!isset($_SESSION['__USUARIO_LOGADO__']) || empty($_SESSION['__USUARIO_LOGADO__'])  ){
        redirect('/login/');
    }
}