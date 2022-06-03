<div id="homeCatalog" style="margin-top: 0px;">
                            <div class="captionList">
                                <div id="captionCarousel">
                                    <ul class="slideBox">
                                        <li class="cItem"><div data-slitem="1" class="caption selected"><a href="#" onclick="return activeroom(1);" class="getProductByGroup">Новинка</a></div></li>
                                        <li class="cItem"><div data-slitem="2" class="caption"><a href="#" onclick="return activeroom(2);" class="getProductByGroup">Распродажа</a></div></li>
                                        <li class="cItem"><div data-slitem="3" class="caption"><a href="#" onclick="return activeroom(3);" class="getProductByGroup">Хит продаж</a></div></li>
                                        <li class="cItem"><div data-slitem="4" class="caption"><a href="#" onclick="return activeroom(4);" class="getProductByGroup">Рекомендуем</a></div></li>
                                        <li class="cItem"><div data-slitem="5" class="caption"><a href="#" onclick="return activeroom(5);" class="getProductByGroup">Уценка -10%</a></div></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ajaxContainer">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <div class="items productList" style="display: none;" data-slider="<?=$i;?>">
                                    <?php $store = $pdo->prepare("SELECT * FROM items WHERE boxes LIKE :like limit 5"); $store->execute(['like' => '%\"'.$i.'\"%']); while($row = $store->fetch()): ?>
                                    <div class="item product sku">
                                        <div class="tabloid nowp">
                                            <div class="markerContainer">
                                                <?php if(isset($row["boxes"])): 
                                                foreach(json_decode($row["boxes"]) as $m) {
                                                    if($m == 1) echo '<div class="marker" style="background-color: #007ef2">Новинка</div>';
                                                    if($m == 2) echo '<div class="marker" style="background-color: #e42c5c">Распродажа</div>';
                                                    if($m == 3) echo '<div class="marker" style="background-color: #f97310">Хит продаж</div>';
                                                    if($m == 4) echo '<div class="marker" style="background-color: #29bc48">Рекомендуем</div>';
                                                    if($m == 5) echo '<div class="marker" style="background-color: #424242">Уценка -10%</div>';
                                                }
                                                endif; ?>
                                            </div>
                                            <div class="productTable">
                                                <div class="productColImage">
                                                    <a href="/store/<?=$row['id'];?>" class="picture">
                                                        <img src="<?=$row['image'];?>" />
                                                        <span class="getFastView">Быстрый просмотр</span>
                                                    </a>
                                                </div>
                                                <div class="productColText">
                                                    <a href="#" class="name"><span class="middle"><?=$row['name'];?></span></a>
                                                    <a class="price"><?=$row['price']; ?> руб.  / шт</span><?php if($row["oldprice"] > 0) echo '<s class="discount">'.$row["oldprice"].' руб.</s>'; ?></a>
                                                    <a href="#" onclick="return store.add(<?=$row['id'];?>, `<?=$row['name'];?>`, `<?=$row['image'];?>`, `<?=$row['price'];?>`, 1, <?=$row['status'];?>, 0);" class="addCart"><img src="/incart.png" class="icon">В корзину</a>
                                                </div>
                                            </div>
                                            <div class="optional">
                                                <div class="row">
                                                    <a href="#" onclick="return store.add(<?=$row['id'];?>, `<?=$row['name'];?>`, `<?=$row['image'];?>`, `<?=$row['price'];?>`, 1, <?=$row['status'];?>, 1);" class="fastBack label"><img src="/fastBack.png" class="icon">Купить в 1 клик</a>
                                                    <a class="onOrder label changeAvailable"><img src="/onOrder.png" class="icon">
                                                    <?php if($row['status'] == 1) echo 'В наличии'; else echo 'Под заказ'; ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <div class="clear"></div>
                                </div>
                            <?php endfor; ?>
                            </div>
                            <script>
                                function activeroom(id) {
                                    $('.slideBox .caption').removeClass('selected');
                                    $(`[data-slitem="${id}"]`).addClass('selected');

                                    $(`[data-slider]`).hide();
                                    $(`[data-slider="${id}"]`).show();
                                }
                                activeroom(1);
                            </script>
                        </div>
                        <div id="popSection">
                            <a href="#"><span class="heading">Популярные категории</span></a>
                            <div class="ajaxContainer">
                                <div class="items">
                                <?php $categories = $pdo->prepare("select * from categories"); $categories->execute(); while($row = $categories->fetch()): ?>
                                    <div class="item">
                                        <div class="tabloid">
                                            <a href="/catalog/<?=$row['id'];?>" class="picture"><img src="<?=$row['image'];?>"></a>
                                            <div class="nameWrap">
                                                <a href="#" class="name"><?=$row['name'];?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>    
                                </div>
                            </div>
                        </div>
                        <div id="brandList">
                            <a href="#" class="heading">Популярные производители</span></a>
                            <div class="ajaxContainer">
                                <div class="items">
                                <?php $brands = $pdo->prepare("select * from brands limit 4"); $brands->execute(); while($row = $brands->fetch()): ?>
                                    <div class="item">
                                        <div class="tabloid">
                                            <a href="/search?q=<?=$row['name'];?>" class="picture"><img src="<?=$row['image'];?>"></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>  
                                    <div class="item last">
                                        <a href="/brands" class="showMore">
                                            <span class="wp">
                                                <span class="icon"><img src="/showMoreSmall.png"></span>
                                                <span class="ps">Показать все</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desccomp" style="margin-top: 30px;"><?=description_main;?></div>