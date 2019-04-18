<?php
    
    
    namespace app\models;
    
    
    class Task extends AppModel
    {
        public $attributes=[
            'text'=>'',
            'id_user'=>'',
            'status'=>'',
            'email'=>'',
            'name'=>'',
           
        ];
        
    }