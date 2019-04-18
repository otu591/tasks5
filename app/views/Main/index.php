<div class="prdt">
    <div class="container">
    
        <div class="prdt-top">
            
            <div class="col-md-12">
                
                <div id="tasks">

                    
                    
                          <form>
                               <table class="table table-hover table-striped">
                                   <thead>
                                        <tr>
                                            <th>Задача</th>
                                            <th>Имя</th>
                                            <th>E-mail</th>

                                            <th>Статус</th>
                                            <?php if(!empty($_SESSION['user'])):?>
                                            <th><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></th>
                                            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                            <?php endif;?>
                                        </tr>
                                   </thead>
                                   <tbody>
                                    <?php foreach ($tasks as $id=>$task):?>

                                        <tr>
                                            <td id="task<?=$id;?>" contentEditable = true><?=$task['text'];?></td>
                                            <td width="200"><?=$task['name'];?></td>
                                            <td width="200"><?=$task['email'];?></td>

                                            
                                            <?php if(!empty($_SESSION['user'])):?>
                                                <td width="100"><input id = "check<?=$id;?>" type="checkbox" <?=$task['status'] ? 'checked':'';?>/></td>
                                                <td><span data-id="<?=$id;?>" class="edit-item glyphicon glyphicon-edit text-info " aria-hidden="true"></span></td>
                                                <td><span data-id="<?=$id;?>" class="del-item glyphicon glyphicon-remove text-danger " aria-hidden="true"></span></td>
                                            <?php else:?>
                                                <td width="100"><?=$task['status'];?></td>
                                            <?php endif;?>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                               </table>
                          </form>
    
                    <br><br>
                    <div class="clearfix"></div>
    
                    <div class="text-center">
                       
                        <?php if ($pagination->countPages>1):?>
                            <?=$pagination;?>
                        <?php endif;?>
                    </div>
                    <br><br>
                        <form action="task/add" method="post">
                            
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <p>E-mail</p>
                                    <input type="email" id="name" class="form-control" name="email" required ></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <p>Имя</p>
                                    <input type="text" id="name" class="form-control" name="name" required></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <p>Задача</p>
                                    <textarea id="tasks" rows="3" class="form-control" name="text" required></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-primary" >
                                    Добавить
                                </button>
                            </div>
                        </form>

                </div>
            </div>
            
        </div>
        
    </div>
    
</div>