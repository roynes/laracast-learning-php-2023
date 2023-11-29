<?php

namespace Http\Form;

use Core\Form\Contract as FormContract;
use Core\ValidationException;
use Core\Validator;

class RegistrationForm implements FormContract{
    protected $errors = [];

    public function __construct($attributes)
    {
        if(! Validator::string($attributes['email'], 1, 1000)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }
        
        if(! Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return empty($this->errors);
    }

    public static function validate($attributes) 
    {
        $instance = new static($attributes);

        if($instance->failed()) {
            throw new ValidationException();
        }

        return $instance;
    }

    public function failed()
    {
        return count($this->errors());
    }

    public function errors() 
    {
        return $this->errors;
    }

    public function error($field, $message) 
    {
        $this->errors[$field] = $message;
    }
}