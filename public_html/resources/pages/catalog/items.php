<div id="breadcrumbs">
    <ul>
        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" title="Главная страница"
                itemprop="url"><span itemprop="title">Главная страница</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/catalog/" title="Каталог товаров"
                itemprop="url"><span itemprop="title">Каталог товаров</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li><span class="changeName"><?=$args[3]["name"];?></span></li>
    </ul>
</div>

<h1><?=$args[3]["name"];?></h1>


<div id="catalog">
    <div id="catalogLineList">
    <?php $store = $pdo->prepare("SELECT * FROM items WHERE items.catalog = :catalog limit 20"); $store->execute(['catalog' => $args[3]['id']]); while($row = $store->fetch()): ?>



    <div class="itemRow item sku">
            <div class="column">
                <a href="/store/<?=$row['id'];?>" class="picture">
                    <img src="<?=$row["image"];?>">
                    <span class="getFastView">Быстрый просмотр</span>
                </a>
            </div>
            <div class="column">

                <a href="/store/<?=$row['id'];?>"
                    class="name"><span class="middle"><?=$row["name"];?></span></a>
                <table class="prop">
                    <tbody>
                        <tr>
                            <td><span>Производитель</span></td>
                            <td>
                                <a href="/search?q=<?=$row["brand"];?>"><?=$row["brand"];?></a> </td>
                        </tr>
                        <tr>
                            <td><span>Гарантия</span></td>
                            <td><?=$row["garant"];?></td>
                        </tr>
                        <tr>
                            <td><span>Артикул</span></td>
                            <td><?=$row["articul"];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="column">
                <div class="resizeColumn">
                    <a class="price"><?=$row["price"];?> руб. <span class="measure"> / шт</span></a>
                </div>
                <div class="resizeColumn">
                    <a href="#" class="addCart" onclick="return store.add(<?=$row['id'];?>, `<?=$row['name'];?>`, `<?=$row['image'];?>`, `<?=$row['price'];?>`, 1, <?=$row['status'];?>, 0);"><img src="/incart.png" class="icon">В корзину</a>
                </div>
                <div class="resizeColumn last">
                    <div class="optional">
                        <div class="row">
                            <a href="#" class="fastBack label" onclick="return store.add(<?=$row['id'];?>, `<?=$row['name'];?>`, `<?=$row['image'];?>`, `<?=$row['price'];?>`, 1, <?=$row['status'];?>, 1);"><img
                                    src="/fastBack.png" class="icon">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="article">Артикул: <?=$row["articul"];?></div>

            </div>
        </div>
        <?php endwhile; ?>

    </div>


    <div></div>

</div>