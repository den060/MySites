<a href="/admin" class="btn btn-secondary">Назад</a>
<form method="post" class="mt-3" enctype="multipart/form-data">
	<div class="form-group">
	    <label>Производитель</label>
	    <input type="text" class="form-control" placeholder="Название" name="name" required>
	</div>
	<div class="form-group">
	    <label>Обложка</label>
	    <input type="file" class="form-control-file" name="imageupload">
	</div>

	<?php $catalog = $pdo->prepare('SELECT * FROM categories'); $catalog->execute(); while($row = $catalog->fetch()): ?>
	<div class="form-check">
  <input class="form-check-input" type="checkbox" name="boxes[]" value="<?=$row["id"];?>" id="defaultCheck<?=$row["id"];?>">
  <label class="form-check-label" for="defaultCheck<?=$row["id"];?>">
  <?=$row["name"];?>
  </label>
</div>	
<?php endwhile; ?>

	<button type="submit" class="btn btn-info">Добавить</button>
</form>