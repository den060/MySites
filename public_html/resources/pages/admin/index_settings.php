<h5>Настройки</h5>
        <hr />

        <form method="post" action="/admin/settings" class="mb-5 row">
          <?php 
          $settings = $pdo->prepare('SELECT * from settings');
          $settings->execute();
          while($row = $settings->fetch()):
          ?>
          <div class="col-12">
            <div class="form-group">
              <label><?=$row["ru"];?></label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="<?=$row["type"];?>"
                required><?=$row["data"];?></textarea>
            </div>
          </div>
          <? endwhile; ?>
          <div class="col-12"><button type="submit" class="btn btn-secondary btn-block">Обновить данные</button></div>
        </form>
