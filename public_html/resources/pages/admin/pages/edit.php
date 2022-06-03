<a href="/admin" class="btn btn-secondary">Назад</a>
<form method="post" class="mt-3">

	<div class="form-group">
	    <label>Название</label>
	    <input type="text" class="form-control" placeholder="Название" name="name" value="<?=$args[2]["name"];?>">
	</div>

	<div class="form-group">
	    <label>Описание</label>
	    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"><?=$args[2]["content"];?></textarea>
	</div>

	<button type="submit" class="btn btn-info">Обновить</button>
	
</form>

<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#exampleFormControlTextarea1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>