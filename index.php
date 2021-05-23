<?php

//Git hub link https://github.com/rashrest/dating-II

ini_set('display_errors',1);
error_reporting(E_ALL);

//Start a session
session_start();

//require autoload file
require_once('vendor/autoload.php');
require('model/dataval.php');

//Instantiate fat-free
$f3=Base::instance();

//define route before your run fat-free
//define default route
$f3->route('GET /',function (){
    //Display the home page
    $view = new Template();
    echo $view-> render('views/home.html');
});

////define route to personal page
$f3->route('GET|POST /Personal',function ($f3){

    //If the form has been submitted, add the data to session
    //and send the user to the summary page
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //data validation
        if(validName($_POST['name'])){
            $_SESSION['name'] = $_POST['name'];
        }

        else{
            $f3-> set('errors["name"]', 'Please enter a valid first name.');
        }

        if(validName($_POST['lname'])){
            $_SESSION['lname'] = $_POST['lname'];
        }

        else {
            $f3-> set('errors["lname"]', 'Please enter a valid last name.');
        }



        if(validAge($_POST['age'])){
            $_SESSION['age'] = $_POST['age'];
        }
        else if(!validAge($_POST['age'])){
            $f3-> set('errors["agee"]', 'Age should be number and between 18 to 118');
        }

        if(validPhone($_POST['phone'])){
            $_SESSION['phone'] = $_POST['phone'];
        }
        else if(!validPhone($_POST['phone'])) {
            $f3-> set('errors["phone"]', 'Phone value should be numeric and at least 10 digits');
        }



        $_SESSION['gender'] = $_POST['gender'];

    if(empty($f3->get('errors'))){
            header('location: Profile');
        }

    }

    $f3->set('names',$_POST['name']);
    $f3->set('lnames',$_POST['lname']);
    $f3->set('ages',$_POST['age']);
    $f3->set('phones',$_POST['phone']);
    //Display the personal information form
    $view = new Template();
    echo $view-> render('views/personalForm.html');
});

////define route to Profile page
$f3->route('GET|POST /Profile',function (){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seek'] = $_POST['seek'];
        $_SESSION['bio'] = $_POST['bio'];
        header('location: Interest');
    }

    //Display the personal information form
    $view = new Template();
    echo $view-> render('views/profile.html');
});

////define route to interest page
$f3->route('GET|POST /Interest',function (){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['indoor'] = implode(", ", $_POST['indoor']);
        $_SESSION['outdoor'] = implode(", ", $_POST['outdoor']);
        header('location: Summary');
    }

    //Display the personal information form
    $view = new Template();
    echo $view-> render('views/interests.html');
});

////define route to summary page
$f3->route('GET|POST /Summary',function (){


    //Display the personal information form
    $view = new Template();
    echo $view-> render('views/summary.html');
});


//Run Fat-Free /Fat free
$f3->run();