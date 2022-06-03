<div id="breadcrumbs">
    <ul>
        <li><a href="/" title="Главная страница" itemprop="url"><span itemprop="title">Главная страница</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li><span class="changeName">Все производители</span></li>
    </ul>
</div>
<h1>Производители</h1>
<div id="brandList">
    <div class="items clearfix">
    <?php $brands = $pdo->prepare("select * from brands limit 4"); $brands->execute(); while($row = $brands->fetch()): ?>
                                    <div class="item">
                                        <div class="tabloid">
                                            <a href="/search?q=<?=$row['name'];?>" class="picture"><img src="<?=$row['image'];?>"></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>  
    </div>
</div>