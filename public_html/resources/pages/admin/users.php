        <h5>Пользователи</h5>
        <hr />
        <table class="table table-ord">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Пользователь</th>
              <th scope="col">Email</th>
              <th scope="col">Дата регистрации</th>
              <th scope="col">Сумма заказов</th>
              <th scope="col"></th>
              

            </tr>
          </thead>
          <tbody>

            <?php $posts = $pdo->prepare('SELECT * FROM users'); $posts->execute(); while($row = $posts->fetch()): ?>
            

            <tr>
              
              <th scope="row"><?=$row["id"];?></th>
              <td><?=$row["login"];?></td>
              <td><?=$row["email"];?></td>
              <td><?=$row["time_create"];?></td>
              <td><?echo number_format($row["money"], 0, '.', ' '), " руб.";?></td>
              <td>
                <a href="/admin/<?=$row["login"];?>" class="btn btn-info btn-sm">Все заказы пользователя</a>
              </td>

<?php if (isset($_POST['DAF']))
{
$str_out =$_POST['DAF'] ;
echo $str_out;
}
?>
            
            <?php endwhile; ?>

          </tbody>
        </table>
        <script type="text/javascript">
          $('.table-ord').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            }
          });
        </script>
