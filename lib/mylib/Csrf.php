<?php

//namespace app\core;

class Csrf
{

    const HASH_ALGO = 'sha256';

    public static function generate()
    {
        return hash(self::HASH_ALGO, session_id());
    }

    public static function validate($token)
    {
        $success = "";
        if (isset($token) && self::generate() === $token) {
            $success = true;
        } else {
            $success = false;
        }
        return $success;
    }
}
