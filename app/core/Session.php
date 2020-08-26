<?php

namespace app\core;

class SessionDb
{
    private $SesId;

    function __construct()
    {
        ini_set('session.use_strict_mode', 1); //セッションアダプション対策(デフォルト：0)
        session_start();
        session_regenerate_id(true);
        $this->SesId = session_id();
        $_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR'];
    }

    function ck_ses()
    {
        if ($this->SesId == session_id()) :
            if ($_SESSION['ipaddress'] == $_SERVER['REMOTE_ADDR']) {
                return true;
            }
        endif;
    }

    function exist_ck($key)
    {
        if (@$_SESSION[$key] == "") :
            return true;
        endif;
    }

    function set($key, $value)
    {
        if ($this->ck_ses())
            $_SESSION[$key] = $value;
    }

    function get($key)
    {
        if ($this->ck_ses())
            return $_SESSION[$key];
    }

    function del()
    {
        session_destroy();
        session_unset();
        //setcookie(session_name(), '', time() - 3600, "/");
    }

    function find($keys, $find)
    {
        if ($this->ck_ses())
            $data = $_SESSION[$keys];

        foreach ($data as $key => $value) {
            if ($find == $value) return true;
        }
    }

    function __destruct()
    {
    }
}
