<?php

function validName($name){
    return ((preg_match('/^[a-zA-Z]/', $name) && strlen(trim($name))>=2));
}

function validAge($age){
    return ((is_numeric($age)) && ($age>=18 && $age<=118));
}

function validPhone($phone){
    return (is_numeric($phone) && strlen(trim($phone))>=10);
}



