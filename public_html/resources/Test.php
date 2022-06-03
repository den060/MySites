<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <META NAME="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico-v=1560138534.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#3498db">
    <link href="/kernel_main_v1.css-156092775328822.css" type="text/css" rel="stylesheet" />
    <link href="/ui.font.opensans.min.css-15591949461861.css" type="text/css" rel="stylesheet" />
    <link href="/page_14a3c9e8c677a57e04999de658a08896_v1.css-156092790728188.css" type="text/css" rel="stylesheet" />
    <link href="/template_5d31b14326d7a8fe371e4f3fcb790608_v1.css-1564126395306342.css" type="text/css"
        rel="stylesheet" />
    <link href="/popup.min.css-155919488620704.css" type="text/css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>

    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>

    <title>Ara-Ara</title>
</head>

<body>


 <div class="shoto" center>

    <?php 
        require "db.php";
                     ?>

         <?php if ( isset($_SESSION['logged']) ): ?>
           Ну привет, читатель... <b><?php echo ($_SESSION['Name']); ?></b><br>
            (привилегии авторизации будут добавлены позже)                             
           <a href="/resources/logout1.php">Выйти</a>
      <?php else : ?> 
       <div id="topToolsLeft"> <a href="/resources/login1.php" class="navbar-brand">Авторизация</a>   
      <a href="/resources/signup1.php">Регистрация</a><br>(Чтобы вас всех отличать друг от друга)</div>
          <?php endif; ?>
          
          
<div class="OST">
<br>
<?php

// Устанавливаем количество записей, которые будут выводиться на одной странице
// Поставьте нужное вам число. Для примера я указал одну запись на страницу
$quantity=1;

// Ограничиваем количество ссылок, которые будут выводиться перед и
// после текущей страницы
$limit=3;
// Если значение page= не является числом, то показываем
// пользователю первую страницу
if(!is_numeric($page)) $page=1;

// Если пользователь вручную поменяет в адресной строке значение page= на нуль,
// то мы определим это и поменяем на единицу, то-есть отправим на первую
// страницу, чтобы избежать ошибки
if ($page<1) $page=1;

// Узнаем количество всех доступных записей 
$result2= R::getCol('SELECT `id` FROM history');
$num=count($result2);
//$result2 = mysql_query("SELECT * FROM postranichno;");
//$num = mysql_num_rows($result2);

// Вычисляем количество страниц, чтобы знать сколько ссылок выводить
$pages = $num/$quantity;

// Округляем полученное число страниц в большую сторону
$pages = ceil($pages);

// Здесь мы увеличиваем число страниц на единицу чтобы начальное значение было
// равно единице, а не нулю. Значение page= будет
// совпадать с цифрой в ссылке, которую будут видеть посетители
$pages++; 

// Если значение page= больше числа страниц, то выводим первую страницу
if ($page>$pages) $page = 1;

// Выводим заголовок с номером текущей страницы 


// Переменная $list указывает с какой записи начинать выводить данные.
// Если это число не определено, то будем выводить
// с самого начала, то-есть с нулевой записи
if (!isset($list)) $list=0;

// Чтобы у нас значение page= в адресе ссылки совпадало с номером
// страницы мы будем его увеличивать на единицу при выводе ссылок, а
// здесь наоборот уменьшаем чтобы ничего не нарушить.
$list=--$page*$quantity;

// Делаем запрос подставляя значения переменных $quantity и $list
//$res = R::findAll('orders', 'status = ?', [$quantity]);

//TEXT
echo 'Страницы: ';

// _________________ начало блока 1 _________________
if(!isset($_GET['page']))$page=0; else $page=$_GET['page']-1;
// Выводим ссылки "назад" и "на первую страницу"
if ($page>=1) {

    // Значение page= для первой страницы всегда равно единице, 
    // поэтому так и пишем
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=1"><<</a> &nbsp; ';

    // Так как мы количество страниц до этого уменьшили на единицу, 
    // то для того, чтобы попасть на предыдущую страницу, 
    // нам не нужно ничего вычислять
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . $page . 
    '">< </a> &nbsp; ';
}

// __________________ конец блока 1 __________________

// На данном этапе номер текущей страницы = $page+1
$thiss = $page+1;

// Узнаем с какой ссылки начинать вывод
$start = $thiss-$limit;

