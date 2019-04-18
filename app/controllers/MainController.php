<?php
    
    
    namespace app\controllers;


    use RedBeanPHP\R;
    use tasks\App;
    use tasks\libs\Pagination;

    class MainController extends AppController
    {
    
    
        public function indexAction(){

            
            //сортировка
            $key = isset($_SESSION['sort']) ? $_SESSION['sort']:"status";
            
            //Пагинация
            $page=isset($_GET['page']) ? (int)$_GET['page'] : 1;//номер текущей  страницы
           
            $perpage=App::$app->getProperty('pagination');//количество товаров на страницу
           
            $total=R::count('tasks');
           
         
            $pagination=new Pagination($page,$perpage,$total);
            
            $start=$pagination->getStart();
 
            $tasks=R::getAssoc("SELECT id, name,email,id_user, text, status FROM tasks ORDER BY $key DESC  LIMIT $start,$perpage");

            $users=R::getAssoc("SELECT * FROM users");
            
        
    
            $this->setData(compact('tasks','users','pagination'));


        
        }
    
    }