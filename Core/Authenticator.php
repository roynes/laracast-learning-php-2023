<?php

namespace Core;

class Authenticator {
    public function attempt($email, $password) {
        $user = db()->query(
            'SELECT * FROM users WHERE email = :email', 
            compact('email')
        )->find();
        
        if($user) {
            if(password_verify($password, $user['password'])) {
                $this->login($user);
 
                return true;
            }
        }

        return false;
    }

    public function login($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];
    
        session_regenerate_id(true);
    }

    public function logout() {
        $_SESSION = null;
        session_destroy();
    
        $params = session_get_cookie_params();
        setcookie(
            'PHPSESSID', 
            '', 
            time() - 3600, 
            $params['path'], 
            $params['domain'], 
            $params['secure'], 
            $params['httponly']
        );
    }
}