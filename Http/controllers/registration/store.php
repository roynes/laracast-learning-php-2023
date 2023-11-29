<?php
use Http\Form\RegistrationForm;

$email = $_POST['email'];
$password = $_POST['password'];

if(! RegistrationForm::validate($email, $password)) {
    return view('registration/create', [
        'errors' => $form->errors()
    ]);
}

$user = db()->query(
    'SELECT * FROM users WHERE email = :email', 
    compact('email')
)->find();


if($user) {
    redirect('/');
}

//Hashing the password
$password = password_hash($password, PASSWORD_DEFAULT);

db()->query(
    'INSERT INTO users(email, password) VALUES(:email, :password)',
    compact('email', 'password')
);

login($user);

redirect('/');
