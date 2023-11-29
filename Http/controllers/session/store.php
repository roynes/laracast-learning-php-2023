<?php

use Core\Authenticator;
use Http\Form\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

if(
    (new Authenticator)->attempt(
            $attributes['email'], 
            $attributes['password']
)) {
    redirect('/');
}

$form->error(
    'email', 
    'No matching account found or the email and password'
)->throw();
