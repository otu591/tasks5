
<!DOCTYPE html>
<html>
<head>
    <base href="<?= PATH ;?>/">
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
    
    
    
    <link href="public/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    
    <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css"  />
    <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    
    
    <script src="twbs/bootstrap/dist/js/bootstrap.js"></script>
    

    <script>
        window.Tether = {};
    </script>

</head>

<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box1">
                        <div class="btn-group">
                            <a class="dropdown-toggle" data-toggle="dropdown" style="color: white;cursor: pointer">Account</a>
                            <ul  class="dropdown-menu">
                                <?php if(!empty($_SESSION['user'])):?>
                                    <li><a href="#"><?=s_html($_SESSION['user']['name']);?></a> </li>
                                    <li><a href="user/logout">Выход</a></li>
                                <?php else:?>
                                    <li><a href="user/login">Вход</a></li>
                                    <li><a href="user/signup">Регистрация</a></li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                    
                    </div>
                    <div class="clearfix"></div>

            </div>
 
        </div>
    
    </div>
</div>

<div class="logo">
    <a href="<?= PATH?>"><h1>Задачник</h1></a>
</div>

<div class="content">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error'])):?>
                    <div class="alert alert-danger">
                        <?php  echo  $_SESSION['error'];unset($_SESSION['error']);?>
                    </div>
                <?php endif;?>
                
                <?php if(isset($_SESSION['success'])):?>
                    <div class="alert alert-success">
                        <?php  echo  $_SESSION['success'];unset($_SESSION['success']);?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="box">
        <select id="sort" tabindex="4" class="dropdown drop">
            
            <option value="" class="label">Сортировать по: <?=isset($_SESSION['sort']) ? $_SESSION['sort']:'status';?> :</option>
            <option value="name">Имя</option>
            <option value="email">Е-маил</option>
            <option value="status">Статус</option>
        
        </select>
    </div>
    <?= $content ?>
</div>
</div>

<div class="footer">
    <div class="container">
        <div class="footer-top">
           
            <div class="col-md-6 footer-right">
                <p>© 2019 All Rights Reserved | Дизайн  <a href="<?=PATH?>" target="_blank">Задачник</a> </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->


<!--**********Variables***********-->
<script>

    var path='<?=PATH ;?>';
    
</script>

<!--SCRIPT-->

<script src="js/main.js"></script>

</body>


</html>

<!-- FlexSlider -->


