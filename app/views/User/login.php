<div class="my-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="card">Вход</h3>
                <div class="card-body">
                    <form method="post" action="user/login">
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control" name="login" placeholder=""   required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Login </button>
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
