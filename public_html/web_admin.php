<?php 

// Админ-панель
Nanite::get('/admin', function() {
		template(['admin', 'pages/admin/index' ]);
});
Nanite::get('/ot4', function() {
		template(['admin', 'pages/admin/ot4' ]);
});
Nanite::get('/users', function() {
		template(['admin', 'pages/admin/users' ]);
});
Nanite::get('/admin/logout', function() {
		unset($_SESSION["dashboard"]); 
		header("Location: /main");
});
Nanite::get('/admin/store_page', function() {
		template(['admin', 'pages/admin/index_store' ]);
});
Nanite::get('/admin/pages_page', function() {
		template(['admin', 'pages/admin/index_pages' ]);
});
Nanite::get('/admin/settings_page', function() {
		template(['admin', 'pages/admin/index_settings' ]);
});
// Добавление страницы
Nanite::get('/admin/pages/add', function() {
		template(['admin', 'pages/admin/pages/add']);
});
Nanite::post('/admin/pages/add', function() {
		global $pdo;
		$post = $pdo->prepare("INSERT INTO `pages` (`name`, `content`) VALUES (:name, :content)");
		$post->execute(array(
			'name' => $_POST["name"],
			'content' => $_POST["content"]
		));
		return header("Location: /admin/pages/edit/".$pdo->lastInsertId());
});
// Редактирование страницы
Nanite::get('/admin/pages/edit/([a-zA-Z0-9\-_]+)', function($id) {
		global $pdo;
		$post = $pdo->prepare('select * from pages where id = '.$id);
		$post->execute();
		$row = $post->fetch();
		if(!$row) return header("Location: /admin/pages_page");
		template(['admin', 'pages/admin/pages/edit', $row]);
});
Nanite::post('/admin/pages/edit/([a-zA-Z0-9\-_]+)', function($id) {
		global $pdo;
		$post = $pdo->prepare('UPDATE `pages` SET `name` = :name, `content` = :content WHERE `id` = :id');
		$post->execute(array(
			'name' => $_POST["name"],
			'content' => $_POST["content"],
			'id' => $id
		));
		$_SESSION["success"] = 'Обновлено';
		header("Location: /admin/pages/edit/".$id);
});
// Удаление страницы	
Nanite::get('/admin/delete/pages/([a-zA-Z0-9\-_]+)', function($id) {
		global $pdo;
		$posts = $pdo->prepare('DELETE FROM `pages` WHERE id = :id'); 
		$posts->execute(array('id' => $id));
		header("Location: /admin/pages_page");		
});
// Редактирование настроек	
Nanite::post('/admin/settings', function() {
            GLOBAL $pdo;
            foreach($_POST as $key => $value) {
                $settings = $pdo->prepare("UPDATE settings set data = :data WHERE type = :type");
                $settings->bindParam(':data', $value);
                $settings->bindParam(':type', $key);
                $settings->execute();
            }
            header("Location: /admin/settings_page");		
});
// Удаление заказа
Nanite::get('/admin/orders/delete/([a-zA-Z0-9\-_]+)', function($id) {
	global $pdo;
	$posts = $pdo->prepare('DELETE FROM `orders` WHERE id = :id'); 
	$posts->execute(array('id' => $id));
	header("Location: /admin");
});
// Новая категория
Nanite::post('/admin/new/category', function() {
	if(isset($_POST["name"])) {
		global $pdo;
		$path="/storage/";
		$name = date('YmdHis').rand(100,1000).'.jpg';//Name of the File
		$temp = $_FILES['imageupload']['tmp_name'];
		$image = $path.$name;
		if(move_uploaded_file($temp, BASE_PATH.$image)) {
			$posts = $pdo->prepare('INSERT INTO `categories` (`name`, `image`) VALUES (:name, :image)'); 
			$posts->execute(array('name' => $_POST["name"], 'image' => $image));
		}
	}
	header("Location: /admin/store_page");
});
// Редактирование категории
Nanite::post('/admin/edit/category/([a-zA-Z0-9\-_]+)', function($id) {
	if(isset($_POST["name"])) {
		global $pdo;
		$image = $_POST["oldimage"];
		if(isset($_FILES['imageupload']))  {
			$path="/storage/";
			$name = date('YmdHis').rand(100,1000).'.jpg';//Name of the File
			$temp = $_FILES['imageupload']['tmp_name'];
			$image = $path.$name;
			if(!move_uploaded_file($temp, BASE_PATH.$image)) $image = $_POST["oldimage"];
		}
		$posts = $pdo->prepare('UPDATE `categories` SET `name` = :name, `image` = :image WHERE `id` = :id'); 
		$posts->execute(array('name' => $_POST["name"], 'id' => $id, 'image' => $image));
	}
	header("Location: /admin/store_page");
});
// Удаление категории
Nanite::get('/admin/delete/category/([a-zA-Z0-9\-_]+)', function($id) {
	global $pdo;
	$posts = $pdo->prepare('DELETE FROM `categories` WHERE id = :id'); 
	$posts->execute(array('id' => $id));
	header("Location: /admin/store_page");		
});
// Добавление товарв
Nanite::get('/admin/items/add', function() {
	template(['admin', 'pages/admin/items/add']);
});
Nanite::post('/admin/items/add', function() {
	$boxes = ['1'];
	if(isset($_POST["boxes"])) $boxes = $_POST["boxes"];
	$path="/storage/";
	$name = date('YmdHis').rand(100,1000).'.jpg';//Name of the File
	$temp = $_FILES['imageupload']['tmp_name'];
	$image = $path.$name;
	if(move_uploaded_file($temp, BASE_PATH.$image)) {
		global $pdo;
		$post = $pdo->prepare("INSERT INTO `items` (`name`, `image`, `status`, `price`, `oldprice`, `boxes`, `catalog`, `articul`, `brand`, `garant`, `description`) VALUES (:name, :image, :status, :price, :oldprice, :boxes, :catalog, :articul, :brand, :garant, :description)");
		$post->execute(array(
			'name' => $_POST["name"],
			'image' => $image,
			'status' => $_POST["status"],
			'price' => sprintf('%0.2f', round($_POST["price"], 2)),
			'oldprice' => sprintf('%0.2f', round($_POST["oldprice"], 2)),
			'boxes' => json_encode($boxes),
			'catalog' => $_POST["catalog"],
			'articul' => $_POST["articul"],
			'brand' => $_POST["brand"],
			'garant' => $_POST["garant"],
			'description' => $_POST["description"],
		));
		return header("Location: /admin/items/edit/".$pdo->lastInsertId());
	} else return alert(300, "File Upload Error");
});
// Редактирование товара
Nanite::get('/admin/items/edit/([a-zA-Z0-9\-_]+)', function($id) {
	global $pdo;
	$post = $pdo->prepare('select * from items where id = '.$id);
	$post->execute();
	$row = $post->fetch();
	if(!$row) return header("Location: /admin/store_page");
	template(['admin', 'pages/admin/items/edit', $row]);
});
Nanite::post('/admin/items/edit/([a-zA-Z0-9\-_]+)', function($id) {
	$boxes = ['1'];
	if(isset($_POST["boxes"])) $boxes = $_POST["boxes"];

		if(isset($_FILES['imageupload']))  {
			$path="/storage/";
			$name = date('YmdHis').rand(100,1000).'.jpg';//Name of the File
			$temp = $_FILES['imageupload']['tmp_name'];
			$image = $path.$name;
			if(!move_uploaded_file($temp, BASE_PATH.$image)) $image = $_POST["oldimage"];
		}
		global $pdo;
		$post = $pdo->prepare('UPDATE `items` SET `name` = :name, `image` = :image, `status` = :status, `price` = :price, `oldprice` = :oldprice, `boxes` = :boxes, `catalog` = :catalog, `articul` = :articul, `brand` = :brand, `garant` = :garant, `description` = :description  WHERE `id` = :id');
		$post->execute(array(
			'name' => $_POST["name"],
			'image' => $image,
			'status' => $_POST["status"],
			'price' => sprintf('%0.2f', round($_POST["price"], 2)),
			'oldprice' => sprintf('%0.2f', round($_POST["oldprice"], 2)),
			'boxes' => json_encode($boxes),
			'catalog' => $_POST["catalog"],
			'articul' => $_POST["articul"],
			'brand' => $_POST["brand"],
			'garant' => $_POST["garant"],
			'description' => $_POST["description"],
			'id' => $id,
		));
		$_SESSION["success"] = 'Обновлено';
	header("Location: /admin/items/edit/".$id);
});
// Удаление товара
Nanite::get('/admin/delete/item/([a-zA-Z0-9\-_]+)', function($id) {
	global $pdo;
	$posts = $pdo->prepare('DELETE FROM `items` WHERE id = :id'); 
	$posts->execute(array('id' => $id));
	header("Location: /admin/store_page");		
});	

