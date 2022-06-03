
<div class="f-title text-center"><h3 class="title text-uppercase">Авторизация</h3></div>
<? if(isset($_SESSION["error"])): ?>
<div class="alert alert-danger" role="alert">
  <?=$_SESSION["error"];?>
</div>
<? unset($_SESSION["error"]); endif; ?>
<form method="post">
  <div class="form-group">
    <label>Логин</label>
    <input type="text" name="login" class="form-control" placeholder="Логин">
  </div>
  <div class="form-group">
    <label>Пароль</label>
    <input type="password" name="password" class="form-control" placeholder="Пароль">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>