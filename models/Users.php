<?php

namespace Models;

class Users
{

    public static function login(string $username, string $password)
    {
        /*
         * Select user by $username and use password_verify to match $password with table password
         * If user exists and password match, insert new session (key should be hash)
         * Create a cookie storing the key and make a session (not db) value storing the user data
         * Return User with user id as first argument
         */
        $stmt = Database::get()->prepare('SELECT * FROM users WHERE username=?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if (empty($user)) {
            return null;
        }
        if (!password_verify($password, $user->password)) {
            return null;
        }
        unset($user->password);
        $key = hash('sha256', bin2hex(random_bytes(32)));
        $stmt = Database::get()->prepare('INSERT INTO sessions(user_id, ip, user_agent, `key`) VALUES(?, ?, ?, ?)');
        if ($stmt->execute([$user->id, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], $key])) {
            $_SESSION['user'] = $user;
            setcookie('terminlister', $key, time() + (60 * 60 * 24 * 7), '/', null, false, true);
        }
    }

    public static function register(string $username, string $password1, string $password2)
    {
        /*
         * Match the passwords, if matching only use $password1 from now on
         * Add restrictions to the password (length, characters, etc)
         * Use password_hash($password1, PASSWORD_DEFAULT)
         * Insert user
         */
        if ($password1 !== $password2) {
            return;
        }
        $password = $password1;
        if (strlen($password) < 8) {
            return;
        }
        Database::get()->prepare('INSERT INTO users(username, password) VALUES(?, ?)')->execute(
            [
                $username,
                password_hash($password, PASSWORD_DEFAULT)
            ]
        );
    }

    public static function online(): bool
    {
        /*
         * Use cookie to select session from db
         * If session exists, continue, if not, return false
         * Match ip and user agent
         * return true
         */
        $stmt = Database::get()->prepare('SELECT user_id, ip, user_agent FROM sessions WHERE `key`=?');
        $stmt->execute([$_COOKIE['terminlister']]);
        $session = $stmt->fetch();
        if ($session->ip === $_SERVER['REMOTE_ADDR'] && $session->user_agent === $_SERVER['HTTP_USER_AGENT']) {
            if (isset($_SESSION['user']) && $_SESSION['user']->id !== $session->user_id) {
                $stmt = Database::get()->prepare('SELECT * FROM users WHERE id=?');
                $stmt->execute([$session->user_id]);
                $user = $stmt->fetch();
                unset($user->password);
                $_SESSION['user'] = $user;
            }
            return true;
        }
        return false;
    }

    public static function logout()
    {
        /*
         * Delete session from database (user_id = $this->id)
         * Delete cookie with key
         * Delete session
         */
        $stmt = Database::get()->prepare('DELETE FROM sessions WHERE `key`=?');
        $stmt->execute([$_COOKIE['terminlister']]);
        setcookie('terminlister', '', time()-3600, '/', null, false, true);
        unset($_SESSION['user']);
    }

}
