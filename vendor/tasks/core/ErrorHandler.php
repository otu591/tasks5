<?php
    
    
    namespace tasks;
    
    
    class ErrorHandler
    {
        public function __construct(){
            if(DEBUG){
                error_reporting(-1);
            }
            else{
                error_reporting(0);
            }
            set_exception_handler([$this,'exceptionHandler']);//пользовательский обработчик исключений функцией exceptionHandler($ex)-(Exception->базовый класс)
        }
    
        public function exceptionHandler($ex){
//            $this->logErrors($ex->getMessage(),$ex->getFile(),$ex->getLine());
            $this->displayError('исключение',$ex->getMessage(),$ex->getFile(),$ex->getLine(),$ex->getCode());
        }
    
//        protected function logErrors($message='',$file='',$line=''){
//            error_log("[".date('Y-m-d H:i:s')."] Ошибка: {$message} | Файл: {$file} | Строка: {$line}\n========\n",3,ROOT.'/tmp/errors.log');//3 в файл,2 email
//        }
    
        protected function displayError($errnum,$errstr,$errfile,$errline,$response=404){
            http_response_code($response);//отправка заголовка с  кодом
        
            if($response==404 && !DEBUG){
                require WWW.'/errors/404.php';
                die;//END
            }
            if(DEBUG){
                require WWW.'/errors/dev.php';//полная информация ошибки
            }else{
                require WWW.'/errors/prod.php';//узкая информация ошибки
            }
            die;
        
        }
    
    }