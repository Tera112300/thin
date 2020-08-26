<?php

namespace app\link;


class Link
{
    public static function current_url($dirs = '')
    {
        $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . strtok($_SERVER["REQUEST_URI"], '?') . $dirs;
        echo $url;
        //echo str_replace('/index.php', '', $url);
        //return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . $dirs;
    }
    public static function url($dirs = '')
    {
        //return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . dirname($_SERVER['SCRIPT_NAME']) . $dirs;
        echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . dirname($_SERVER['SCRIPT_NAME']) . $dirs;
    }
    public static function asset($dirs = '')
    {
        //return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . dirname($_SERVER['SCRIPT_NAME']) . $dirs;
        echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . dirname($_SERVER['SCRIPT_NAME']) . '/public/' . $dirs;
    }
}
