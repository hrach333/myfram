<h1>Login</h1>
<form action="/user/login/" method="post">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" placeholder="Enter login" value="">
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
    </div>

    <input type="submit" class="btn btn-primary" value="Войти">
</form>
<?=debug($_SESSION);?>
<? if(isset($_SESSION['form_data'])) $_SESSION['form_data'] = null;
