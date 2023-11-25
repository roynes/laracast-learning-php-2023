<?php
use Core\Validator;

$config = require base_path('config.php');
$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if(! Validator::string($_POST['email'], 1, 1000)) {
    $errors['email'] = 'Please provide a valid email address';
}

if(! Validator::string($_POST['password'])) {
    $errors['email'] = 'Please provide a valid password';
}

if(!empty($errors)) {
    return view('sessions/create', compact('errors'));
}

$user = db()->query(
    'SELECT * FROM users WHERE email = :email', 
    compact('email')
)->find();

if($user) {
    if(password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

return view('sessions/create', [
    'errors' => [
        'email' => 'No matching account found or the email and password'
    ]
]);
