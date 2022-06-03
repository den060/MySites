<?php 
  require "db.php"; 
  session_start();
  $fars = "";
  $data = $_POST;
  if( isset($data['do_login']))
  {
    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['login']));

    if( $user )
    {
      // логин сещуствует
      if( password_verify($data['password'], $user->password)) 
     { 
      //проверку прошёл, логиним
      $_SESSION['logged_user'] = $user;
      $_SESSION['Name_user'] = $data['login'];
      $fars = "Вы успешно авторизованы<br>
      Можете перейти на <a href='/main'>ГЛАВНУЮ</a> страницу!";
      header('Location: /main');

     } else
      {
        $errors[] = 'Неверно введён пароль!';
      }
    }else
    {
      $errors[] = 'Пользователь с таким логином не найден!';
    }

    if( ! empty($errors))
{

   $fars=array_shift($errors); 
} 

  }
?>


<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Авторизация</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body class="bg-light"></body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/main"><span class="badge badge-light">Типография</span> Гелион</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="/catalog">Каталог</a></li>
      <li class="nav-item"><a class="nav-link" href="/catalog/5">Арт-буки</a></li>
      <li class="nav-item"><a class="nav-link" href="/catalog/6">Манга</a></li>
      <li class="nav-item"><a class="nav-link" href="/catalog/7">Комиксы</a></li>
      <li class="nav-item"><a class="nav-link" href="/catalog/8">Книги</a></li>
    </ul>
  </div>   
    </div>
  </nav>

  <div class="container" style="margin-top: 100px;">
        <div class="col-md-6 offset-md-3" color="red">
          <?php echo $fars?>
          <div class="bg-white rounded border shadow-sm p-4">
                <h5>Авторизация</h5><hr />

<form action="/resources/login.php" method="POST">

<p>
  <p><strong>Логин</strong></p>
  <input type="text" name="login" class="form-control" value="<?php echo@$data['login']; ?>">
</p>

<p>
  <p><strong>Пароль</strong></p>
  <input type="password" name="password" class="form-control" value="<?php echo@$data['password']; ?>">
</p>

<p>
  <button type="submit" class="btn btn-primary btn-block" name="do_login">Войти</button>
</p>

</form>

</div>
        </div>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

