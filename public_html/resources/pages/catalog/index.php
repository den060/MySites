<div id="breadcrumbs"><ul><li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" title="Главная страница" itemprop="url"><span itemprop="title">Главная страница</span></a></li><li><span class="arrow"> • </span></li><li><span class="changeName">Популярные категории</span></li></ul></div>

<h1>Популярные категории</h1>

<div id="popSection">
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