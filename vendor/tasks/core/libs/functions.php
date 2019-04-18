<?php
    function debug($arr){
        echo '<pre>'.print_r($arr,true).'</pre>';
    }
    
    function redirect($http=false){
        
        if($http){
            //редирект по  адресу
            $redirect=$http;
        }else{
            //редирект на предыдущую  страницу иначе на главную
            $redirect=isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        //функция header( REDIRECT  по сформированному адресу)
        header("Location: {$redirect}");
        exit();
    }
    
    function s_html($str){
        return  htmlspecialchars($str,ENT_QUOTES);
    }
