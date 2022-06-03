
        <div class="row">
          <div class="col-md-12 mb-4">
            <h5><a class="btn btn-sm btn-info mr-3" href="/admin/pages/add">Добавить</a>Страницы</h5>
            <hr />


            <table class="table table-pages">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Название страницы</th>
                  <th scope="col">Управление</th>
                </tr>
              </thead>
              <tbody>

                <?php $posts = $pdo->prepare('SELECT * FROM pages'); $posts->execute(); while($row = $posts->fetch()): ?>
                <tr>
                  <th scope="row"><?=$row["id"];?></th>
                  <td><?=$row["name"];?></td>
                  <td>
                    <a class="btn btn-info btn-sm" href="/admin/pages/edit/<?=$row["id"];?>">Редактировать</a>
                    <a class="btn btn-danger btn-sm" href="/admin/delete/pages/<?=$row["id"];?>">Удалить</a>
                  </td>
                </tr>
                <?php endwhile; ?>

              </tbody>
            </table>
            <script type="text/javascript">
              $('.table-pages').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                }
              });
            </script>

          </div>
        </div>