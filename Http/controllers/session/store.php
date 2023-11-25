<?php
use Core\Validator;
use Core\Authenticator;
use Http\Form\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;

if($form->validate($email, $password)) {
    if((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    
    $form->error('email', 'No matching account found or the email and password');
}

return view('session/create', [
    'errors' => $form->errors()
]);
