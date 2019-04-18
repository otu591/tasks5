<?php
    
    
    namespace tasks;
    
    
    class Registry
    {
        use TSingletone;//объект  создается  если отсутствует

        private static $properties=[];
    
        public function getProperty($name)
        {
            if(isset(self::$properties[$name])) {
            
                return self::$properties[$name];
            }
            return null;
        }
    
        public function setProperty($name,$value)
        {
            self::$properties[$name] = $value;
        }
    
        public function getProperties()
        {
        
            return self::$properties;
        }
    }