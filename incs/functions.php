<?php


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function countprotocol($data,$protocols){

    $protocol = explode(':', $data['_source']['layers']['frame']['frame.protocols']);
    $protocol = end($protocol);

    if (isset($protocols[$protocol])) { $protocols[$protocol] ++ ; }
    else { $protocols[$protocol] = 1 ; }
    return $protocols;
}



function is_Logged () {
    if(!empty($_SESSION['user']) &&
        !empty($_SESSION['user']['id']) &&
        !empty($_SESSION['user']['email']) &&
        !empty($_SESSION['user']['ip'])) {
        if($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
            return true;
        }
    } else {
        return false;
    }
}