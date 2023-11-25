<?php

namespace Core\Form;

interface Contract {
    public function validate($email, $password): bool;
    public function errors();
    public function error($field, $message);
}