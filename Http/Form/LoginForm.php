<?php

namespace Http\Form;

use Core\Form\Contract as FormContract;
use Core\Validator;

class LoginForm implements FormContract{
    protected $errors = [];

    public function validate($email, $password): bool {
        if(! Validator::string($_POST['email'], 1, 1000)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }
        
        if(! Validator::string($_POST['password'])) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;
    }
}