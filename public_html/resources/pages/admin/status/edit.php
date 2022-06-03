<a href="/admin" class="btn btn-secondary">Назад</a>
<form method="post" class="mt-3" enctype="multipart/form-data">

	
<div class="form-group">
      <label>Цена</label>
      <input type="text" class="form-control" placeholder="Цена" name="order" value="<?=$post['status'];?>">
  </div>

	<button type="submit" class="btn btn-info">Обновить</button>
	Здравствуйте, <?php echo htmlspecialchars($_POST['name']); ?>.
</form>