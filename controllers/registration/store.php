<?php
use Core\Validator;

$config = require base_path('config.php');
$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if(! Validator::string($_POST['email'], 1, 1000)) {
    $errors['email'] = 'Please provide a valid email address';
}

if(! Validator::string($_POST['password'], 7, 255)) {
    $errors['email'] = 'Please provde a password with at least 7 characters';
}

if(!empty($errors)) {
    return view('registration/create', [
        'errors' => $errors
    ]);
}

$user = db()->query(
    'SELECT * FROM users WHERE email = :email', 
    compact('email')
)->find();


if($user) {
    header('location: /');
    exit();
}

//Hashing the password
$password = password_hash($password, PASSWORD_DEFAULT);

db()->query(
    'INSERT INTO users(email, password) VALUES(:email, :password)',
    compact('email', 'password')
);

login($user);

header('location: /');
exit();