// Узнаем номер последней ссылки для вывода
$end = $thiss+$limit;

// Выводим ссылки на все страницы
// Начальное число $j в нашем случае должно равнятся единице, а не нулю
for ($j = 1; $j<$pages; $j++) {

    // Выводим ссылки только в том случае, если их номер больше или равен
    // начальному значению, и меньше или равен конечному значению
    if ($j>=$start && $j<=$end) {

        // Ссылка на текущую страницу выделяется жирным
        if ($j==($page+1)) echo '<a href="' . $_SERVER['SCRIPT_NAME'] . 
        '?page=' . $j . '"><strong style="color: #df0000">' . $j . 
        '</strong></a> &nbsp; ';

        // Ссылки на остальные страницы
        else echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . 
        $j . '">' . $j . '</a> &nbsp; ';
    }
}

// _________________ начало блока 2 _________________

// Выводим ссылки "вперед" и "на последнюю страницу"
if ($j>$page && ($page+2)<$j) {

    // Чтобы попасть на следующую страницу нужно увеличить $pages на 2
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($page+2) . 
    '"> ></a> &nbsp; ';

    // Так как у нас $j = количество страниц + 1, то теперь 
    // уменьшаем его на единицу и получаем ссылку на последнюю страницу
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($j-1) . 
    '">>></a> &nbsp; ';
}

// __________________ конец блока 2 __________________

// запрещаем вывод предупреждений
Error_Reporting(E_ALL & ~E_NOTICE);







$res = R::findAll('history');


$i=1;if(!isset($_GET['page']))$ws=1;else $ws=$_GET['page'];
foreach ($res as $history) {
  if($i==$ws)
  { echo ' '. $history->glava;
    echo ' <br> ';
    echo ' '. $history->text;}$i++;

}


//TEXT
echo 'Страницы: ';

// _________________ начало блока 1 _________________
if(!isset($_GET['page']))$page=0; else $page=$_GET['page']-1;
// Выводим ссылки "назад" и "на первую страницу"
if ($page>=1) {

    // Значение page= для первой страницы всегда равно единице, 
    // поэтому так и пишем
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=1"><<</a> &nbsp; ';

    // Так как мы количество страниц до этого уменьшили на единицу, 
    // то для того, чтобы попасть на предыдущую страницу, 
    // нам не нужно ничего вычислять
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . $page . 
    '">< </a> &nbsp; ';
}

// __________________ конец блока 1 __________________

// На данном этапе номер текущей страницы = $page+1
$thiss = $page+1;

// Узнаем с какой ссылки начинать вывод
$start = $thiss-$limit;

// Узнаем номер последней ссылки для вывода
$end = $thiss+$limit;

// Выводим ссылки на все страницы
// Начальное число $j в нашем случае должно равнятся единице, а не нулю
for ($j = 1; $j<$pages; $j++) {

    // Выводим ссылки только в том случае, если их номер больше или равен
    // начальному значению, и меньше или равен конечному значению
    if ($j>=$start && $j<=$end) {

        // Ссылка на текущую страницу выделяется жирным
        if ($j==($page+1)) echo '<a href="' . $_SERVER['SCRIPT_NAME'] . 
        '?page=' . $j . '"><strong style="color: #df0000">' . $j . 
        '</strong></a> &nbsp; ';

        // Ссылки на остальные страницы
        else echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . 
        $j . '">' . $j . '</a> &nbsp; ';
    }
}

// _________________ начало блока 2 _________________

// Выводим ссылки "вперед" и "на последнюю страницу"
if ($j>$page && ($page+2)<$j) {

    // Чтобы попасть на следующую страницу нужно увеличить $pages на 2
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($page+2) . 
    '"> ></a> &nbsp; ';

    // Так как у нас $j = количество страниц + 1, то теперь 
    // уменьшаем его на единицу и получаем ссылку на последнюю страницу
    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($j-1) . 
    '">>></a> &nbsp; ';
}

// __________________ конец блока 2 __________________


?>

</div>


<style type="text/css">
    body{
        background: #FAEBD7;
        font-family: Verdana,Open Sans,sans-serif;
        font-size: 16px;
    }
   .OST{
     text-align: justify;
    }
</style>
<script src="/webhook.js"></script>
</body>


</html>