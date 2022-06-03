        <div class="row">
          <div class="col-md-5 mb-4">
            <h5><button class="btn btn-sm btn-info mr-3" data-toggle="modal"
                data-target="#catalog_new">Добавить</button>Категории</h5>
            <hr />

            <div class="modal fade" id="catalog_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить категорию</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/admin/new/category" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Категория</label>
                        <input type="text" class="form-control" name="name" required>
                      </div>
                      <div class="form-group">
	    <label>Обложка</label>
	    <input type="file" class="form-control-file" name="imageupload">
	  </div>
                      <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <table class="table table-cat">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Категория</th>
                  <th scope="col">Управление</th>
                </tr>
              </thead>
              <tbody>

                <?php $posts = $pdo->prepare('SELECT * FROM categories'); $posts->execute(); while($row = $posts->fetch()): ?>
                <tr>
                  <th scope="row"><?=$row["id"];?></th>
                  <td><?=$row["name"];?></td>
                  <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal"
                      data-target="#catalog_modal<?=$row['id'];?>">Редактировать</button>
                    <a class="btn btn-danger btn-sm" href="/admin/delete/category/<?=$row["id"];?>">Удалить</a>
                  </td>
                </tr>

                <div class="modal fade" id="catalog_modal<?=$row['id'];?>" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Редактирование: <?=$row['name'];?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="/admin/edit/category/<?=$row["id"];?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="oldimage" value="<?=$row["image"]; ?>">
                          <div class="form-group">
                            <label>Категория</label>
                            <input type="text" class="form-control" name="order" required value="<?=$row['name'];?>">
                          </div>
                          <div class="form-group">
	    <label>Обложка</label>
	    
	  </div>
                          <button type="submit" class="btn btn-primary btn-block">Изменить</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>

              </tbody>
            </table>
            <script type="text/javascript">
              $('.table-cat').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                }
              });
            </script>
          </div>
          <div class="col-md-7 mb-4">
            <h5><a class="btn btn-sm btn-info mr-3" href="/admin/items/add">Добавить</a>Товары</h5>
            <hr />

            <table class="table table-item">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Товар</th>
                  <th scope="col">Цена</th>
                  <th scope="col">Категория</th>
                  <th scope="col">Продано</th>
                  <th scope="col">Управление</th>
                </tr>
              </thead>
              <tbody>

                <?php $posts = $pdo->prepare('SELECT categories.name as cat, items.* FROM items, categories where categories.id = items.catalog'); $posts->execute(); while($row = $posts->fetch()): ?>
                <tr>
                  <th scope="row"><?=$row["id"];?></th>
                  <td><?=$row["name"];?></td>
                  <td><?=$row["price"];?></td>
                  <td><span class="badge badge-info"><?=$row["cat"];?></span></td>
                  <th><?=$row["sale"];?></th>
                  <td>
                    <a class="btn btn-info btn-sm" href="/admin/items/edit/<?=$row["id"];?>">Редактировать</a>
                    <a class="btn btn-danger btn-sm" href="/admin/delete/item/<?=$row["id"];?>">Удалить</a>
                  </td>
                </tr>
                <?php endwhile; ?>

              </tbody>
            </table>
            <script type="text/javascript">
              $('.table-item').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                }
              });
            </script>

          </div>
        </div>
