<? global $pdo; require "db.php"; ?>
<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>

  <title>Панель управления</title>
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/admin/logout"><span class="badge badge-light">Типография</span> Гелион</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="/users">Пользователи</a></li>
      <li class="nav-item"><a class="nav-link" href="/ot4">Продажи</a></li>
      <li class="nav-item"><a class="nav-link" href="/admin">Заказы</a></li>
      <li class="nav-item"><a class="nav-link" href="/admin/store_page">Магазин</a></li>
      <li class="nav-item"><a class="nav-link" href="/admin/pages_page">Страницы</a></li>
      <li class="nav-item"><a class="nav-link" href="/admin/pages_brands">Производители</a></li>
      <li class="nav-item"><a class="nav-link" href="/admin/settings_page">Настройки</a></li>
    </ul>
  </div>   
    </div>
  </nav>

  <div class="container mt-4">
    <? require(page); ?>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>document.querySelector(`.nav-item [href="${document.location.pathname}"]`).classList.add("active")</script>

</body>
</html>
<?php if (isset($_POST['DAF']))
{
$str_out =$_POST['DAF'] ;
echo $str_out;
}
?>