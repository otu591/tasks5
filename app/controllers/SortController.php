<?php
    
    
    namespace app\controllers;
    

    class SortController extends AppController
    {
        public function changeAction(){
        
   
            $sort=!empty($_GET['sort']) ? $_GET['sort']:null;
        
            if($sort){
 
                $_SESSION['sort']=$sort;
    
    
            }
       
            redirect();
            exit();
        }
        
    }