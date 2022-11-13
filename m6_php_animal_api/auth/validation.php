<?php
session_start();
include "../functions.php";

$_SESSION['error'] = null;


if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) 
    die("You are a bad guy and you are trying to access this code directly!");

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';


if (!empty($email) && !empty($password)) {

    $valid_user = null;

    $users = file_get_contents('../api_data/users.json'); 
    $users = json_decode($users); 
   
    foreach ($users as $user) {
       
        if ($email == $user->email) {
            $valid_user = $user; 
            break; 
        }
    }

    if (!empty($valid_user)) {
        if ($password != $valid_user->password) {
            $error_msg = "Incorrect email or password";
            $error = true;
        }
    } else {
        $error_msg = "Incorrect email or password";
        $error = true;
    }
} else {
    $error_msg = "Please fillout the required information";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    animal_redirect("../");
} else {
    $_SESSION['user'] = array(
        'display_name' => $valid_user->display_name
    );
    animal_redirect("../home.php");
}