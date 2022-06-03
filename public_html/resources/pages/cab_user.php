  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   <div id="breadcrumbs">
    <ul>
        <li><a href="/" title="Главная страница" itemprop="url"><span itemprop="title">Личный кабинет</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li><span class="changeName">Ваши заказы</span></li>
    </ul>
</div>        <h5><?php if(isset($_SESSION['Name_user'])):?>Заказы пользователя <?=$_SESSION['Name_user'];else:?>Заказы<?endif;?></h5>
        <hr />
        <table class="table table-ord">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Тип заказа</th>
              <th scope="col">Дата заказа</th>
              <th scope="col">Сумма заказа</th>
              <th scope="col">Статус заказа</th>
              <th scope="col"></th>
              

            </tr>
          </thead>
          <tbody>

            <?php $col=1; $posts = $pdo->prepare('SELECT * FROM orders'); $posts->execute(); while($row = $posts->fetch()): ?>
            
            <?php if(isset($_SESSION['logged_user'])) if($row["user"]==$_SESSION['Name_user']): ?>
            <tr>
             
              <th scope="row"><?echo $col; $col++;?></th>
              <td><?=$row["order"];?></td>
              <td><?=$row["data_time"];?></td>
              <td><?echo number_format($row["summa_zakaza"], 0, '.', ' '), " руб.";?></td>
              <td><? if ($row["status"]==0)echo "Не подтверждён";if ($row["status"]==1) echo "Подтверждён";if ($row["status"]==2) echo "Оплачен и отправлен"?></td>
              <td>
                <button class="btn btn-info btn-sm" data-toggle="modal"
                  data-target="#order_view<?=$row["id"];?>">Ага, да, если бы работало</button>
              </td> <?endif;?>
              <?php if(!isset($_SESSION['logged_user'])) :?>    <?php endif;?>
             

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
                    <p>Заказаз пользователя: <?=$row["user"]?></p>
                    <p><?=$row["text"];?></p>
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
        </table>  <?php  if(!isset($_SESSION['logged_user'])) :?>  <br><br><br><br><br><br> <?php endif;?>
        <script type="text/javascript">
          $('.table-ord').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            }
          });
        </script>

  </div>




