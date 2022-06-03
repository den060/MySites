        <h5>Продажи товаров</h5>
        <hr />
<?php $data = R::getCol('SELECT `data` FROM settings');?>
<form action="resources/UpOrderDate.php" method="POST">
  <?php $DTime = date('Y-m-d');?>
<div class="form-row align-items-center">
  <div class="col-sm-3 my-1">
<strong>Вывести продажи с</strong>
  <input type="text" name="NewDate" class="form-control"  pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required placeholder="Y-m-d" value="<?php echo $data[11]; ?>">
</div>

<div class="col-sm-3 my-1">
<strong>по</strong>
  <input type="text" name="OldDate" class="form-control" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required placeholder="Y-m-d" value="<?php echo $data[12]; ?>">
</div>
<div>
<button type="submit" name="do_signup" class="btn btn-primary btn-block">Искать по датам</button>
</div>
</div>

</form>
        <table class="table table-ord">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Товар</th>
              <th scope="col">Продано всего</th>
              <th scope="col">За период</th>
              <th scope="col"></th>
              

            </tr>
          </thead>
          <tbody>

            <?php $posts = $pdo->prepare('SELECT * FROM items'); $posts->execute(); while($row = $posts->fetch()): ?>
            

            <tr>
              
              <th scope="row"><?=$row["id"];?></th>
              <td><?=$row["name"];?></td>
              <td><?=$row["sale"]?></td>
              <td><?=$row["temp"]?></td>
              <td>
                <button class="btn btn-info btn-sm" data-toggle="modal"
                  data-target="#order_view<?=$row["id"];?>">Информация о товаре</button>
              </td>
             

            <div class="modal fade" id="order_view<?=$row["id"];?>" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?=$row["name"];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                      <span><img src="<?=$row["image"];?>"></span><p></p>
                      <p><b>Цена: </b><?=$row["price"];?></p>
                      <p><b>Старая цена: </b><?if($row["oldprice"]==0)echo "Нет старой цены";else echo$row["oldprice"];?></p>
                      <p><b>Артикул: </b><?=$row["articul"];?></p>
                    <b>Описание:</b><?=$row["description"];?>
                  </div>

            
                    <a class="btn btn-primary btn-block" href="/admin/items/edit/<?=$row["id"];?>">Редактировать</a>


                    
                  </div>
                </div>
              </div>
            </div>

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