Nanite::get('/admin/([a-zA-Z0-9\-_]+)', function($id) {
	$_SESSION['pisk_name'] = $id;
	header("Location: /admin");		
});	



// Добавление
Nanite::get('/admin/brands/add', function() {
	template(['admin', 'pages/admin/brands/add']);
});

Nanite::post('/admin/brands/add', function() {
	$category = ['1'];
	if(isset($_POST["boxes"])) $category = $_POST["boxes"];
		
	$path="/storage/";
	$name = date('YmdHis').rand(100,1000).'.jpg';//Name of the File
	$temp = $_FILES['imageupload']['tmp_name'];
	$image = $path.$name;
	if(move_uploaded_file($temp, BASE_PATH.$image)) {
		global $pdo;
		$post = $pdo->prepare("INSERT INTO `brands` (`name`, `image`) VALUES (:name, :image)");
		$post->execute(array(
			'name' => $_POST["name"],
			'image' => $image,
			'category' => json_encode($category)
		));
		return header("Location: /admin/brands/edit/".$pdo->lastInsertId());
	} else return alert(300, "error");

});

// Редактирование
Nanite::get('/admin/brands/edit/([a-zA-Z0-9\-_]+)', function($id) {
	global $pdo;
	$post = $pdo->prepare('select * from brands where id = '.$id);
	$post->execute();
	$row = $post->fetch();
	if(!$row) return header("Location: /admin/pages_brands");
	template(['admin', 'pages/admin/brands/edit', $row]);
});

