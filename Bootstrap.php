<?php

// ルートディレクトリ
$root = __DIR__;
// オートローダ読み込み
// これだけはrequireしなければいけない
require_once $root . '/autoLoader.php';
$autoloader = new autoLoader($root);
$autoloader->register();
