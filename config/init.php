<?php
    define("DEBUG",1);//режим отладки
    define("ROOT",dirname(__DIR__));//корень
    define("WWW",ROOT.'/public');//публичная папка
    define("APP",ROOT.'/app');
    define("CORE",ROOT.'/vendor/tasks/core');//ядро
    define("LIBS",ROOT.'/vendor/tasks/core/libs');
    define("CACHE",ROOT.'/tmp/cache');
    define("CONF",ROOT.'/config');
    define("LAYOUT",'tasks');//название шаблона главной страницы
    
    //определение URL  главной страницы
    $app_path="http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
    $app_path= preg_replace("#[^/]+$#",'',$app_path);
    $app_path= str_replace('/public/','',$app_path);
    define("PATH",$app_path);
    define("ADMIN",PATH.'/admin');
    

    require_once ROOT.'/vendor/autoload.php';