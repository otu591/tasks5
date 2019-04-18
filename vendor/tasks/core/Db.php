<?php
    
    
    namespace tasks;

    use \RedBeanPHP\R;
  
    class Db
    {
        use TSingletone;
        private function __construct()
        {
            $db=require_once CONF.'/config_db.php';//массив с настройками
            
            //Подключение к БД
            R::setup($db['dsn'],$db['user'],$db['password']);
            if(!R::testConnection()){
                throw new \Exception('Нет соеденения с БД',500);
            }
            
            //Запрет изменеие структуты БД("на лету")
            R::freeze(true);
            
            if(DEBUG){
                R::debug(true,1);//включается режим отладки
            }
            
        }
        
        
    }