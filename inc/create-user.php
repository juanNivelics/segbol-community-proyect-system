<?php
function user_create($user,$email,$pasword,$name){
    $user_id = username_exists($email);
    if ($user_id) {
        echo 'El usuario Existe';
    }else{

    }
    return $id_user;
}