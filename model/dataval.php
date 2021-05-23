<?php
require ('model/data-layer.php');

//validate first name and last name
function validName($name){
    return ((preg_match('/^[a-zA-Z]/', $name) && strlen(trim($name))>=2));
}

//validate user ages
function validAge($age){
    return ((is_numeric($age)) && ($age>=18 && $age<=118));
}

//validate the phone number provided to see if it is true or not
function validPhone($phone){
    return (is_numeric($phone) && strlen(trim($phone))>=10);
}

//validate the user email
function validEmail($email){
 return (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email));
}

//prevents from spoofing
function validOutdoor($interest){
    $validValues=Datalayer::getOutdoor();

    //making sure each selected value is valid
    foreach ($interest as $userChoice){
        if(!in_array($userChoice, $validValues)){
            return false;
        }
    }


}

//prevents from spoofing
function validIndoor($interest){

    $validValues=Datalayer::getIndoor();

    //making sure each selected value is valid
    foreach ($interest as $userChoice){
        if(!in_array($userChoice, $validValues)){
            return false;
        }
    }

}

