<?php 
  require "db.php"; 
session_start();
  $fars="";
  $data = $_POST;
  if( isset($data['do_signup']) )
{
  //регистрация

  $errors = array();
  if(trim($data['login']) == '' )
{
  $errors[] = 'Введите логин!';
}

if(trim($data['email']) == '' )
{
  $errors[] = 'Введите Email!';
}

if($data['password'] == '' )
{
  $errors[] = 'Введите пароль!';
}

if($data['password_2'] != $data['password'] )
{
  $errors[] = 'Повторный пароль введён не верно!';
}

if( R::count('users', "login = ?", array($data['login'])) > 0 )
{
  $errors[] = 'Пользователь с таким логином уже существует!';
}

if( R::count('users', "email = ?", array($data['email'])) > 0 )
{
  $errors[] = 'Пользователь с таким Email уже существует!';
}

if( empty($errors))
{
  //ошибок нет, доваляю пользователя
  $DTime = date('Y-m-d H:i:s');
  $user = R::dispense('users');
  $user->login = $data['login'];
  $user->email = $data['email'];
  $user->password = $data['password'];
  $user->money = '0';
  $user->time_create = $DTime;
  R::store($user);
  $_SESSION['logged'] = $user;
  $_SESSION['Name'] = $data['login'];
  $fars = "Вы успешно зарегистрированы!<br> Можете перейти на <a href='/resources/Test.php'>ГЛАВНУЮ</a>";
  header('Location: /resources/Test.php');
} else
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
    <title>Регистрация</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body class="bg-light"></body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="/resources/Test.php"><span class="badge badge-light">XXX</span> Agnis</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="/resources/Test.php">Яой</a></li>
      <li class="nav-item"><a class="nav-link" href="/resources/Test.php">Юри</a></li>
      <li class="nav-item"><a class="nav-link" href="/resources/Test.php">Фанфики</a></li>
      <li class="nav-item"><a class="nav-link" href="/resources/Test.php">Сюда ещё рано</a></li>
      <li class="nav-item"><a class="nav-link" href="/resources/Test.php">Или регестрируйся, или вали</a></li>
    </ul>
  </div>   
    </div>
  </nav>

  <div class="container" style="margin-top: 100px;">
        <div class="col-md-6 offset-md-3" color="red">
          <?php echo $fars?>
          <div class="bg-white rounded border shadow-sm p-4">
                <h5>Регистрация</h5><hr />

<form action="/resources/signup1.php" method="POST">
<p>
  <p><strong>Ваш логин</strong></p>
  <input type="text" name="login" class="form-control" value="<?php echo@$data['login']; ?>">
</p>

<p>
  <p><strong>Ваш Email </strong>(для галочки, подтверждать не надо)</p>
  <input type="email" name="email" class="form-control" value="<?php echo@$data['email']; ?>">
</p>

<p>
  <p><strong>Введите пароль</strong></p>
  <input type="password" name="password" class="form-control" value="<?php echo@$data['password']; ?>">
</p>

<p>
  <p><strong>Повторите пароль</strong></p>
  <input type="password" name="password_2" class="form-control">
</p>

<p>
  <button type="submit" name="do_signup" class="btn btn-primary btn-block">Зарегестрироваться</button>
</p>

  </form>

  </div>
        </div>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

