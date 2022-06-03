<?php 
  require "db.php"; 
session_start();
  $fars="";
  $login="";
  $data = $_POST;
  if( isset($data['do_signup']) )
{
  //регистрация

$errors = array();
$user = 0;
$user = R::findOne('users2', 'login = ?', [$data['name']]);
if ($user != 0)
{
  $errors[] = "Тайный-Санта с таким именем уже получил своего *клиента.<br>
  Или кто-то регистрировался не под своим именем, или кто-то пытается получить имя ещё раз.";
}


if( empty($errors))
{
  //ошибок нет, доваляю пользователя
  $dt = "";
  $user = 0;
  $user = R::findOne('users2', 'login = ?', [$dt]);
  if ($user != 0)
  { 
    if ($user->status == $data['name']){
    $sd = $user->id + 1; 
    $user = R::findOne('users2', 'id = ?', [$sd]);
  }
  $user->login = $data['name'];
  R::store($user);
  $_SESSION['logged'] = $user;
  $_SESSION['Name'] = $user->status;
  $login = $user->login;
  //header('Location: /resources/Test.php');
}
  else
  {
    $errors[] = 'Все имена заняты, обратитесь к администратору';
    $fars=array_shift($errors);
  }
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
    <title>Oh-ho-ho</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body class="bg-light"></body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/resources/signup2.php"><span class="badge badge-light">XXX</span> Agnis</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="#">Яой</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Юри</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Фанфики</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Сюда ещё рано</a></li>
      <li class="nav-item"><a class="nav-link" href="/resources/logout2.php">Exit</a></li>
    </ul>
  </div>   
    </div>
  </nav>


  <div class="container" style="margin-top: 100px;">

        <div class="col-md-6 offset-md-3" color="red">
          
            <?php echo $fars?>
          <div class="bg-white rounded border shadow-sm p-4">
                <div style="text-align: center;"><h5>Тайный Санта</h5></div>
                <img src="../storage/20200103123442118.jpg" style="width: 40%; position: center;">
                <img src="../storage/20190818085833935.jpg" style="width: 40%; float: right;"> 

                <hr>
                 
                 <?php if ( isset($_SESSION['logged']) ): 
                  ?> <?php echo $login?>, ты Тайный Санта для человека с именем - <b>
                <?php print $_SESSION['Name']; ?></b>
                 <?php endif ?>
                  <?php if ( !isset($_SESSION['logged']) ): ?>
                Гррр*
                

<form action="/resources/signup2.php" method="POST"><p>
  
  <p><strong>Укажи своё имя</strong> (чтобы не выпало своё)</p>
  <select class="form-control" name="name">
  
  <option>Вадим</option>
  <option>Вика</option>
  <option>Диана</option>
  <option>Рома</option>
  <option>Саша</option>

</select>
</p>


<p>
  <button type="submit" name="do_signup" class="btn btn-danger btn-block">Узнать чей ты Тайный-Санта</button>
</p>

  </form>
  <?php endif ?>

  </div>
        </div>
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

