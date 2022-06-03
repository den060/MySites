<div id="tableContainer" style="
    background: white;
    width: 100%;
    display: flex;
">


    <div id="elementContainer" class="column">
        <div class="mainContainer" id="browse">
            <div class="col">
                <div id="pictureContainer" style="overflow: hidden; width: 100%;">
                    <div class="pictureSlider"
                        style="width: 100%; position: relative; overflow: hidden; display: table; left: 0px;">
                        <div class="item"
                            style="width: 100%; display: table-cell; position: relative; text-align: center;">
                            <a href="<?=$args[3]['image'];?>" title="Увеличить" class="zoom"><img src="<?=$args[3]['image'];?>"></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="secondCol col">
                <div class="brandImageWrap" style="
    font-size: 20px;
    margin-bottom: 20px;
">
                <?=$args[3]['name'];?>
                </div>
                <div class="reviewsBtnWrap">
                    <div class="row article">
                        Артикул: <span class="changeArticle"><?=$args[3]['articul'];?></span>
                    </div>
                </div>

                <div class="changePropertiesNoGroup">
                    <div class="elementProperties">
                        <div class="propertyList">
                            <div class="propertyTable">
                                <div class="propertyName">Производитель</div>
                                <div class="propertyValue">
                                    <a href="/search?q=<?=$args[3]['brand'];?>"><?=$args[3]['brand'];?></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="detailText">
            <div class="heading" style="
    background: none;
    color: black;
    padding: 0;
    line-height: initial;
    padding-top: 20px;
">Описание товара</div>
            <div class="changeDescription">
            <?=$args[3]['description'];?>
            </div>
        </div>
    </div>
    <div id="elementTools" class="column">
        <div class="fixContainer">

            <div class="mainTool">
                <a class="price changePrice">
                    <span class="priceContainer">

                        <span class="LaonelyT"><?=$args[3]['price'];?> руб.</span>
                         <span class="measure"> / шт</span> <br> 
                        
                       
                    </span><br>


                    <span class="coli4">
                     Количество <input id="find" type="number" value="1" min="1" step="1" onchange="updateprice()" oninput="updateprice()">
                     </select>   

                     <script type="text/javascript">
                         function updateprice() { if($("#find").val()>0) // Проверка на отрицательное число
                            $(".priceVal").text(parseFloat(parseInt($("#find").val()) * <?=$args[3]['price'];?>).toFixed(2)) //кол-во*цена
                         else {$(".priceVal").text(String("NaN")); //Text при отрицательном числе
                         $(".PishyRyb").text(String(" руб."))}};   //Изменить слово "руб." при желании и отриц. числе 
                     </script>

                     <span class="priceVal"><?=$args[3]['price'];?> </span> 
                        <span class="PishyRyb"> руб.</span>
                  
                    </span>
                </a>
                <div class="columnRowWrap">
                    <div class="row columnRow">
                        <a href="#" onclick="return addtocart(0)" class="addCart changeID changeQty changeCart"><img src="/incart.png" alt="В корзину" class="icon">В корзину</a>
                    </div>
                    <div class="row columnRow">
                        <a href="#" onclick="return addtocart(1)" class="fastBack label changeID"><img src="/fastBack.png" alt="Купить в 1 клик" class="icon">Купить в 1 клик</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function addtocart(status) {
    let num = parseInt($("#find").val());
    if(num <= 0) return false; 
    for(let i = 1; i <= num; i++) store.add(<?=$args[3]['id'];?>, `<?=$args[3]['name'];?>`, `<?=$args[3]['image'];?>`, `<?=$args[3]['price'];?>`, 1, <?=$args[3]['status'];?>, status);

    return true;
}

</script>