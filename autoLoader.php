<?php
class autoLoader
{
    private $system_root;

    public function __construct($root)
    {
        // ルートディレクトリの設定
        $this->system_root = $root;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'myLoader'));
    }

    public function myLoader($class)
    {
        // 最初のスラッシュを含めるかどうかは適宜調整(ここでは取り除く)
        $classNamespace = ltrim($class, '\\');
        // バックスラッシュを右に倒してルートと拡張子を結合
        $classFileName = $this->system_root . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classNamespace) . '.php';
        // クラスファイルが存在して読み込めるか確認
        if (is_readable($classFileName)) {
            require_once $classFileName;
            return true;
        } else {
            return false;
        }
    }
}
