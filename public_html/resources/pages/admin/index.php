        <h5><?php if(isset($_SESSION['pisk_name'])):?>Заказы пользователя <?=$_SESSION['pisk_name'];else:?>Заказы<?endif;?></h5>
        <hr />
        <table class="table table-ord">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Тип заказа</th>
              <th scope="col">Пользователь</th>
              <th scope="col">Дата заказа</th>
              <th scope="col">Сумма заказа</th>
              <th scope="col">Статус заказа</th>
              <th scope="col"></th>
              

            </tr>
          </thead>
          <tbody>

            <?php $posts = $pdo->prepare('SELECT * FROM orders'); $posts->execute(); while($row = $posts->fetch()): ?>
            
            <?php if(isset($_SESSION['pisk_name'])) if($row["user"]==$_SESSION['pisk_name']): ?>
            <tr>
             
              <th scope="row"><?=$row["id"];?></th>
              <td><?=$row["order"];?></td>
              <td><?if($row["user"]=="") echo "一";else echo $row["user"];?></td>
              <td><?=$row["data_time"];?></td>
              <td><?echo number_format($row["summa_zakaza"], 0, '.', ' '), " руб.";?></td>
              <td><? if ($row["status"]==0)echo "Не подтверждён";if ($row["status"]==1) echo "Подтверждён";if ($row["status"]==2) echo "Оплачен и отправлен"?></td>
              <td>
                <button class="btn btn-info btn-sm" data-toggle="modal"
                  data-target="#order_view<?=$row["id"];?>">Посмотреть заказ</button>
              </td> <?endif;?>
              <?php if(!isset($_SESSION['pisk_name'])):?>
              <tr>
             
              <th scope="row"><?=$row["id"];?></th>
              <td><?=$row["order"];?></td>
              <td><?if($row["user"]=="") echo "一";else echo $row["user"];?></td>
              <td><?=$row["data_time"];?></td>
              <td><?echo number_format($row["summa_zakaza"], 0, '.', ' '), " руб.";?></td>
              <td><? if ($row["status"]==0)echo "Не подтверждён";if ($row["status"]==1) echo "Подтверждён";if ($row["status"]==2) echo "Оплачен и отправлен"?></td>
              <td>
                <button class="btn btn-info btn-sm" data-toggle="modal"
                  data-target="#order_view<?=$row["id"];?>">Посмотреть заказ</button>
              </td><?php endif;?>
             

            <div class="modal fade" id="order_view<?=$row["id"];?>" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заказ №<?=$row["id"];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Заказал пользователь: <?=$row["user"]?></p>
                    <p><?=$row["text"];?></p>

                    <form action="resources/UpStatus.php" method="POST">
                      <p>
                         <input type="hidden" name="id_status" value="<?=$row["id"];?>">
                      </p>
                      <p>
                       <button type="submit"  name="up_status" class="btn btn-success btn-block">Подтвердить оплату</button>
                      </p>
                      <p>
                       <button type="submit"  name="up_status2" class="btn btn-primary btn-block">Операция завершена (товар отправлен)</button>
                      </p>
                    </form>
                    
                    <a href="/admin/orders/delete/<?=$row["id"];?>" class="btn btn-danger btn-block">Удалить заказ</a>
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
            <?php   unset($_SESSION['pisk_name']); ?>

          </tbody>
        </table>
        <script type="text/javascript">
          $('.table-ord').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            }
          });
        </script>
