<?php
//シンボリックリンクのパスからrequire_onceしている。webrootから初めたい場合htaccessとパス書き換え
require_once 'Bootstrap.php';
//require_once 'app/controller/Controller.php';

require_once 'routes/web.php';




//var_dump(symlink('index.php', __DIR__ . '/../index.php'));
