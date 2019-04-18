<main class="my-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="card">Регистрация</h3>
                <div class="card-body">
                    <form role="form" action="user/signup" id="signup" method="post" data-toggle="validator">
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="login" id="login" placeholder="User" value="<?=isset($_SESSION['form_data']['login']) ?  s_html($_SESSION['form_data']['login']) : '';?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                            <div class="col-md-6">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Е-Майл" value="<?=isset($_SESSION['form_data']['email']) ?  s_html($_SESSION['form_data']['email']) : '';?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Имя" value="<?=isset($_SESSION['form_data']['name']) ?  s_html($_SESSION['form_data']['name']) : '';?>" required>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" placeholder="" value="<?=isset($_SESSION['form_data']['password']) ?  s_html($_SESSION['form_data']['password']) : '';?>"  required>
                            </div>
                        </div>
                        
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" >
                                Register
                            </button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data']))unset($_SESSION['form_data']);?>
                </div>
            </div>
        </div>
    </div>
</main>