Nanite::post('/admin/brands/edit/([a-zA-Z0-9\-_]+)', function($id) {
	$category = ['1'];
	if(isset($_POST["boxes"])) $category = $_POST["boxes"];

	if(isset($_FILES['imageupload']))  {
		$path="/storage/";
		$name = date('YmdHis').rand(100,1000).'.jpg';//Name of the File
		$temp = $_FILES['imageupload']['tmp_name'];
		$image = $path.$name;
		if(!move_uploaded_file($temp, BASE_PATH.$image)) $image = $_POST["oldimage"];
	}

	global $pdo;
	$post = $pdo->prepare('UPDATE `brands` SET `name` = :name, `image` = :image, `category` = :category WHERE `id` = :id');
	$post->execute(array(
		'name' => $_POST["name"],
		'image' => $image,
		'category' => json_encode($category),
		'id' => $id
	));
	$_SESSION["success"] = 'Обновлено';
	header("Location: /admin/brands/edit/".$id);
});

// Удаление	
Nanite::get('/admin/delete/brands/([a-zA-Z0-9\-_]+)', function($id) {
	global $pdo;
	$posts = $pdo->prepare('DELETE FROM `brands` WHERE id = :id'); 
	$posts->execute(array('id' => $id));
	header("Location: /admin/pages_brands");		
});

Nanite::get('/admin/pages_brands', function() {
	template(['admin', 'pages/admin/index_brands' ]);
});

