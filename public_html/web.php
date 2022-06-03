<?php 

if(!isset($_SESSION["dashboard"])) {
    Nanite::get('/admin', function() {
        require(BASE_PATH.'/resources/pages/guest.php');
    });
    Nanite::post('/auth', function() {
        if(!isset($_POST["login"]) || !isset($_POST["password"])) $_SESSION["error"] = 'Не найден параметр';
        else {
            global $pdo;
            $data = $pdo->prepare("SELECT * FROM admins WHERE login = :login LIMIT 1");
            $data->execute(array('login' => $_POST["login"]));
            $row = $data->fetch();
            if(!$row) $_SESSION["error"] = "Аккаунт не найден";
            else if($row["password"] != $_POST["password"]) $_SESSION["error"] = 'Пароль не совпадает';
            else $_SESSION["dashboard"] = true;
        }
        return header("Location: /admin");
    });
} else require('web_admin.php');


Nanite::get('/', function() { 
    header("Location: /main");
});
Nanite::get('/main', function() { 
    template(['main', 'pages/main', 'Главная страница']);
});
Nanite::get('/brands', function() { 
    template(['main', 'pages/brands', 'Производители']);
});
Nanite::get('/cab_user', function() { 
    template(['main', 'pages/cab_user', 'Производители']);
});
Nanite::get('/pages/([a-zA-Z0-9\-_]+)', function($article) { 
    global $pdo;
    $art = $pdo->prepare("select * from pages where id = ".$article);
    $art->execute();
    if(!$art = $art->fetch()) return header("Location: /");
    template(['main', 'pages/page', $art['name'], $art]);
});
Nanite::get('/catalog', function() {
    template(['main', 'pages/catalog/index', 'Каталог товаров.']);
});
Nanite::get('/catalog/', function() {
    template(['main', 'pages/catalog/index', 'Каталог товаров.']);
});
Nanite::get('/search', function() {
    template(['main', 'pages/search', 'Поиск товаров.']);
});
Nanite::get('/catalog/([a-zA-Z0-9\-_]+)', function($catalog) {
    global $pdo;
    $art = $pdo->prepare("select * from categories where id = ".$catalog);
    $art->execute();
    if(!$art = $art->fetch()) return header("Location: /");
    template(['main', 'pages/catalog/items', $art['name'], $art]);
});
Nanite::get('/store/([a-zA-Z0-9\-_]+)', function($catalog) {
    global $pdo;
    $art = $pdo->prepare("select * from items where id = ".$catalog);
    $art->execute();
    if(!$art = $art->fetch()) return header("Location: /");
    template(['main', 'pages/store', $art['name'], $art]);
});
Nanite::get('/cart', function() {
    template(['main', 'pages/cart', 'Оформление заказа']);
});

Nanite::post('/order', function() {
    global $pdo;
    $DTime = date('Y-m-d H:i:s');
    $sumZ = "0";
    $sumZ = $_REQUEST['sumZ'];
    $idT= $_REQUEST['idT'];
    $nameU="";
    if (isset($_SESSION['Name_user'])) $nameU = ($_SESSION['Name_user']); 
    $art = $pdo->prepare("INSERT INTO `orders` (`order`, `text`, `data_time`, `user`, `summa_zakaza`, `id_tovarov`) VALUES (:order, :text, :data_time, :user, :summa_zakaza, :id_tovarov)");
    $art->execute([
        'order' => $_REQUEST['order'],
        'text' => $_REQUEST['text'],
        'data_time' => $DTime,
        'user' => $nameU,
        'summa_zakaza' => $sumZ,
        'id_tovarov' => $idT
    ]); 
    return alert("success", "Заказ был успешно оформлен");
});