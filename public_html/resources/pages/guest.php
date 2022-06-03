<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Панель администирования</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body class="bg-light">

    <div class="container" style="margin-top: 100px;">
        <div class="col-md-6 offset-md-3">

            <?php if(isset($_SESSION["error"])): ?>
                <div class="alert alert-danger"><?=$_SESSION["error"];?></div>
            <?php unset($_SESSION["error"]); endif; ?>

            <div class="bg-white rounded border shadow-sm p-4">
                <h5>Вход в панель администрирования</h5><hr />
                <form action="/auth" method="post">
                    <div class="form-group">
                        <label>Логин</label>
                        <input type="text" name="login" class="form-control" placeholder="Логин" required>
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                </form>                
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

