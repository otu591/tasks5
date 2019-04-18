<?php
    
    
    namespace tasks\base;

    use tasks\Db;
    use RedBeanPHP\R;
  //  use Valitron\Validator;

    abstract class Model
    {
        public $attributes=[];
        public $errors=[];

    
        public function __construct()
        {
            Db::instance();
        }
    
        public  function load($data){
        

            foreach ($this->attributes as $key=>$value){
   
                if(isset($data[$key])){
                    $this->attributes[$key]=$data[$key];
                }
            }
        
        }
    
     
    
        public function getErrors(){
            $errors='<ul>';
            foreach ($this->errors as $error){
                foreach ($error as $item){
                    $errors.='<li>'.$item.'</li>';
                }
            }
            $errors.='</ul>';
            $_SESSION['error']=$errors;
        }
    
        public function save($table){

            $bean=R::dispense($table);
       
            foreach ($this->attributes as $key=>$value){
    
                $bean->$key=$value;
            }

            return R::store($bean);
        }
    
    }