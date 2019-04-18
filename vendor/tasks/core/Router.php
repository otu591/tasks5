<?php
    
    
    namespace tasks;
    
    
    class Router
    {
        protected static $routes=[];//таблица маршрутов  для записи всех маршрутов(route=>controller,method,prefix)
        protected static $route=[];//текущий маршрут(route=>controller,method,prefix) соответствующий из списка $routes
    
        //add($regexp(выражение),$route(controller,method,prefix) обработки выражения)
        public static function add($regexp,$route=[]){
            self::$routes[$regexp]=$route;//$route= controller,method,prefix
        }
    
        public static function getRoutes(){
            return self::$routes;
        }
    
        public static function getRoute(){
            return self::$route;
        }
    
        //Обработка url адрес
        public static function dispatch($url){
        
            //вырезка Get параметров из строки запроса(url)
            $url=self::removeQueryString($url);
        
            if(self::mitchRoute($url)){
            
                //путь к файлу контроллера
                $controller='app\controllers\\'.self::$route['prefix'].self::$route['controller'].'Controller';//+постфикс Контроллера
            
                //создается его ОБЪЕКТ если такой контроллер найден
                if(class_exists($controller)){
                
                    //создается ОБЪЕКТ путьController(c парамеры маршрута)
                    $controllerObject=new $controller(self::$route);
                
                    //(название метода)+постфикс =funcAction
                    $action=self::lowerCamelCasse(self::$route['action']).'Action';
                
                    if(method_exists($controllerObject,$action)){
                    
                        //ВЫЗОВ СООТВЕТСТВУЮЩЕГО МЕТОДА
                        $controllerObject->$action();
                    
                        //ФОРМИРОВАНИЕ,определение файла ВЫЗОВ СООТВЕТСТВУЮЩЕГО ВИДА
                        $controllerObject->getView();
                    }else{
                        throw  new \Exception("Метод $controller::$action не найден",404);
                    }
                
                }else{
                    throw  new \Exception("Контроллер $controller не найден",404);
                }
            }else{
                throw  new \Exception('Страница не найдена',404);
            }
        
        }
    
        //будет принимать url адрес и искать соответствие в таблице маршрутов $routes
        public static function mitchRoute($url){
        
            foreach (self::$routes as $pattern=>$route){
                //                             i-независимость от регистра
                if(preg_match("#{$pattern}#i",$url,$matches)){
                
                    //выборка ассоциативныx значений
                    foreach ($matches as $k=>$val){
                        if(is_string($k)){
                            $route[$k]=$val;
                        }
                    }
                
                    //если ACTION в запросе не определен
                    if(empty($route['action'])){
                        $route['action']='index';//назначается метод index
                    }
                
                    //если PREFIX отсутствует
                    if(!isset($route['prefix'])){
                        $route['prefix']='';//нечего
                    }else{
                        $route['prefix'].='\\';//добавляется "\"
                    }
                
                    //обработка имени Контроллера
                    $route['controller']=self::upperCamelCasse($route['controller']);
                
                    self::$route=$route;//СОХРАНЕНИЕ
                
                    return true;
                }
            }
            return false;
        }
    
        //для определение имени контроллера по стандарту CamelCasse
        public  static function  upperCamelCasse($name){
            return str_replace(' ','',ucwords(str_replace('-',' ',$name)));//asd-asd  на  AsdAsd
        }
    
        //для переопределение имени метода(action) по стандарту сamelCasse
        public static function lowerCamelCasse($name){
            return lcfirst(self::upperCamelCasse($name));//AsdAsd на asdAsd
        }
    
        //вырезка Get параметров из строки запроса(url)= подстройка под правила в routes(^-начало...параметр из символов... $-конец строки
        public static function removeQueryString($url){
            if($url){
                //определяем из запроса только два параметра(все что после ? или & это параметр)
                $params=explode('&',$url,2);
                //если в $params[0] есть '=' то $params[0]=""
                if(strpos($params[0],'=')===false){
                    return rtrim($params[0],'/');//удаляем '/'
                }else{
                    return '';
                }
            }
        }
    
    }