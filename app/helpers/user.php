<?php

function random_password($encrypt = false, $lenght = 4){
    $bytes = openssl_random_pseudo_bytes($lenght);
    $pass = bin2hex($bytes);

    if($encrypt)
        return bcrypt($pass);

    return $pass;
}
