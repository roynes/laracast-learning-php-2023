<?php

namespace Core\Form;

interface Contract {
    public static function validate($attributes);
    public function errors();
    public function error($field, $message);
}