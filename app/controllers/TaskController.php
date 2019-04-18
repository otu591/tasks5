<?php
    
    
    namespace app\controllers;
    
    
    use app\models\Task;
    use RedBeanPHP\R;

    class TaskController  extends AppController
    {
        public function deleteAction(){

            $id=!empty($_GET['id'])? $_GET['id']: null;
            if($id){
                $rec = R::load('tasks', $id);
                if(!empty($rec )){
                    R::trash($rec);
                }
            }

           
           die;
        }
        public function editAction(){
         
            if(!empty($_POST)){
                $data=$_POST;

                if($data['id']) {
                    $rec = R::load('tasks', $data['id']);
                    $rec->text = $data['text'];
                    $rec->status = $data['status']=='true' ? 1 : 0;
                    R::store($rec);
                    $_SESSION['success']='Изменения сохранены!';
                }
 
            }
            die;

        }
        public function addAction(){
    
            if(!empty($_POST)) {

                $task = new Task();
                $data = $_POST;
                $data['id_user']=isset($_SESSION['user']) ? (int) $_SESSION['user']['id']:1;
               

                $task->load($data);

                if ($task->save('tasks')){
        
                    $_SESSION['success']='Запись добавлена!';
        
                }else{
                    $_SESSION['error']='Ошибка!';
                }
            }
            redirect();
        }
    }
