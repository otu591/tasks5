<?php
    require dirname( __DIR__).'/config/init.php';//
    require LIBS.'/functions.php';//подключение файла со своими функциями
    require  CONF.'/routes.php';//подключение правил
    
    new \tasks\App();//Объект приложения
