<a href="/admin" class="btn btn-secondary">Назад</a>
<form method="post" class="mt-3" enctype="multipart/form-data">

	<div class="form-group">
	    <label>Название</label>
	    <input type="text" class="form-control" placeholder="Название" name="name" required>
	</div>
	<div class="form-group">
		<label>Товар</label>
		<select class="form-control" name="status">
			<option value="1">В наличии</option>
			<option value="0">Под заказ</option>
		</select>
	</div>
	  <div class="form-group">
	    <label>Обложка</label>
	    <input type="file" class="form-control-file" name="imageupload">
	  </div>

	<div class="form-group">
	    <label>Цена</label>
	    <input type="text" class="form-control" placeholder="Цена" name="price" required>
	</div>
	<div class="form-group">
	    <label>Старая цена</label>
	    <input type="text" class="form-control" placeholder="Старая Цена"  name="oldprice" required>
	</div>

	<div class="form-group">
	    <label>Артикул</label>
	    <input type="text" class="form-control" placeholder="Артикул" name="articul" required>
	</div>

	<div class="form-group">
	    <label>Производитель</label>
	    <select  class="form-control" placeholder="Производитель" name="brand" >
	    	<?php $brands = $pdo->prepare('SELECT * FROM brands'); $brands->execute(); while($row = $brands->fetch()): ?>
											<option value="<?=$row["id"];?>"><?=$row["name"];?></option>
										<?php endwhile; ?>
	    </select>
	</div>

	<div class="form-group">
	    <label>Гарантия</label>
	    <input type="text" class="form-control" placeholder="Гарантия" value="Нет" name="garant" required>
	</div>

	  <div class="form-group">
	    <label>Категория</label>
	    <select class="form-control" name="catalog">
	      
 	<?php $catalog = $pdo->prepare('SELECT * FROM categories'); $catalog->execute(); while($row = $catalog->fetch()): ?>
											<option value="<?=$row["id"];?>"><?=$row["name"];?></option>
										<?php endwhile; ?>
	    </select>
	  </div>

	<div class="form-group">
	    <label>Описание</label>
	    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
	</div>


<div class="form-check">
  <input class="form-check-input" type="checkbox" name="boxes[]" value="1" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
  	Новинка
  </label>
</div>	
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="boxes[]" value="2" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
  Распродажа
  </label>
</div>	
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="boxes[]" value="3" id="defaultCheck3">
  <label class="form-check-label" for="defaultCheck3">
  Хит продаж
  </label>
</div>	
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="boxes[]" value="4" id="defaultCheck4">
  <label class="form-check-label" for="defaultCheck4">
  Рекомендуем
  </label>
</div>	
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="boxes[]" value="5" id="defaultCheck5">
  <label class="form-check-label" for="defaultCheck5">
  Уценка -10%
  </label>
</div>	

	<button type="submit" class="btn btn-info">Добавить</button>
</form>

<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#exampleFormControlTextarea1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>