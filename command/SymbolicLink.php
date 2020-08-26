<?php
class SymbolicLink
{
    public static $target;
    public static $link;
    public static function index($parameter01 = __DIR__ . '/../webroot/index.php', $parameter02 = __DIR__ . '/../index.php')
    {
        self::$target = $parameter01;
        self::$link = $parameter02;
        if (is_link(self::$link)) {
            return readlink(self::$link);
        } else {
            return symlink(self::$target, self::$link);
        }
    }
}
