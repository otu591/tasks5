<?php
    
    
    namespace tasks;
    
    class App
    {
        public static $app;
    
        public function __construct()
        {
           
            $query=trim($_SERVER['QUERY_STRING'],'/');
        
            session_start();
        
           
            self::$app=Registry::instance();
        
            $this->setParams();
          
            new ErrorHandler();
        
            
            Router::dispatch($query);
        }
    
        protected function setParams()
        {
            $params=require_once CONF.'/params.php';
        
            if (!empty($params)){
                foreach ($params as $k=>$param){
                    self::$app->setProperty($k,$param);
                }
            }
        }
    
    }