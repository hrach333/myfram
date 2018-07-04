<form action="/user/signup/" method="post">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" placeholder="Enter login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label class="form-check-label" for="email">Email</label>
        <input type="text" class="form-control" id="email"  placeholder="Enter email" name="email" value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>">
    </div>
    <div class="form-group">
        <label class="form-check-label" for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Зарегистрироватся">
</form>

<? if(isset($_SESSION['form_data'])) $_SESSION['form_data'] = null;