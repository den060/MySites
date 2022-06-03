<?php global $pdo; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <META NAME="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico-v=1560138534.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#3498db">
    <link href="/kernel_main_v1.css-156092775328822.css" type="text/css" rel="stylesheet" />
    <link href="/ui.font.opensans.min.css-15591949461861.css" type="text/css" rel="stylesheet" />
    <link href="/page_14a3c9e8c677a57e04999de658a08896_v1.css-156092790728188.css" type="text/css" rel="stylesheet" />
    <link href="/template_5d31b14326d7a8fe371e4f3fcb790608_v1.css-1564126395306342.css" type="text/css"
        rel="stylesheet" />
    <link href="/popup.min.css-155919488620704.css" type="text/css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>

    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>

    <title><?=$args[2];?> - Типография Гелион</title>
</head>

<body class="loading index panels_white">
    <div id="panel"></div>
    <div id="foundation">
        <div id="headerLayout">
            <div id="subHeader3">
                <div class="limiter">
                    <div class="subTable">
                        <div class="subTableColumn">
                            <div class="subTableContainer" onclick="window.location = '/';">
                                <div id="logo"><span><img src="<?=header_logo;?>"></span></div>
                                <div id="geoPosition">
                                    <ul><li><div class="user-geo-position"><div class="user-geo-position-value"><a href="#" class="user-geo-position-value-link" style="max-width: -webkit-fill-available;margin-top: 10px;">Курган и Курганская область.</a></div> </div> </li> </ul>
                                </div>
                            </div>
                        </div>
                        <div class="subTableColumn"><div class="subTableContainer"><div id="topHeading"><div class="vertical"><p><span style="color: #000000; font-size: 11pt;"><?=description_header;?></span></p></div></div></div>
                        </div>
                        <div class="subTableColumn">
                            <div class="subTableContainer">
                                <div id="topTools">
                                

                                    <?php 
                                    require "db.php";
                                    ?>

                                    <?php if ( isset($_SESSION['logged_user']) ): ?>
                                        Авторизован! <?php echo ($_SESSION['Name_user']); ?>
                                        
                                        <br><a href="/resources/logout.php">Выйти</a>
                                        <?php else : ?>
                                   <div id="topToolsLeft"> <a href="/resources/login.php">Авторизация</a><br>
                                    <a href="/resources/signup.php">Регистрация</a> </div>
                                    <?php endif; ?>
                                    




                                    <div id="topToolsRight">
                                        <span class="heading"><?=number_1;?></span>
                                         <span class="heading"><?=number_2;?></span>
                                        <a href="#" class="openWebFormModal link callBack" onclick="return $('#webmodal_call').addClass('visible');">Заказать звонок</a>
                                        <?php require('modals/call.php'); ?>
                                    </div>
                                </div>
                                <div id="topSearchLine">
                                    <div id="topSearch2">
                                        <form action="/search" method="GET" id="topSearchForm">
                                            <div class="searchContainerInner">
                                                <div class="searchContainer">
                                                    <div class="searchColumn">
                                                        <input type="text" name="q" value="" autocomplete="off" placeholder="Поиск по каталогу магазина" id="searchQuery">
                                                    </div>
                                                    <div class="searchColumn">
                                                        <input type="submit" name="send" value="Y" id="goSearch">
                                                        <input type="hidden" name="r" value="Y">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="searchResult"></div>
                                    <div id="searchOverlap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="subTableColumn">
                            <div class="subTableContainer">
                                <div class="cart">
                                    <div id="flushTopCart">
                                        <!--'start_frame_cache_FKauiI'-->
                                        <div class="cartTable">
                                            <div class="cartTableColumn">
                                                <div class="cartIcon">
                                                    <a href="/cart" class="countLink active">
                                                        <span class="count">0</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cartTableColumn">
                                                <div class="cartToolsRow">
                                                    <a class="heading">
                                                        <span class="cartLabel">
                                                            В корзине </span>
                                                        <span class="total">
                                                            пока пусто </span>
                                                    </a>
                                                </div>
                                                <div class="cartToolsRow">
                                                    <a class="order active" href="/cart">Оформить заказ </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="subHeaderLine" class="color_theme">
                <div class="limiter">
                    <div class="subLineContainer">
                        <div class="subLineLeft">
                            <ul id="subMenu" style="visibility: visible;">
                                <li><a href="/main" >О компании</a></li>
                                <li><a href="/catalog">Каталог</a></li>
                                <li><a href="/main">Услуги</a></li>
                                <li><a href="/brands">Производители</a></li>
                                <?php  if(isset($_SESSION['logged_user'])) :?><li><a href="/cab_user">Личный кабинет</a></li><?endif;?>
                                <?php $pages = $pdo->prepare("select id, name from pages"); $pages->execute(); while($row = $pages->fetch()): ?>
                                    <li><a href="/pages/<?=$row['id'];?>"><?=$row['name'];?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main" class="color_white">
            <div class="limiter">
                <div class="compliter">
                    <div id="left">
                        <a href="#" class="heading orange" id="catalogMenuHeading">Каталог товаров<ins></ins></a>
                        <div class="collapsed">

                            <ul id="leftMenu">
                                <?php $categories = $pdo->prepare("select * from categories"); $categories->execute(); while($row = $categories->fetch()): ?>
                                <li class="eChild activeDrop">
                                    <a href="/catalog/<?=$row['id'];?>" class="menuLink">
                                        <span class="tb">
                                            <span class="pc">
                                                <img src="<?=$row['image'];?>" alt="<?=$row['name'];?>">
                                            </span>
                                            <span class="tx"><?=$row['name'];?></span>
                                        </span>
                                    </a>
                                    <div class="drop">
                                        <ul class="menuItems" menu-category="<?=$row['id'];?>">
                                            <li><a href="/catalog/<?=$row['id'];?>" class="menuLink"><span><?=$row['name'];?></span><small></small></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <script><?php $brands = $pdo->prepare("select * from brands limit 4"); $brands->execute(); while($row = $brands->fetch()): if(!isset($row["category"])) continue; foreach(json_decode($row["category"]) as $key) echo '$(`[menu-category="'.$key.'"]`).append(`<li><a href="/catalog/'.$key.'?brand='.$row['name'].'" class="menuLink">'.$row['name'].'<small></small></a></li>`);'; endwhile; ?> </script>
                            <style>@media (min-width: 1024px) { .eChild:hover .drop { display: table!important; } } #left .collapsed { display: block; } #subHeaderLine { height: auto; } @media (max-width: 1024px) { #footerLine { display: none;} }</style>
                        </div>
                    </div>

                    <div class="container mt-4" id="right">

                       <?php require(page); ?>

                </div>
            </div>
        </div>
        <div id="footer" class="variant_1" style="padding-top: 0px; margin-top: 30px;">
            <div id="rowFooter">
                <div id="leftFooter">
                    <div class="footerRow">
                        <div class="column">
                            <span class="heading">Каталог</span>
                            <ul class="footerMenu">

                            <?php $categories = $pdo->prepare("select * from categories"); $categories->execute(); while($row = $categories->fetch()): ?>
                                <li><a href="/catalog/<?=$row['id'];?>"><?=$row['name'];?></a></li>
                                <?php endwhile; ?>            
                            </ul>
                        </div>
                        <div class="column">
                            <span class="heading">Помощь и сервисы</span>
                            <ul class="footerMenu">
                                <li><a href="/main" target="_blank">О компании</a></li>
                                <li><a href="/catalog">Каталог</a></li>
                                <li><a href="/main">Услуги</a></li>
                                <li><a href="/brands">Производители</a></li>
                                <?php $pages = $pdo->prepare("select id, name from pages"); $pages->execute(); while($row = $pages->fetch()): ?>
                                    <li><a href="/pages/<?=$row['id'];?>"><?=$row['name'];?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="rightFooter">
                    <table class="rightTable">
                        <tr class="footerRow">
                            <td class="leftColumn"><?=footer_1;?></td>
                            <td class="rightColumn"><div class="wrap"><?=footer_2;?></div></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="footerBottom">
                <div class="creator">Интернет-магазин  <a href="https://vk.com/gelionkgn" target="_blank" style="display: initial;text-decoration: none;color: #e92b32;">Типографии Гелион ИП Исаев И.Н.</a> </div>
                <div class="social">
                    <noindex>
                        <ul class="sn">
                            <li><a href="<?=soc_vk;?>" target="_blank" class="vk" rel="nofollow"></a></li>
                            <li><a href="<?=soc_ig;?>" target="_blank" class="go" rel="nofollow"></a></li>
                            <li><a href="<?=soc_yt;?>" target="_blank" class="yo" rel="nofollow"></a></li>
                        </ul>
                    </noindex>
                </div>
            </div>
        </div>
        <div id="footerLine">
            <div class="wrapper">
                <div class="col">
                    <div class="item"><a onclick="return $('#webmodal_call').addClass('visible');" href="#" class="callback"><span class="icon"></span> Обратная связь</a></div>
                </div>
                <div class="col">
                    <div id="flushFooterCart">
                        <div class="item">
                            <a class="cart" href="/cart"><span class="icon"></span>Корзина<span class="mark">0</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

#breadcrumbs{
	margin-bottom: 12px;
	line-height: 21px;
	overflow: hidden;
	font-size: 12px;
}

#breadcrumbs ul{
	overflow: hidden;
	list-style: none;
	padding: 0;
	margin: 0;
}

#breadcrumbs ul li{
	vertical-align: middle;
	display: inline-block;
}

#breadcrumbs ul li a{
	text-decoration: none;
	display: inline-block;
	line-height: 21px;
}

#breadcrumbs ul li span{
	display: inline-block;
	line-height: 21px;	
}

#breadcrumbs .arrow{
	vertical-align: middle;
	display: inline-block;
	font-family: arial;
	font-size: 18px;
	margin: 0 12px;
}

@media all and (max-width: 1024px) {

	#breadcrumbs{
		position: relative;
		min-width: 100%;
		overflow-x: auto;
		height: 21px
	}

	#breadcrumbs ul{
		white-space: nowrap;
		overflow: auto;
	}

	#breadcrumbs li{
		white-space: nowrap;
	}

	#breadcrumbs::after {
	    background: -moz-linear-gradient(left, rgba(255,255, 255, 0.2), #ffffff 100%);
	    background: -webkit-linear-gradient(left, rgba(255,255, 255, 0.2), #ffffff 100%);
	    background: -o-linear-gradient(left, rgba(255,255, 255, 0.2), #ffffff 100%);
	    background: -ms-linear-gradient(left, rgba(255,255, 255, 0.2), #ffffff 100%);
	    background: linear-gradient(to right, rgba(255,255, 255, 0.2), #ffffff 100%);
	    pointer-events: none;
	    position: absolute;
	    right: 0;
	    top: 0;
	    height: 100%;
	    content: '';
	    width: 35px;
	}

}

#catalogLineList{
	margin-bottom: 24px;
}

#catalogLineList .itemRow{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	border: 1px solid #e7e8ea;
	border-collapse: collapse;
	margin-bottom: 24px;
	border-radius: 4px;
	display: table;
	width: 100%;
}

#catalogLineList .itemRow:hover{
	border: 1px solid #cccccc;
}

#catalogLineList .column{
	vertical-align: middle;
	display: table-cell;
	position: relative;
	padding: 24px 0px;
}

#catalogLineList .column:first-child{
	width: 400px;
	border: 0px;
}

#catalogLineList .column:last-child{
	border-left: 1px solid #e7e8ea;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 24px 24px;
	height: 100%;
	width: 270px;
}

#catalogLineList .name{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	text-decoration: none;
	display: inline-block;
	margin-bottom: 12px;
	margin-right: 12px;
	font-size: 18px;
	color: #000;
}

#catalogLineList .description{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	margin-bottom: 12px;
	padding-right: 12px;
	font-size: 12px;
	color: #888888;
}

#catalogLineList .prop{
	border-spacing: 0px;
	width: 50%;
}

#catalogLineList .picture{
	position: relative;
	text-align: center;
	display: block;
}

#catalogLineList .picture img{
	max-height: 250px;
	max-width: 80%;
}

#catalogLineList .markerContainer{
	position: absolute;
	z-index: 22;
	top: 8px;
	left: 8px;
}

#catalogLineList .marker {
	font: normal normal 12px "roboto_ltregular" , arial , sans-serif;
	background-color: #424242;
	margin-bottom: 8px;
	color: #fff;
	padding: 3px 4px;
	line-height: 16px;
	z-index: 2;
}

#catalogLineList .rating {
	display: inline-block;
	vertical-align: middle;
	margin-bottom: 12px;
	margin-right: 12px;
	position: relative;
	overflow: hidden;
	margin-top: 4px;
	height: 15px;
	width: 79px;
	z-index: 2;
}

#catalogLineList .rating i {
	background: url(/bitrix/components/dresscode/catalog.section/templates/line/images/rating.png) repeat 0 0px transparent;
	height: 15px;
	width: 79px;
	position: absolute;
	display: block;
	left: 0px;
	top: 0px;
}

#catalogLineList .rating i.m {
	background: url(/bitrix/components/dresscode/catalog.section/templates/line/images/rating.png) repeat 0 -14px transparent;
	width: 0px;
	z-index: 10;
}

#catalogLineList .priceLabel{
	font-family: 'robotobold';
	margin-right: 4px;
	font-size: 21px;
	float: left;
}

#catalogLineList .price{
	font-family: 'robotobold';
	text-decoration: none;
	margin-bottom: 12px;
	position: relative;
	font-size: 21px;
	display: block;
	color: #000000;
}

#catalogLineList .price .measure{
	font-size: 16px;
}

#catalogLineList .price .discount{
	font-family: 'roboto_ltregular';
	position: absolute;
	padding-left: 4px;
	font-size: 14px;
	color: #888888;
	right: 0px;
	top: -18px;
}

#catalogLineList .addCart{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	line-height: 60px;
	border-radius: 4px;
	color: #ffffff;
	height: 60px;
	font-size: 18px;
	text-align: center;
	display: block;
	text-decoration: none;
	margin-top: 16px;
	margin-bottom: 12px;
}

#catalogLineList .icon{
	vertical-align: middle;
	display: inline-block;
}

#catalogLineList .addCart .icon{
	padding-right: 12px;
	margin-top: -6px;
}

#catalogLineList .row{
	margin-bottom: 12px;
	overflow: hidden;
}

#catalogLineList .label{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	font-family: 'roboto_condensedlight';
	text-decoration: none;
	line-height: 21px;
	font-size: 15px;
	color: #717171;
	display: block;
	width: 45%;
	float: left;
}

#catalogLineList .label:hover{
	color: #000000;
}

#catalogLineList .label:nth-child(1),
#catalogLineList .label:nth-child(3){
	width: 55%;
}

#catalogLineList .label .icon{
	padding-right: 6px;
	margin-top: -4px;
}

#catalogLineList .article{
	background-color: #f3f3f3;
	border-radius: 4px;
	text-align: center;
	line-height: 32px;
	padding: 0 12px;
	color: #888888;
}

#catalogLineList .skuPropertyName{
	margin-bottom: 4px;
	font-size: 13px;
	color: #000000;
}

#catalogLineList .skuPropertyList{
	overflow: hidden;
	list-style: none;
	margin: 0px -4px;
	padding: 0px;
}

#catalogLineList .skuProperty{
	overflow: hidden;
	margin: 12px 0;
}

#catalogLineList .skuProperty li{
	box-sizing: border-box;
	overflow: hidden;
	min-width: 35px;
	padding: 4px;
	float: left;
}

/*#catalogLineList .skuProperty .selected .skuPropertyLink{
	position: relative;
	top: -2px;
}*/

#catalogLineList .skuProperty .disabled{
	display: none;
}

#catalogLineList .skuPropertyLink{
	border: 1px solid #dddddd;
	text-decoration: none;
	text-align: center;
	line-height: 21px;
	padding: 4px 6px;
	min-width: 30px;
	font-size: 13px;
	display: block;
	color: #000000;
}

#catalogLineList .skuPropertyList img{
	vertical-align: middle;
    max-height: 100%;
 	max-width: 100%;
}

#catalogLineList .prop a{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	color: #000000;
}

#catalogLineList .oSkuDropDownProperty:first-child{
	margin: 0px;
}

#catalogLineList .oSkuDropDownProperty{
	overflow: visible;
	margin-top: 12px;
}

#catalogLineList .oSkuDropDownProperty .oSkuDropdownListItem{
    box-sizing: content-box;
    overflow: visible;
    min-width: auto;
    padding: 0px;
    float: none;
}

#catalogLineList .oSkuDropdown{
	background-color: #ffffff;
    border: 1px solid #e7e8ea;
	position: relative;
	line-height: 13px;
	font-size: 13px;
	display: block;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	border-radius: 2px;
	max-width: 250px;
	width: auto;
	margin-top: 4px;
	/*z-index: 99;*/
}

#catalogLineList .oSkuCheckedItem{
	background: url(/bitrix/components/dresscode/catalog.section/templates/line/images/selectArrow.png) 97% 50% no-repeat transparent;
	padding: 12px 30px 12px 8px !important;
	border-radius: 4px;
	cursor: pointer;
	display: block;
	color: #000000;
}

#catalogLineList .oSkuCheckedItem:hover{
	opacity: 0.8;
}

#catalogLineList .oSkuCheckedItem:active{
	position: relative;
	top: 1px;
}

#catalogLineList .oSkuDropdown label:before,
#catalogLineList .oSkuCheckboxList label:before {
	display: none;
}

#catalogLineList .oSkuDropdownList {
	background-color: #ffffff;
    border: 1px solid #e7e8ea;
    visibility: hidden;
    position: absolute;
    list-style: none;
    margin: 0 -1px;
    opacity: 0;
    padding: 0;
    z-index: 2;
    top: 42px;
    right: 0;
    left: 0;
}

#catalogLineList .oSkuDropdownList.opened{
	visibility: visible;
	opacity: 1;
}

#catalogLineList .pics .oSkuDropdownList{
	top: 52px;
}

#catalogLineList .oSkuDropdownList .skuPropertyValue{
	border-top: 1px solid #e7e8ea;
	position: relative;
	display: block;
}

#catalogLineList .oSkuDropdownList .skuPropertyValue:first-child{
	border-top: 0px;
}

#catalogLineList .oSkuDropdownList .selected{
	box-shadow: 1px 1px 12px #f1f1f1 inset;
	font-family: "robotomedium";
	background-color: #f9f9f9;
	cursor: pointer;
	color: #ffffff;
	opacity: 0.8;
}

#catalogLineList .oSkuDropdownList .skuPropertyValue:hover{
	background-color: #f9f9f9;
	cursor: pointer;
	color: #ffffff;
	opacity: 0.8;
}

#catalogLineList .oSkuDropdownList .oSkuPropertyItemLink{
	padding: 12px 8px !important;
	text-decoration: none;
	line-height: 18px;
	text-align: left;
	font-size: 13px;
	color: #000000;
	display: block;
	border: 0px;
}

#catalogLineList .oSkuDropdownList .oSkuDropdownListItem.selected .oSkuPropertyItemLink{
	border: 0px;
}

#catalogLineList .oSkuDropdownList .oSkuDropdownListItem.disabled{
	display: none;
}

#catalogLineList .oSkuDropdownList .skuPropertyValue:active .oSkuPropertyItemLink,
#catalogLineList .oSkuDropdownList .oSkuPropertyItemLink:active{
	position: relative;
	top: 1px;
}

#catalogLineList .oSkuDropdownList .skuPropertyValue.loading:after{
	left: 24px;
}

.removeFromWishlist{
	display: none;
}

#left{
	position: relative;
}

#left .collapsed{
	position: absolute;
	width: 100%;
	z-index: 99;
}

.changeName + br{
	display: none;
}

.cheaper-product-name{
	visibility: hidden;
}

.videoFrame{
	border: 0;
}

#catalogElement{
	border-top: 1px solid #e7e8ea;
}

#catalogElement .getStoresWindow{
	text-decoration: none;
}

#elementSmallNavigation{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border-bottom: 1px solid #e7e8ea;
	background-color: #f9f9f9;
	line-height: 50px;
	overflow: hidden;
	padding: 0 24px;
	display: none;
	height: 50px;
}

#elementSmallNavigation .tab{
	padding-right: 18px;
	margin-left: 18px;
	float: left;
}

#elementSmallNavigation .tab:first-child{
	border-left: 1px solid #e7e8ea;
	padding-left: 18px;
	margin-left: 0px;
}

#elementSmallNavigation a{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	text-transform: uppercase;
	text-decoration: none;
	text-align: center;
	position: relative;
	font-size: 13px;
	color: #000000;
    display: block;
}

#elementSmallNavigation a:hover{
	color: #888888;
}

#elementSmallNavigation a:active{
	position: relative;
	top: 1px;
}

#elementSmallNavigation a img{
	vertical-align: middle;
	padding-right: 12px;
}

#tableContainer{
	border-collapse: collapse;
	table-layout: fixed;
	display: table;
	width: 100%;
}

#tableContainer .column{
	display: table-cell;
}

#tableContainer .column:nth-child(2){
	vertical-align: middle;
	padding-bottom: 24px;
}

#elementNavigation{
	background-color: #f3f3f3;
	position: relative;
	padding-left: 24px;
	text-align: right;
	width: 355px;
}

#elementNavigation.fixed .tabs{
	position: fixed;
	width: 355px;
	top: 0;
}

#elementNavigation .tabs.maxScroll{
	position: absolute;
	bottom: 0px;
	right: 0px;
	top: unset;
}

#elementNavigation .tabs a{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	text-decoration: none;
	display: inline-block;
	padding: 16px 24px;
	font-size: 13px;
	color: #000000;
}

#elementNavigation .tabs .tab{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	padding: 0;
}

#elementNavigation .tabs .tab.disabled,
#elementSmallNavigation .tabs .tab.disabled{
	display: none;
}

#elementNavigation .tabs .tab.active a{
	-webkit-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;
	background-color: #ffffff;
}

#elementNavigation .tabs img{
	-webkit-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;

	vertical-align: middle;
	padding-left: 24px;
	opacity: 0.8;
}

#elementNavigation .tabs a:hover{
	color: #888888;
}

#elementNavigation .tabs a:hover img{
	opacity: 1;
}

#smallElementTools{
	padding: 0 24px;
	display: none;
}

#smallElementTools .fastBack{
	display: inline-block;
	width: 220px;
	height: 45px;
	margin-bottom: 12px;
	line-height: 45px;
	text-align: center;
	background: #fff;
	border-radius: 2px;
}

#smallElementTools .smallSpecialTime{
	display: none;
}

.smallElementToolsContainer{
	padding: 24px 24px 12px 24px;
	margin-bottom: 18px;
	border: 1px solid #e7e8ea;
}

#elementTools .priceContainer{
	display: inline-block;
}

#smallElementTools .priceContainer{
	display: inline-block;
	vertical-align: middle;
	/*padding-right: 18px;*/ /*появлялся отступ, если после цены укзаны "шт"*/
}

#elementContainer #smallElementTools .purchaseBonus{
	display: block;
	vertical-align: middle;
	margin-left: 0;
	margin-right: 0;
	margin-bottom: 0;
	margin-top: 12px;
}

#smallElementTools .columnRowWrap{
	font-size: 0;
}

#smallElementTools .columnRow{
	display: inline-block;
	vertical-align: middle;
	width: 50%;
	box-sizing: border-box;
	padding-right: 6px;
}

#smallElementTools .columnRow:last-child{
	padding: 0 0 0 6px;
}

#smallElementTools .columnRow .fastBack{
	height: 60px;
	line-height: 60px;
	box-sizing: border-box;
	border-radius: 4px;
	border: 1px solid #d8d8d8;
}

#smallElementTools .columnRow .addCart{
	margin-top: 0;
}

#smallElementTools .columnRow .addCart{
	width: 100%;
	margin-bottom: 6px;
}

#smallElementTools .columnRow .fastBack{
	width: 100%;
	margin-bottom: 6px;
}

#smallElementTools .secondTool .row{
	display: inline-block;
	vertical-align: middle;
	margin-right: 24px;
}

#smallElementTools .smallElementToolsContainer .secondTool .row:last-child{
	margin-right: 0;
	margin-bottom: 12px;
}

#elementTools{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	background-color: #f3f3f3;
	padding: 24px 24px 0 24px;
	position: relative;
	width: 400px;
	z-index: 1;
}

#elementTools.fixed .fixContainer{
	background-color: #f3f3f3;
	margin-top: 12px;
	position: fixed;
	width: 400px;
	z-index: 33;
	top: 0;
}

#elementTools .fixContainer.maxScroll{
	padding-bottom: 12px;
	position: absolute;
	bottom: 0px;
	top: unset;
	left: 24px;
}

#elementTools .picture{
	display: none;
}

#elementTools .picture img{
	max-width: 80px;
}

#elementTools.fixed .fixContainer .picture{
	display: block;
}

#elementTools .row,
#smallElementTools .row{
	margin-bottom: 12px;
}

#catalogElement .qtyBlock{
	margin-bottom: 12px;
}

#catalogElement .qtyBlock  .qty {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    vertical-align: middle;
    display: inline-block;
    text-align: center;
    font-size: 12px;
    margin: 0 2px;
    height: 19px;
    width: 40px;
    padding: 0 2px;
    border: 0;
}

#catalogElement .qtyBlock  .qty {
    background-color: #e7e8ea;
    color: #000000;
}

#catalogElement .qtyBlock  .qty.error{
	border: 1px solid #ff0000;
}

#catalogElement .qtyBlock .plus,
#catalogElement .qtyBlock .minus {
    vertical-align: middle;
    display: inline-block;
    height: 19px;
    width: 19px;
}

#catalogElement .qtyBlock .plus,
#catalogElement .qtyBlock .minus{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/plusMinusElement.png) 0 0 no-repeat #424242;
}

#catalogElement .qtyBlock .plus{
	background-position: 0 -19px;
}

#catalogElement .qtyBlock .plus:hover{
	background-position: -19px -19px;
}

#catalogElement .qtyBlock .plus:active{
	background-position: -38px -19px;
}

#catalogElement .qtyBlock .minus:hover{
	background-position: -19px 0x;
}

#catalogElement .qtyBlock .minus:active{
	background-position: -38px 0px;
}

#catalogElement .qtyBlock label {
	padding-right: 12px;
}

#elementTools .secondTool .row:last-child{
	margin-bottom: 0px;
}

#elementTools .row img,
#smallElementTools .row img{
	vertical-align: middle;
	padding-right: 6px;
	margin-top: -4px;
}

#elementTools .requestPrice{
	cursor: pointer;
}

#elementTools .label,
#smallElementTools .label{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
    font-family: 'roboto_condensedlight';
    text-decoration: none;
    line-height: 21px;
    font-size: 15px;
    color: #717171;
}

#smallElementTools .label{
	vertical-align: middle;
	display: inline-block;
}

#smallElementTools .qtyBlock img{
	margin-top: 0px;
}

#elementTools .label:hover,
#smallElementTools .label:hover{
	color: #000000;
}

#elementTools .label:active,
#smallElementTools .label:active{
	position: relative;
	top: 1px;
}

#elementTools .article,
#smallElementTools .article{
	margin-bottom: 12px;
	font-size: 14px;
	color: #888888;
}

#elementTools .price,
#smallElementTools .price{
	font-family: 'robotobold';
	text-decoration: none;
	margin-bottom: 12px;
	position: relative;
	font-size: 21px;
	display: block;
	color: #000000;
}

#elementTools .price .discount,
#smallElementTools .price .discount{
	color: #888888;
}

#elementTools .price .oldPriceLabel,
#smallElementTools .price .oldPriceLabel{
	font-family: 'roboto_condensedlight';
	text-decoration: none;
	margin-bottom: 6px;
	margin-right: 12px;
	font-size: 14px;
	display: inline-block;
	color: #888888;
}

#elementTools .purchaseBonus{
	font-family: "roboto_condensedlight";
	margin-top: 6px;
	font-size: 14px;
	color: #888888;
	display: block;
}

#elementTools .priceBlock,
#smallElementTools .priceBlock{
	display: block;
}

#elementTools .purchaseBonus span{
	display: inline-block;
	vertical-align: top;
	padding-right: 6px;
	font-family: "roboto_cnregular";
}

#smallElementTools .purchaseBonus{
	margin-top: 6px;
	font-family: "roboto_condensedlight";
	font-size: 14px;
	color: #888888;
}

#smallElementTools .purchaseBonus span{
	display: inline-block;
	vertical-align: top;
	padding-right: 6px;
	font-family: "roboto_cnregular";
}

#elementTools .oldPriceDifference{

}

#elementTools .priceValue,
#smallElementTools .priceValue{
	border-bottom: 1px dashed #bbbbbb;
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	display: inline-block;
	padding-bottom: 8px;
	color: #000000;
}

#elementTools .priceValue:hover,
#smallElementTools .priceValue:hover{
	color: #333333;
}

#elementTools .priceValue:active,
#smallElementTools .priceValue:active{
	position: relative;
	top: 1px;
}

#elementTools .priceIcon,
#smallElementTools .priceIcon{
	margin-right: 12px;
}

#elementTools .addCart,
#smallElementTools .addCart{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	line-height: 60px;
	border-radius: 4px;
	color: #ffffff;
	height: 60px;
	font-size: 16px;
	text-align: center;
	display: block;
	text-decoration: none;
	margin-top: 16px;
	/*font-family: 'roboto_condensedlight';*/
	margin-bottom: 12px;
	width: 220px;
}

#elementTools .fastBack{
	display: inline-block;
	width: 220px;
	height: 45px;
	margin-bottom: 12px;
	line-height: 45px;
	text-align: center;
	background: #fff;
	border-radius: 2px;
}

#elementTools .addCart.added,
#smallElementTools .addCart.added{
	background: #2b2b2b;	
}

#elementTools .addCart.added:hover,
#smallElementTools .addCart.added:hover{
	background: #3b3b3b;
}


/*#elementTools .outOfStock,
#smallElementTools .outOfStock{
	color: #ff0000;
}

#elementTools .outOfStock:hover,
#smallElementTools .outOfStock:hover{
	color: #ff0000;
}*/
#elementTools .rating,
#elementContainer .mainContainer .rating,
#smallElementTools .rating{
	display: inline-block;
	vertical-align: middle;
	margin-left: 6px;
	margin-top: -4px;
	position: relative;
	overflow: hidden;
	height: 15px;
	width: 79px;
	z-index: 2;
}

#elementTools .rating i,
#elementContainer .mainContainer .rating i,
#smallElementTools .rating i{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/rating.png) repeat 0 0px transparent;
	height: 15px;
	width: 79px;
	position: absolute;
	display: block;
	left: 0px;
	top: 0px;
}

#elementTools .rating i.m,
#elementContainer .mainContainer .rating i.m,
#smallElementTools .rating i.m{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/rating.png) repeat 0 -14px transparent;
	width: 0px;
	z-index: 10;
}

#elementTools .icon,
#smallElementTools .icon{
	vertical-align: middle;
	display: inline-block;
}

#elementTools .addCart .icon,
#smallElementTools .addCart .icon{
	padding-right: 12px;
	margin-top: -6px;
}

#smallElementTools .mainTool,
#smallElementTools .secondTool{

}

.ya-share-label{
	margin-bottom: 6px;
	margin-top: 30px;
	color: #717171;
}

#elementContainer{
	position: relative;
	width: 100%;
}

#elementContainer .mainContainer{
	border-collapse: collapse;
	table-layout: fixed;
	display: table;
	width: 100%;
}

#elementContainer .description{
	margin: 12px 0;
	font-family: "roboto_ltregular";
}

#elementContainer .description .heading{
	margin-bottom: 6px;
	font-size: 16px;
}

#elementContainer .changeShortDescription{
	font-size: 13px;
	line-height: 16px;
}

#elementContainer .description .readMore{
	-webkit-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;
	margin: 4px 0;
	display: block;
	color: #888888;
}

#elementContainer .description .readMore:hover{
	color: #000000;
}

#elementContainer .mainContainer .col{
	position: relative;
	vertical-align: middle;
	display: table-cell;
	padding: 24px 0;
	width: 50%;
}

#elementContainer .mainContainer .secondCol{
	position: static;
	padding-right: 24px;
}

#elementContainer .mainContainer .col.hide{
	display: none;
}

#elementContainer .mainContainer .col:first-child{
	vertical-align: middle;
	text-align: center;
}

#elementContainer #pictureContainer .pictureSlider{
	table-layout: fixed;
}

#elementContainer #pictureContainer .pictureSlider .item:first-child{
	display: block;
}

#elementContainer #pictureContainer .pictureSlider .item{
	padding: 0 24px;
	display: none;
}

#elementContainer #pictureContainer .item a{
	text-align: center;
	display: block;
}

#elementContainer #pictureContainer .item a img{
	vertical-align: middle;
	max-height: 100%;
	max-width: 90%;
}

#elementContainer #moreImagesCarousel{
	transition: all 0.3s ease-in-out;
	visibility: hidden;
	position: relative;
	padding-top: 24px;
	margin-top: 24px;
	overflow: hidden;
	opacity: 0;
}

#elementContainer #moreImagesCarousel.show{
	visibility: visible;
	opacity: 1;
}

#elementContainer #moreImagesCarousel.hide{
	display: none;
}

#elementContainer #moreImagesCarousel #moreImagesLeftButton,
#elementContainer #moreImagesCarousel #moreImagesRightButton{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/carouselArrowSmall.png) 0 0 no-repeat transparent;
	position: absolute;
	margin-top: 3px;
	height: 16px;
	opacity: 0.5;
	z-index: 2;
	width: 14px;
	top: 50%;
}

#elementContainer #moreImagesCarousel #moreImagesLeftButton:hover,
#elementContainer #moreImagesCarousel #moreImagesRightButton:hover{
	opacity: 0.8;
}

#elementContainer #moreImagesCarousel #moreImagesLeftButton:active,
#elementContainer #moreImagesCarousel #moreImagesRightButton:active{
	opacity: 1;
}

#elementContainer #moreImagesCarousel #moreImagesLeftButton{
	left: 32px;
}

#elementContainer #moreImagesCarousel #moreImagesRightButton{
	background-position: -14px 0;
	right: 32px;
}

#elementContainer #moreImagesCarousel .carouselWrapper{
	overflow: hidden;
	margin: auto;
	width: 80%;
}

#elementContainer #moreImagesCarousel .slideBox{
	position: relative;
	overflow: hidden;
	list-style: none;
	height: 62px;
	padding: 0;
	margin: 0;
}

#elementContainer #moreImagesCarousel .slideBox .item{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;

	position: relative;
	text-align: center;
	line-height: 50px;
	opacity: 0.5;
	height: 50px;
	float: left;
}

#elementContainer #moreImagesCarousel .slideBox .item.selected{
	opacity: 1;
}

#elementContainer #moreImagesCarousel .slideBox .item.selected:after{
	transform: translateX(-50%);
	border-bottom: 2px solid #000000;
	position: absolute;
	display: block;
	content: "";
	width: 30%;
	left: 50%;
	bottom : -12px;
}

#elementContainer #moreImagesCarousel .slideBox .item a{
	display: block;
	line-height: 50px;
	height: 50px;
}


#elementContainer #moreImagesCarousel .slideBox .item img{
	vertical-align: middle;
	/*margin-top: -4px;*/
    max-height: 100%;
    max-width: 100%;
}

#elementContainer .mainContainer .markerContainer{
	position: absolute;
	z-index: 3;
	left: 24px;
	top: 24px;
}

#elementContainer .wishCompWrap{
	position: absolute;
	z-index: 2;
	right: 30px;
	top: 24px;
}

#elementContainer .wishCompWrap .elem{
	display: block;
	position: relative;
	width: 34px;
	height: 34px;
	line-height: 34px;
	text-align: center;
	margin-bottom: 8px;
	border: 1px solid #f1f1f1;
	border-radius: 2px;
	background: #fff;
	font-size: 0;
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

#elementContainer .wishCompWrap .elem:before,
#elementContainer .wishCompWrap .elem:after{
	content: "";
	position: absolute;
	left: 9px;
	top: 9px;
	width: 16px;
	height: 16px;
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/wishCompImage.png") 0 0 no-repeat;
	transition: all 0.2s ease-in-out;
}

#elementContainer .wishCompWrap .elem:after{ opacity: 0; }
#elementContainer .wishCompWrap .addWishlist:before{ background-position: 0px 0px; }
#elementContainer .wishCompWrap .addWishlist:after{ background-position: -16px 0px; }
#elementContainer .wishCompWrap .addCompare:before{ background-position: 0px -16px; }
#elementContainer .wishCompWrap .addCompare:after{ background-position: -16px -16px; }
#elementContainer .wishCompWrap .elem:hover { border-color: #e7e8ea; background: #e7e8ea; }
#elementContainer .wishCompWrap .elem:active { top: 1px; }
#elementContainer .wishCompWrap .elem.added:before { opacity: 0; }
#elementContainer .wishCompWrap .elem.added:after { opacity: 1; }

#elementContainer .wishCompWrap .elem img{
	display: none;
	display: inline-block;
	vertical-align: middle;
}

#elementContainer .marker {
	font: normal normal 12px "roboto_ltregular" , arial , sans-serif;
	background-color: #424242;
	margin-bottom: 8px;
	color: #fff;
	padding: 3px 4px;
	line-height: 16px;
	z-index: 2;
}

#elementContainer .brandImageWrap{
	display: block;
}


#elementContainer .brandImageWrap .tb{
	width: auto;
}

#elementContainer .brandImage{
	vertical-align: middle;
	display: inline-block;
	margin-bottom: 24px;
	margin-right: 66px;
}

#elementContainer .bindAction{
	vertical-align: middle;
	display: inline-block;
	margin-bottom: 24px;
	line-height: 18px;
	font-size: 13px;
}

/*#elementContainer .tb{
	width: auto;
}*/

#elementContainer .bindActionImage{
	width: 38px;
}

#elementContainer .bindActionImage .image{
	display: block;
	width: 30px;
	height: 30px;
	background-position: center center;
	background-repeat: no-repeat;
	background-size: contain;
}

#elementContainer .bindAction a {
	position: relative;
	font-size: 13px;
	text-decoration: none;
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

#elementContainer .bindAction a:active {
	position: relative;
	top: 1px;
}

.newReviewTable{
	font-size: 0;
}

.newReviewTable .left{
	display: inline-block;
	width: 50%;
	vertical-align: top;
	font-size: 14px;
	padding-right: 24px;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
}

.newReviewTable .right{
	display: inline-block;
	width: 50%;
	vertical-align: top;
	font-size: 14px;
}

.reviewsBtnWrap{
	padding-bottom: 6px;
	border-bottom: 1px solid #e8e8e8;
}

.reviewsBtnWrap .row{
	display: inline-block;
	vertical-align: top;
	margin: 0 36px 12px 0;
    font-family: 'roboto_ltregular';
    font-size: 13px;
}

.reviewsBtnWrap .row:last-child{
	margin-right: 0;
}

.reviewsBtnWrap .row img{
	vertical-align: middle;
	padding-right: 6px;
	margin-top: -4px;
}

.reviewsBtnWrap .label{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
    text-decoration: none;
    line-height: 21px;
    color: #717171;
}

.reviewsBtnWrap .labelDotted{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	display: inline-block;
	color: #000000;
	border-bottom: 1px dashed #b9b9b9;
}

.reviewsBtnWrap a.label:hover .labelDotted{
	border-color: #000000;
}

.reviewsBtnWrap a.label:hover{
	color: #000000;
}

.reviewsBtnWrap a.label:active{
	position: relative;
	top: 1px;
}




#elementContainer .brandImage img{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	vertical-align: middle;
	max-height: 34px;
	max-width: 200px;
}

#elementContainer .brandImage:hover img{
	opacity: 0.7;
}

#elementContainer .headingBox{
    table-layout: fixed;
    display: table;
    width: 100%;
}

#elementContainer .headingBox .heading{
	display: table-cell;
	vertical-align: top;
	padding-bottom: 12px;
	font-size: 16px;
}

#elementContainer .headingBox .moreProperties{
	vertical-align: top;
	display: table-cell;
	padding-right: 24px;
	padding-left: 12px;
	width: 40%;
}

#elementContainer .headingBox .morePropertiesLink{
	-webkit-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;
	/*text-decoration: none;*/
	color: #888888;
}

#elementContainer .headingBox .morePropertiesLink:hover{
	color: #000000;
}

#elementContainer .elementProperties .propertyTable{
	table-layout: fixed;
	display: table;
	width: 100%;
}

#elementContainer .elementProperties .propertyTable{
	font-size: 13px;
}

#elementContainer .elementProperties .propertyTable .propertyName,
#elementContainer .elementProperties .propertyTable .propertyValue{
	background-color: #ffffff;
	vertical-align: middle;
	display: table-cell;
	position: relative;
	overflow: hidden;
	padding: 2px 0;
}

#elementContainer .elementProperties .propertyTable .propertyValue{
	padding-left: 12px;
	width: 40%;
}

#elementContainer .elementProperties .propertyTable .analog{
	-webkit-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;
	color: #000000;
}

#elementContainer .elementProperties .propertyTable .analog:hover{
	color: #888888;
}

#elementContainer .elementProperties .propertyTable .propertyName:after{
    border-bottom: 1px dotted #cccccc;
    position: absolute;
    margin-left: 12px;
    height: 13px;
    content: '';
    width: 100%;
}

#elementContainer .elementSkuPropertyValue{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

#elementContainer .elementSkuPropertyValue.loading{
	opacity: 0.5;
}

#elementContainer .elementSkuVariantLabel{
	margin-top: 12px;
	font-size: 16px;
}

#elementContainer .elementSkuPropertyName{
	font-size: 13px;
	color: #888888;
}

#elementContainer .elementSkuPropertyList{
	overflow: hidden;
	list-style: none;
	margin: 0px -2px 0 -4px;
	padding: 0px;
}

#elementContainer .elementSkuProperty{
	overflow: hidden;
	margin: 6px 0 12px;
}

#elementContainer .elementSkuPropertyDropdown{
	margin: 6px 0 12px;
}

#elementContainer .elementSkuProperty li{
	box-sizing: border-box;
	overflow: hidden;
	min-width: 54px;
	padding: 4px 2px 2px 4px;
	float: left;
}

#elementContainer .elementSkuProperty .selected .elementSkuPropertyLink{
	position: relative;
	/*top: -2px;*/
}

#elementContainer .elementSkuProperty .disabled{
	display: none;
}

#elementContainer .elementSkuPropertyLink{
	border: 1px solid #dddddd;
	text-decoration: none;
	text-align: center;
	font-size: 13px;
	line-height: 22px;
	padding: 6px 6px;
	display: block;
	color: #000000;
}

#elementContainer .elementSkuPropertyLink:active{
	position: relative;
	top: 1px;
}

#elementContainer .elementSkuPropertyList img{
	vertical-align: middle;
    max-height: 100%;
 	max-width: 100%;
}

#catalogElement .elementSkuDropDownProperty{
	overflow: visible;
}

#catalogElement .elementSkuDropDownProperty .skuDropdownListItem {
    box-sizing: content-box;
    overflow: visible;
    min-width: auto;
    padding: 0px;
    float: none;
}

#catalogElement .skuDropdown{
	background-color: #ffffff;
    border: 1px solid #e7e8ea;
	position: relative;
	line-height: 13px;
	font-size: 13px;
	display: block;
	-webkit-user-select: none; 
	-moz-user-select: none;     
	-ms-user-select: none; 
	border-radius: 2px;
	width: 264px;
	margin-top: 4px;
}

#catalogElement .skuCheckedItem{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/selectArrow.png) 97% 50% no-repeat transparent;
	padding: 12px 30px 12px 8px !important;
	border-radius: 4px;
	display: block;
	cursor: pointer;
}

#catalogElement .skuCheckedItem:hover{
	opacity: 0.8;
}

#catalogElement .skuCheckedItem:active{
	position: relative;
	top: 1px;
}

#catalogElement .skuDropdown label:before,
#catalogElement .skuCheckboxList label:before {
	display: none;
}

#catalogElement .skuDropdownList {
	background-color: #ffffff;
    border: 1px solid #e7e8ea;
    visibility: hidden;
    position: absolute;
    list-style: none;
    margin: 0 -1px;
    opacity: 0;
    padding: 0;
    z-index: 2;
    top: 44px;
    right: 0;
    left: 0;
}

#catalogElement .skuDropdownList.opened{
	visibility: visible;
	opacity: 1;
}

#catalogElement .pics .skuDropdownList{
	top: 52px;
}

#catalogElement .skuDropdownList .elementSkuPropertyValue{
	border-top: 1px solid #e7e8ea;
	position: relative;
	display: block;
}

#catalogElement .skuDropdownList .elementSkuPropertyValue:first-child{
	border-top: 0px;
}

#catalogElement .skuDropdownList .selected{
	font-family: "robotomedium";
	background-color: #f9f9f9;
	cursor: pointer;
	color: #ffffff;
	opacity: 0.8;
}

#catalogElement .skuDropdownList .elementSkuPropertyValue:hover{
	background-color: #f9f9f9;
	cursor: pointer;
	color: #ffffff;
	opacity: 0.8;
}

#catalogElement .skuDropdownList .skuPropertyItemLink{
	padding: 12px 8px !important;
	text-decoration: none;
	line-height: 18px;
	text-align: left;
	font-size: 13px;
	color: #000000;
	display: block;
	border: 0px;
}

#catalogElement .skuDropdownList .skuDropdownListItem.selected .skuPropertyItemLink{
	border: 0px;
}

#catalogElement .skuDropdownList .skuDropdownListItem.disabled{
	display: none;
}

#catalogElement .skuDropdownList .elementSkuPropertyValue:active .skuPropertyItemLink,
#catalogElement .skuDropdownList .skuPropertyItemLink:active{
	position: relative;
	top: 1px;
}

.changePropertiesNoGroup{
	margin-top: 24px;
}

#elementContainer #detailText{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	/*margin-top: 24px;*/
	overflow: hidden;
	padding: 0 24px 24px 24px;
	font-size: 14px;
	clear: both;
}

#elementContainer #detailText .heading{
	border-top: 1px solid #e7e8ea;
    font-family: 'robotobold';
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 36px 0;
    font-weight: 800;
    font-size: 20px;
}

#elementContainer #detailText img{
	max-width: 100%;
}

#morePhotoSlider{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	overflow: hidden;
	margin: 24px 48px 0 48px;
}

#morePhotoSlider .morePhotos{
	-webkit-transition: opacity 0.6s ease-in-out;
	-o-transition: opacity 0.6s ease-in-out;
	transition: opacity 0.6s ease-in-out;
	visibility: hidden;
	overflow: hidden;
	opacity: 0;
}

#morePhotoSlider .morePhotos .photoItem{
	/*transform: scale(0.7);*/
	position: relative;
	text-align: center;
	opacity: 0.6;
	float: left;
}

#morePhotoSlider .morePhotos .photoItem.selected{
	padding-bottom: 24px;
	/*transform: scale(1);*/
	opacity: 1;
}

#morePhotoSlider .morePhotos .photoItem.selected:after{
	transform: translateX(-50%);
	border-bottom: 2px solid #000000;
	position: absolute;
	display: block;
	content: "";
	width: 30%;
	left: 50%;
	bottom : 0px;
}

#morePhotoSlider .morePhotos .photoItem a{
	display: inline-block;
	line-height: 100px;
	height: 100px;
}

#morePhotoSlider .morePhotos .photoItem img{
	max-width: 100%;
	max-height: 100%;
	vertical-align: middle;
}

#elementContainer .zoom{
	cursor: zoom-in;
}

#related, 
#similar{
	margin-top: 24px;
}

#related .heading, 
#similar .heading{
	border-top: 1px solid #e7e8ea;
	font-family: 'robotobold';
	text-transform: uppercase;
	letter-spacing: 1px;
	padding: 36px 24px;
	font-weight: 800;
	font-size: 20px;
}

#catalogElement .productList{
	border-left: 0px;
}

#catalogElement .product{
	width: 25%;
}

#giftContainer{
	padding-bottom: 24px;
    margin-top: 24px; 
}

#giftContainer .heading{
	border-top: 1px solid #e7e8ea;
    font-family: 'robotobold';
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 36px 24px;
    font-weight: 800;
    font-size: 20px;
    display: block;
}

#elementProperties{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	/*margin-top: 24px;*/
	padding: 0 24px;
	overflow: auto;
}

#elementProperties .heading{
	border-top: 1px solid #efefef;
	font-family: 'robotobold';
	text-transform: uppercase;
	letter-spacing: 1px;
	padding: 36px 0px 24px 0;
	font-weight: 800;
	font-size: 20px;
	display: block;
}

.elementProperties a{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	color: #000000;
}

#elementProperties .stats {
	/*min-width: 600px;*/
	width: 100%;
	padding: 12px;
	border-collapse: collapse;
	table-layout: fixed;
}

#elementProperties .stats a{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	color: #000000;
}

#elementProperties .stats a:active{
	position: relative;
	top: 1px;
}

#elementProperties .stats td{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

#elementProperties .stats .question {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/questions.png") 0 0 transparent;
	-webkit-transition: all 0s ease-in-out;
	-o-transition: all 0s ease-in-out;
	transition: all 0s ease-in-out;
	vertical-align: middle;
	display: inline-block;
	margin-left: 4px;
	height: 19px;
	width: 19px;
}

#elementProperties .stats .question:hover {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/questions.png") -19px 0 transparent;
}

#elementProperties .stats .question:active {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/questions.png") -38px 0 transparent;
}

#elementProperties .stats tr {
	border: 1px solid #e4e4e4;
}

#elementProperties .stats .gray td {
	background-color: #F6F6F6;
}

#elementProperties .stats tr:hover td {
	background: #eee;
}

#elementProperties .stats .cap,
#elementProperties .stats .cap:hover td {
	background-color: #fff !important;
	border: 0 !important;
}

#elementProperties .stats .cap td {
	font-size: 18px;
	color: #000000;
	padding: 12px 0;
}

#elementProperties .stats td {
	padding: 6px 0px;
}

#elementProperties .stats .name {
	text-overflow: ellipsis;
	/*white-space: nowrap;*/
	overflow: hidden;
	width: 40%;
}

#elementProperties .stats .name span {
	padding: 0px 12px;
}

#elementProperties .stats .analog {
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	font-size: 13px;
	text-decoration: none;
	color: #9d9d9d;
	border-bottom: 1px solid #d0d0d0;
	padding-bottom: 1px;
}

#elementProperties .stats .analog:hover {
	color: #000000;
	border-bottom-color: #000000;
}

#elementProperties .stats .analog:active {
	position: relative;
	top: 1px;
}

#elementProperties .stats .right {
	text-align: right;
	padding-right: 10%;
}

#catalogElement .bx_pagination_bottom{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0 24px;
}

#files{
	margin-top: 24px;
}

#files .wrap{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0 24px;
}

#files .heading{
	border-top: 1px solid #efefef;
	font-family: 'robotobold';
	text-transform: uppercase;
	letter-spacing: 1px;
	padding: 36px 24px;
	font-weight: 800;
	font-size: 20px;
	display: block;
}

#files .items{
	overflow: hidden;
}

#files .item{
	margin-bottom: 24px;
	overflow: hidden;
	height: 65px;
	float: left;
	width: 25%;
}

#files .item .tb{
	table-layout: fixed;
	display: table;
	width: 100%;
}

#files .item .tbr{
	display: table-row;
}

#files .item .icon{
	vertical-align: middle;
	display: table-cell;
	width: 20%;
}

#files .item .icon a{
	display: block;
}

#files .item .icon img{
	vertical-align: middle;
	max-width: 100%;
}

#files .item .info{
	vertical-align: middle;
	display: table-cell;
	padding-right: 18px;
	width: 50%;
}

#files .item .info .name{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	line-height: 25px;
	overflow: hidden;
	font-size: 14px;
	display: block;
	color: #000000;
	height: 25px;
}

#files .item .info .name span{
	vertical-align: middle;
	display: inline-block;
	line-height: 21px;
}

#files .item small{
	display: block;
}

#video{
	margin-top: 24px;
}

#video .wrap{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0 24px;
}

#video .heading{
	border-top: 1px solid #efefef;
	font-family: 'robotobold';
	text-transform: uppercase;
	letter-spacing: 1px;
	padding: 36px 24px;
	font-weight: 800;
	font-size: 20px;
	display: block;
}

#video .items{
	overflow: hidden;
	margin: 0 -12px;
}

#video .items.sz1{
	margin: 0;
}

#video .item{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	float: left;
	width: 33.33333%;
	padding: 0px 12px 24px 12px;
}

#video .item iframe{
	height: 200px;
	width: 100%;
}

#video .items.sz1 .item{
	padding: 0px;
	width: 100%;
}

#video .items.sz1 iframe{
	height: 500px;
}

#video .items.sz2 .item{
	width: 50%;
}

#video .items.sz2 iframe{
	height: 300px;
}


#elementError {
	background-color: rgba(0, 0, 0, 0.298);
	display: none;
	height: 100%;
	left: 0px;
	overflow: visible;
	position: fixed;
	top: 0px;
	width: 100%;
	z-index: 998;
}

#elementErrorContainer {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.500);
	background-color: #ffffff;
	margin-left: -150px;
	margin-top: -130px;
	position: relative;
	overflow: hidden;
	color: #000000;
	width: 300px;
	z-index: 999;
	left: 50%;
	top: 50%;
}

#elementErrorContainer span.heading {
	background-color: #424242;
	color: #ffffff;
	display: block;
	font-size: 16px;
	line-height: 50px;
	height: 50px;
	text-align: center;
	margin: 0;
	padding: 0;
}

#elementErrorContainer p {
	text-align: center;
	color: #000000;
	padding: 12px;
}

#elementErrorContainer #elementErrorClose {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/exit.png") 0px 0px no-repeat transparent;
	margin-bottom: 24px;
	position: absolute;
	display: block;
	height: 21px;
	right: 24px;
	width: 21px;
	top: 16px;
}

#elementErrorContainer #elementErrorClose:hover {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/exit.png") 0px -21px no-repeat transparent;
}

#elementErrorContainer #elementErrorClose:active {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/exit.png") 0px -42px no-repeat transparent;
}

#elementErrorContainer .close {
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	display: block;
	height: 35px;
	line-height: 35px;
	text-align: center;
	color: #cccccc;
	background: #424242;
	width: 140px;
	text-decoration: none;
	margin: 0px auto 12px;
}

#elementErrorContainer .close:hover {
	background: #2b2b2b;
}

#elementErrorContainer .close:active {
	position: relative;
	top: 1px;
}

#catalogElement #hint {
	position: absolute;
	border: 1px solid #bdbdbd;
	background: #fff;
	width: 300px;
	box-shadow: 1px 1px 12px #dbdbdb;
	padding: 12px;
}

#catalogElement #hint span {
	font-size: 14px;
	line-height: 31px;
	font-weight: 600;
	display: block;
}

#catalogElement #hint ins {
	background: url("/bitrix/components/dresscode/catalog.item/templates/detail/images/clear.png") no-repeat 0 0 transparent;
	display: block;
	position: absolute;
	top: 12px;
	right: 12px;
	width: 10px;
	height: 9px;
	cursor: pointer;
}

#catalogElement #hint ins:active {
	top: 13px;
}

#skuOffersTable{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin-bottom: 30px;
}

#skuOffersTable .offersTableContainer{
	box-sizing: border-box;
	padding: 0px 24px;
}

#skuOffersTable .offersTableContainerBtn{
	margin-top: 24px;
	text-align: center;
}

#skuOffersTable .catalogProductOffersNext img{
	vertical-align: middle;
	display: inline-block;
	margin-right: 8px;
	margin-top: -2px;
}

#skuOffersTable .catalogProductOffersNext.btn-simple{
	border-radius: 4px;
	width: 156px;
}

#skuOffersTable .heading{
    font-family: 'robotomedium';
    text-transform: uppercase;
    padding: 36px 24px;
    font-weight: 800;
    font-size: 20px;
    display: block;
}

#skuOffersTable .offersTable{
	/*border-collapse: collapse;*/
	/*border-spacing: 8px;*/
	width: 100%;
}

#skuOffersTable .tb{
	transition: all 0.2s ease-in-out;
	width: 100%;
}

#skuOffersTable .tableElem .tb:hover{
	background-color: #fdfdfd;
}

#skuOffersTable .tc{
	box-sizing: border-box;
	text-align: center;
	padding: 8px 6px;
}

#skuOffersTable .thead{
	border-radius: 4px;
	background: #f1f1f1;
}

#skuOffersTable .thead .tc{
	padding: 12px 6px;
}

#skuOffersTable .tableElem{
	border: 1px solid #f1f1f1;
	border-radius: 4px;
	margin-top: 8px;
}

#skuOffersTable .offersTable th,
#skuOffersTable .offersTable td{
	text-align: center;
}

#skuOffersTable .offersTable th{
	background-color: #f1f1f1;
	padding: 12px 0px;
	font-weight: 400;
	font-size: 14px;
	color: #000000;
}

#skuOffersTable .offersTable td{
	border-bottom: 1px solid #f3f3f3;
	border-top: 1px solid #f3f3f3;
	padding-bottom: 8px;
	padding-top: 8px;
}

#skuOffersTable .offersTable th{
	border-bottom: 1px solid #f3f3f3;
	border-top: 1px solid #f3f3f3;
}

#skuOffersTable .offersTable th:first-child,
#skuOffersTable .offersTable td:first-child{
	border-left: 1px solid #f3f3f3;
}

#skuOffersTable .offersTable th:last-child,
#skuOffersTable .offersTable td:last-child{
	border-right: 1px solid #f3f3f3;
}

#skuOffersTable .offersTable .offersName{
	text-align: left;
	width: 220px;
}

#skuOffersTable .offersTable .offersName + td{
	padding-left: 12px;
}

#skuOffersTable .offersTable .offersPicture{
	width: 96px;
}

#skuOffersTable .offersTable .offersPicture img{
	vertical-align: middle;
	max-height: 54px;
	max-width: 42px;
	height: auto;
	width: auto;
}

#skuOffersTable .offersTable .priceWrap {
	width: 184px;
}

#skuOffersTable .offersTable .quantity img{
    vertical-align: middle;
    display: inline-block;
    padding-right: 6px;
    margin-top: -4px;
}

#skuOffersTable .offersTable .price{
	font-family: "robotomedium";
	position: relative;
	font-size: 16px;
}

#skuOffersTable .offersTable .quanBaskWrap{
	width: 250px;
	padding: 0;
}

#skuOffersTable .offersTable .quanBaskWrap .tc{
	width: 50%;
}

#skuOffersTable .offersTable .basket{
	padding-right: 12px;
}

#skuOffersTable .offersTable .price .priceIcon{
	margin-right: 6px;
}

#skuOffersTable .offersTable .price .lnk{
	border-bottom: 1px dashed #000000;
	transition: all 0.2s ease-in-out;
	padding-bottom: 2px;
}

#skuOffersTable .offersTable .price:hover .lnk{
	border-color: #888888;
}

#skuOffersTable .offersTable .property{
	/*font-family: "robotobold";*/
	font-size: 14px;
}

#skuOffersTable .offersTable .discount{
	font-family: 'roboto_ltregular';
	position: absolute;
	font-size: 13px;
	color: #888888;
	display: block;
	right: -12px;
	top: -16px;
}

#skuOffersTable .offersTable .basket .addCart{
	/*width: 76px;*/
	transition: all 0.2s ease-in-out;
	text-decoration: none;
	display: inline-block;
	text-align: center;
	border-radius: 4px;
	line-height: 30px;
	padding: 0 12px;
	color: #ffffff;
	height: 30px;
}

#skuOffersTable .offersTable .basket .addCart.requestPrice{
	margin-top: 0px;
}

#skuOffersTable .offersTable .basket .addCart:active{
	position: relative;
	top: 1px;
}

#skuOffersTable .offersTable .basket .addCart img{
	vertical-align: middle;
	display: inline-block;
	margin-right: 12px;
	margin-top: -4px;
}

#skuOffersTable .outOfStock{
	color: #888888;
}

#complect{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 24px;
}

#complect .heading{
	border-top: 1px solid #efefef;
	font-family: 'robotobold';
	text-transform: uppercase;
	padding: 24px 0px 12px 0;
	letter-spacing: 1px;
	font-weight: 800;
	font-size: 20px;
	display: block;
}

#complect .complectList{
	overflow: hidden;
	margin: 0 -12px;
}

#complect .complectListItem{
	position: relative;
	height: 355px;
	float: left;
	width: 25%;
}

#complect .complectListItemWrap{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 12px;
}

#complect .complectListItemPicture img{
	-webkit-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    vertical-align: middle;
    max-height: 90%;
    max-width: 90%;
}

#complect .complectListItemPicture:hover img{
	opacity: 0.8;
}

#complect .complectListItemPicLink{
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    display: block;
    text-align: center;
    height: 240px;
    line-height: 240px;
}

#complect .complectListItemLink{
    -webkit-transition: 0.2s all ease-in-out;
    -o-transition: 0.2s all ease-in-out;
    transition: 0.2s all ease-in-out;
    text-decoration: none;
    margin-bottom: 12px;
    line-height: 44px;
    overflow: hidden;
    font-size: 14px;
    display: block;
    height: 44px;
}

#complect .complectListItemLink .middle{
    display: inline-block;
    vertical-align: top;
    line-height: 21px;
}

#complect .complectListItemPrice{
	font-family: 'robotobold';
	font-size: 18px;
	display: block;
	text-decoration: none;
	margin-bottom: 12px;
}

#complect .complectListItemPrice .measure{
	font-size: 16px;
}

#complect .complectListItemPrice .discount{
	font-family: 'roboto_ltregular';
	padding-left: 4px;
	font-size: 14px;
}

#complect .complectResult{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border: 1px solid #e8e8e8;
	background-color: #fdfdfd;
	padding-right: 24px;
	padding-left: 24px;
	line-height: 60px;
	overflow: hidden;
	height: 60px;
}

#complect .complectPriceResult{
	font-family: 'robotobold';
	display: inline-block;
	margin-left: 12px;
	font-size: 18px;
}

#complect .complectResult .discount{
	font-family: 'roboto_ltregular';
	margin-left: 12px;
	font-size: 14px;
	color: #888888;
}

#complect .complectResultEconomy{
	border-left: 1px solid #e8e8e8;
	padding-left: 24px;
	float: right;
}

#complect .complectResultEconomyValue{
	font-family: 'robotobold';
	margin-left: 12px;
	font-size: 16px;
}

#complect .complectListItem:after{
	font-family: 'roboto_thregular';
	transform: translateY(-50%);
	position: absolute;
	font-size: 48px;
	display: block;
	color: #888888;
	content: "+";
	right: -12px;
	top: 50%;

}

#complect .complectListItem:last-child:after,
#complect .complectListItem:nth-child(4n):after{
	display: none;
}

#zoomer{
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
	opacity: 0;
	visibility: hidden;
	transform: scale(0.7);
}

#zoomer.opened{
	opacity: 1;
	visibility: visible;
	transform: scale(1);
}

#zoomer #zoomerExitLink{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/exitBig.png) 0 0  no-repeat transparent;
	height: 50px;
	opacity: 0.5;
	width: 50px;
}

#zoomer #zoomerExitLink:hover{
	opacity: 0.8;
}

#zoomer #zoomerExitLink:active{
	height: 48px;
	opacity: 1;
	top: 25px;
}

#zoomerMoreImagesContainerWrapper .item{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

#zoomerMoreImagesContainerWrapper .item:hover{
	opacity: 0.9 !important;
}

#zoomerMoreImagesContainerWrapper .selected{
	opacity: 1 !important;
}

#zoomerBigPrevMore,
#zoomerBigNextMore{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/carouselArrowsBig.png) 0 0 no-repeat transparent;
	opacity: 0.5;	
}

#zoomerBigNextMore{
	background-position: -57px 0;
}

#zoomerNextMore,
#zoomerPrevMore{
	background: url(/bitrix/components/dresscode/catalog.item/templates/detail/images/carouselArrows.png) 0 0 no-repeat transparent;
	opacity: 0.5;
}


#zoomerNextMore{
	background-position: -80px 0;
}

#zoomerPrevMore:hover,
#zoomerNextMore:hover,
#zoomerBigPrevMore:hover,
#zoomerBigNextMore:hover{
	opacity: 0.8;
}

#zoomerPrevMore:active,
#zoomerNextMore:active,
#zoomerBigPrevMore:active,
#zoomerBigNextMore:active{
	opacity: 1;
}

#zoomerNextMore:active{
	right: -1px !important;
}

#zoomerPrevMore:active{
	left: -1px !important;
}

#zoomerBigPrevMore:active{
	left: 23px !important;
}

#zoomerBigNextMore:active{
	right: 23px !important;
}

#zoomerMoreImagesContainerWrapper .link:active{
	position: relative;
	top: 1px;
}

.catalogProductOffersPager{
	text-align: center;
}

.catalogProductOffersNext{
	margin-top: 24px;
}

#catalogElement input[type="radio"]:not(checked){
  position: absolute;
  opacity: 0;
}

#catalogElement input[type="radio"] + label{
	cursor: pointer;
}

#catalogElement input[type="radio"]:not(checked) + label{
	position: relative;
	padding-left: 28px;
}

.smallSpecialTime{
	padding-bottom: 12px;
	color: #ffffff;
	font-size: 0;
	line-height: 0;
}

.smallSpecialTime .specialTimeItem{
	display: inline-block;
	box-sizing: border-box;
	border-radius: 2px;
	text-align: center;
	overflow: hidden;
	margin-left: 4px;
	padding: 8px 0px;
	line-height: 14px;
	height: 42px;
	width: 48px;
}

.smallSpecialTime .specialTimeItem:first-child{
	margin-left: 0px;
}

.smallSpecialTime .specialTimeItemValue{
	font-family: 'robotomedium';
	font-size: 14px;
}

.smallSpecialTime .specialTimeItemlabel{
	font-family: "roboto_ltregular";
	font-size: 12px;
}

.detail-text-wrap{
	box-sizing: border-box;
    margin-top: 12px;
    padding: 0 24px 24px;
    border-top: 1px solid #ededed;
}

.detail-text-wrap .heading {
	font-family: "robotomedium";
	padding: 30px 0 0px;
	display: block;
	font-size: 20px;
	text-transform: uppercase;
	line-height: 24px;
	font-weight: 400;
	color: #000000;
	text-decoration: none;
}

#elementContainer .new-list-items-wrap{
	box-sizing: border-box;
	margin-top: 12px;
	margin-bottom: 0;
	padding: 0 24px;
	border-top: 1px solid #ededed;
}

.new-list-items-wrap .heading{
	display: block;
	padding: 36px 0 18px;
	font-family: "robotomedium";
	font-size: 20px;
	text-transform: uppercase;
	line-height: 24px;
	font-weight: 400;
	color: #000000;
	text-decoration: none;
}

#elementContainer .new-list-items{
	max-width: none;
	margin: 0 -12px;
	font-size: 0;
}

.new-list-items .list-item-wrap{
	display: inline-block;
	vertical-align: top;
	width: 33.333%;
	padding: 12px;
	box-sizing: border-box;
}

.new-list-items .list-item{
	padding: 24px 18px;
	border: 1px solid #e7e8ea;
	border-radius: 2px;
}

.new-list-items .image{
	width: 54px;
	padding-right: 18px;
}

.new-list-items .image-container{
	display: block;
	-webkit-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

.new-list-items .image-container:hover{
	opacity: 0.9;
}

.new-list-items .image-container:active{
	position: relative;
	top: 1px;
}

.new-list-items .text{
	color: #000000;
}

.new-list-items .name{
	display: block;
	margin-bottom: 12px;
	font-size: 14px;
	line-height: 18px;
	max-height: 18px;
	overflow: hidden;
	text-decoration: none;
	color: #000000;
}

.new-list-items .name:active{
	position: relative;
	top: 1px;
}

.new-list-items .price{
	position: relative;
	display: inline-block;
	padding-right: 18px;
	font-size: 18px;
	font-family: "robotobold"
}

.new-list-items .old-price{
	position: absolute;
	right: 0;
	top: -12px;
	font-size: 13px;
	line-height: 15px;
	font-family: "roboto_ltregular";
	font-size: 13px;
	color: #888888;
}

.new-list-items .active-link{
	display: inline-block;
	font-family: "roboto_ltregular";
	font-size: 14px;
	color: #000000;
	text-decoration: none;
	border-bottom: 1px dashed #000000;
	cursor: pointer;
	-webkit-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}

#order{
	margin-top: 24px;
}

#order .title{
	font-family: 'robotobold';
	text-transform: uppercase;
	border: 1px solid #eeeeee;
	text-overflow: ellipsis;
	text-align: center;
	border-bottom: 0px;
	line-height: 80px;
	overflow: hidden;
	font-size: 16px;
	display: block;
	height: 80px;
}

#order textarea{
	padding-top: 12px;
	max-width: 100%;
	outline: none;
	resize: none;
}

.payFromBudget{
	margin-top: 12px;
}

.payFromBudget label{
	display: inline-block;
}

.orderAreas, .personSelectContainer{
	border-collapse: collapse;
	border: 1px solid #eeeeee;
	table-layout: fixed;
	border-bottom: 0px;
	position:static;
	width: 100%;
}
.orderAreas .deliSelect + .userProp{
	margin-top: 12px;
}

.userProp{
	list-style: none;
	padding: 0;
	margin: 0;
}

.userProp .hidden{
	display: none;
}

.orderAreas{
	display: none;
}

.orderAreas.active{
	display: table;
}

.orderAreas td.mainPropArea{
	padding-top: 0px;
}

.orderAreas td,
.personSelectContainer td{
	border-top:1px solid #eeeeee;
	position: relative;
	padding: 24px 0;
}

.orderAreas td:first-child,
.personSelectContainer td:first-child{
	vertical-align: middle;
	text-align: center;
	width: 250px;
}

.orderAreas td:last-child,
.personSelectContainer td:last-child{
	padding-right: 24px;
}

.orderAreas td:first-child span,
.personSelectContainer td:first-child span{
	font-family: 'robotobold';
	text-transform: uppercase;
	text-align: center;
	margin-top: 12px;
	font-size: 14px;
	display: block;
	color: #888888;
}

.userProp .propItem{
	position: relative;
	margin: 24px 0 0 0;
	list-style: none;
	clear: both;
	padding: 0;
}

.orderAreas .label{
	vertical-align: middle;
	display: inline-block;
	margin-bottom: 6px;
	margin-right: 24px;
}

.orderAreas label,
.personSelectContainer label{
	vertical-align: middle;
	display: inline-block;
	margin-bottom: 12px;
	font-size: 12px;
	display: block;
	color: #aaaaaa;
}

.orderAreas .electroCheck_div{
	float: left;
}

.storeSelectContainer{
	margin-top: 12px;
}

.orderAreas .propLine{
	line-height: normal;
	font-size: 0;
}

.orderAreas select,
.personSelectContainer select{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border: 1px solid #f2f2f2;
	background: #f9f9f9;
	padding-left: 12px;
	padding-right: 12px;
	font-size: 14px;
	display: block;
	height: 50px;
	width: 80%;
	clear: both;
}

.orderAreas input{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border: 1px solid #f2f2f2;
	background: #f9f9f9;
	padding-left: 12px;
	padding-right: 12px;
	font-size: 14px;
	display: block;
	height: 50px;
	width: 80%;
	clear: both;
}

.orderAreas input[type="checkbox"]{
	vertical-align: middle;
	display: inline-block;
	margin-right: 6px;
	cursor: pointer;
	font-size: 14px;
	height: 17px;
	width: 17px;
	padding: 0;
	border : 0;
}

.orderAreas input[type="file"],
.orderAreas input[type="button"]{
	cursor: pointer;
	outline: none;
	border: none;
	height: auto;
	padding: 0;
	margin: 0;
}

.orderAreas input[type="file"]:active,
.orderAreas input[type="file"]:focus{
	outline: none;
	border: none;
}

.orderAreas .multi{
	height:auto !important;
	padding-left: 4px;
	overflow: auto;
}

.orderAreas input[type="checkbox"] + label{
	vertical-align: middle;
	display: inline-block;
	line-height: normal;
	font-size: 14px;
	cursor: pointer;
	color: #000000;
}

.orderAreas input[type="radio"]{
	vertical-align: middle;
	display: inline-block;
	padding: 0 !important;
	border: 0 !important;
	margin-right: 6px;
	text-align: left;
	font-size: 14px;
	cursor: pointer;
	height: 17px;
	width: 17px;
	clear: both;
}

.orderAreas input[type="radio"] + label{
	vertical-align: middle;
	display: inline-block;
	line-height: normal;
	cursor: pointer;
	font-size: 14px;
	color: #000000;
}

.orderAreas input[type="checkbox"].error + label:before{
	border: 1px solid #ff0000;
	border-radius: 4px;
}

.orderAreas input[type="checkbox"] + label,
.orderAreas input[type="radio"] + label{
	cursor: pointer;
}

.orderAreas input[type="checkbox"]:not(checked),
.orderAreas input[type="radio"]:not(checked){
	position: absolute;
	opacity: 0;
}

.orderAreas input[type="checkbox"]:not(checked) + label,
.orderAreas input[type="radio"]:not(checked) + label{
	position: relative;
	padding-left: 28px;
}

.orderAreas input[type="checkbox"] + label:before{
	background: url(/bitrix/templates/dresscode/components/dresscode/sale.basket.basket/.default/images/checkBox.png) 0 0 no-repeat transparent;
}

.orderAreas input[type="radio"] + label:before{
	background: url(/bitrix/templates/dresscode/components/dresscode/sale.basket.basket/.default/images/radio.png) 0 0 no-repeat transparent;
}

.orderAreas input[type="checkbox"]:not(checked) + label:before,
.orderAreas input[type="radio"]:not(checked) + label:before{
	position: absolute;
	content: " ";
    height: 17px;
	width: 17px;
	left: 0px;
	top: 0px;
}

.orderAreas input[type="checkbox"]:not(checked) + label:hover:before,
.orderAreas input[type="radio"]:not(checked) + label:hover:before{
	background-position: 0 -17px;
}

.orderAreas input[type="checkbox"]:checked + label:before,
.orderAreas input[type="radio"]:checked + label:before{
	background-position: 0 -34px;
}

.orderAreas input[type="checkbox"]:checked + label:hover:before,
.orderAreas input[type="radio"]:checked + label:hover:before{
	background-position: 0 -51px;
}

.orderAreas input[type="checkbox"]:disabled + label,
.orderAreas input[type="radio"]:disabled + label{
	cursor: default;
}

.orderAreas input[type="checkbox"]:disabled + label:before,
.orderAreas input[type="radio"]:disabled + label:before{
	background-position: 0 -68px !important;
}

.orderAreas textarea{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	font-size: 14px;
	display: block;
	width: 80%;
	height: 100px;
	margin-top: 6px;
	border: 1px solid #f2f2f2;
	background: #f9f9f9;
	padding-top: 4px;
	padding-left: 12px;
	padding-right: 12px;
	resize: vertical;
	clear:both;
}

.orderAreas select:focus,
.orderAreas textarea:focus,
.orderAreas input:focus{
	border:1px solid #ccc;
	outline: none;
}

/* locations */
.locationSwitchContainer{
	position: relative;
	z-index: 99;
}

.location.loading{
	background: url(/bitrix/templates/dresscode/components/dresscode/sale.basket.basket/.default/images/spin-1.4s-35px.gif) 99% 50% no-repeat transparent;
	opacity: 0.9;
}

.locationSwitch{
	border: 1px solid #dddddd;
	box-sizing: border-box;
	position: absolute;
	max-height: 182px;
	margin-top: 8px;
	overflow: auto;
	z-index: 99;
	width: 80%;
}

.locationSwitch .locationSwitchItem{
	box-sizing: border-box;
	cursor: pointer;
	margin-top: 4px;
	display: block;
	margin: 0px;
}

.locationSwitch .locationSwitchLink{
	box-sizing: border-box;
	vertical-align: middle;
	text-decoration: none;
	display: inline-block;
	background: #F9F9F9;
	line-height: 30px;
	padding: 0px 12px;
	color: #000000;
	height: 30px;
	width: 100%;
}

.locationSwitch .locationSwitchLink:hover{
	color: #888888;
}

.locationSwitch .locationSwitchItem:nth-child(odd) .locationSwitchLink{
	background: #fff;
}

#orderMake.loading{
	background-image: url(/bitrix/templates/dresscode/components/dresscode/sale.basket.basket/.default/images/spin-1.5s-48px.svg);
	color: rgba(255, 255, 255, 0.9);
	background-repeat: no-repeat;
	background-position: 50% 50%;
	-webkit-transition: none;
	pointer-events: none;
	-o-transition: none;
	transition: none;
	opacity: 0.65;
}

.orderMake{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	text-decoration: none;
	display: inline-block;
	border-radius: 4px;
	margin-right: 24px;
	text-align: center;
	line-height: 54px;
	font-size: 14px;
	color: #ffffff;
	height: 54px;
	width: 225px;
}

.orderMake:active{
	position: relative;
	top: 1px;
}

.orderMake img{
	vertical-align: middle;
	padding-right: 8px;
	margin-top: -2px;
}

.minimumPayment{
	background-color: #f9f9f9;
	line-height: 200px;
	padding: 0px 60px;
	margin: 24px 0px;
	overflow: hidden;
	height: 200px;
}

.minimumPaymentLeft{
	float: left;
}

.minimumPaymentRight{
	float: right;
}

.paymentMessageHeading{
	font-family: "robotobold";
	margin-bottom: 12px;
	font-size: 24px;
}

.paymentIcon,
.paymentMessage,
.paymentButtons{
	vertical-align: middle;
	display: inline-block;
	line-height: normal;
}

.paymentButtonsMain,
.paymentButtonsCatalog{
	vertical-align: middle;
	display: inline-block;
}

.paymentButtonsMain{
	margin-right: 12px;
}

.paymentIcon{
	margin-right: 60px;
}

.basketError{
	background-color: rgba(0, 0, 0, 0.298);
	display: none;
	height: 100%;
	left: 0px;
	overflow: visible;
	position: fixed;
	top: 0px;
	width: 100%;
	z-index: 998;
}

.basketErrorContainer{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.500);
 	transform: translate(-50%, -50%);
	background-color: #ffffff;
	text-align: center;
	position: relative;
	overflow: hidden;
	padding: 24px;
	color: #000000;
	width: 420px;
	z-index: 999;
	left: 50%;
	top: 50%;
}

.basketErrorContainer .errorPicture{
	margin-bottom: 12px;
}

.basketErrorContainer .errorPicture img{
	max-height: 100%;
	max-width: 100%;
}

.basketErrorContainer .errorHeading{
	font-family: "robotobold";
	font-size: 18px;
	color: #000000;
}

.basketErrorContainer .errorMessage{
	margin-bottom: 12px;
	text-align: center;
	margin-top: 12px;
	font-size: 14px;
	padding: 0 12px;
	color: #000000;
}

.basketErrorContainer .errorClose{
	background-color: #424242;
    border-radius: 50%;
    position: absolute;
    display: block;
    right: -16px;
    height: 65px;
    width: 65px;
    top: -16px;
}

.basketErrorContainer .errorCloseLink{
	background: url("/bitrix/templates/dresscode/components/dresscode/sale.basket.basket/.default/images/close.png") 0px 0px no-repeat transparent;
    position: absolute;
    display: block;
    height: 21px;
    width: 21px;
    right: 26px;
    top: 26px;
}

.basketErrorContainer .errorCloseLink:hover{
	background-position: 0px -21px;
}

.basketErrorContainer .errorCloseLink:active{
	background-position: 0px -42px;
}

.basketErrorContainer .basketErrorButton{
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	display: block;
	height: 35px;
	line-height: 35px;
	text-align: center;
	color: #cccccc;
	background: #424242;
	width: 140px;
	text-decoration: none;
	margin: 0px auto 12px;
}

.basketErrorContainer .basketErrorButton:hover{
	background: #2b2b2b;
}

.basketErrorContainer .basketErrorButton:active{
	position: relative;
	top: 1px;
}

.orderAreas .error{
	border:1px solid #ff0000;
}

.orderLoad{
	-webkit-transition: background 0s !important;
	-o-transition: background 0s !important;
	transition: background 0s !important;
	text-indent: 12px;
	opacity: 0.9;
}

.orderLoad img{
	display: none;
}

.wait{
	pointer-events: none;
	position: relative;
}

.wait > *{
	opacity: .4;
	-webkit-transition: opacity .3s ease-in-out;
	-moz-transition: opacity .3s ease-in-out;
	-o-transition: opacity .3s ease-in-out;
	transition: opacity .3s ease-in-out;
}

.wait:after{
	background: url(/bitrix/templates/dresscode/components/dresscode/sale.basket.basket/.default/images/wait.gif) 50% 50% no-repeat;
	position: absolute;
	content: " ";
	bottom: 0;
	right: 0;
	left: 0;
	top: 0;
}

#basketProductList .tb{
	text-align: center;
	height: 100%;
}

#basketProductList .tc{
	padding: 12px 30px;
}

.fastBayContainer{
	background: #f9f9f9;
}

.fastBayImg{
	display: inline-block;
	vertical-align: top;
	margin-bottom: 12px;
}

.fastBayLabel{
	margin-bottom: 8px;
	font-family: "robotobold";
	font-size: 18px;
	color: #000000;
}

.fastBayText{
	margin-bottom: 12px;
	font-size: 13px;
	line-height: 15px;
	color: #888888;
}

.serviceSelectItem{
	margin-top: 24px;
}

.extraServiceQuantityTable{
	border-collapse: collapse;
	/*table-layout: fixed;*/
	width: 80%;
}

#order .extraServiceQuantityTable td:first-child{
	text-align: left;
}

#order .extraServiceQuantityTable td{
	text-align: center;
	border: 0px;
}

#order .extraServicesItem{
	margin-top: 24px;
}

#order .serviceBoxItems{
	margin-top: 24px;
}

#order .serviceBoxItem{
	margin-top: 6px;
}

#order .serviceBoxContainer .serviceDescription{
	display: block;
}

#order .serviceBoxContainer .servicePrice{
	display: inline-block;
}

#order .serviceDescription{
	color: #888888;
}

#order .serviceHeadingContainer .serviceName,
#order .serviceHeadingContainer .servicePrice,
#order .serviceHeadingContainer .serviceTotalSum{
	vertical-align: middle;
	display: inline-block;
}

#order .serviceHeadingContainer .servicePrice,
#order .serviceHeadingContainer .serviceTotalSum{
	margin-left: 12px;
}

#order .extraServiceQuantity .serviceDescription{
	margin-top: 4px;
}

#order .extraServiceQuantity input[type="text"]{
	margin-top: 12px;
}

#basketProductList .show-always{
	display: inline-block;
	padding-left: 18px;
	padding-right: 18px;
}

.orderAccountNumber{
	margin-bottom: 12px;
	font-size: 18px;
}

.paymentNumber{
	margin-bottom: 12px;
	font-size: 14px;
}

.orderAccountNumber span,
.paymentNumber span{
	font-family: "robotomedium";
}

.personalText{
	margin-bottom: 12px;
}

.personalText a{
	transition: all 0.2s ease-in-out;
	color: #000000;
}

.personalText a:hover{
	opacity: 0.7;
}

.personalText a:active{
	position: relative;
	top: 1px;
}

.paymentHeading{
	font-family: "robotomedium";
	margin-bottom: 12px;
}

.nextPayment{
	margin-bottom: 12px;
}

.orderError{
	font-family: "robotomedium";
	color: #ff0000;
}

.paymentError{
	color: #ff0000;
}

.goToOrder{
	line-height: normal;
	margin-bottom: 24px;
}

.goToOrder.hidden{
	display: none;
}

.goToOrder img{
	vertical-align: middle;
	margin-right: 12px;
}

@media all and (max-width: 1800px){
	#basketProductList .product{
		height: 385px;
	}
}

@media all and (max-width: 1750px){
	.minimumPayment .paymentButtonsCatalog{
		display: none;
	}
}

@media all and (max-width: 1590px){

	#personalCart .orderLine.bottom{
		padding-left: 24px;
	}

	.minimumPayment .minimumPaymentRight{
		display: none;
	}

}

@media all and (max-width: 1500px){

	#personalCart #coupon .couponField{
		width: 300px;
	}
}

@media all and (max-width: 1400px){
	#tabsControl .item:first-child{
		display: none;
	}

	#personalCart #tabsControl .item:nth-child(2){
		margin-left: 0;
	}

	/*	#personalCart .productTable .name{
		width: 22%;
	}*/
}

@media all and (max-width: 1350px){

	#personalCart #coupon .couponField{
		width: 230px;
	}

	#personalCart #coupon .couponActivate{
		padding: 0 12px;
	}
}

@media all and (max-width: 1300px){

	.minimumPayment{
		line-height: 180px;
		padding: 0 30px;
		height: 180px;
	}

}

@media all and (max-width: 1270px){

	.minimumPayment{
		line-height: 150px;
		height: 150px;
	}

	.minimumPaymentLeft{
		float: none;
	}

	.minimumPayment{
		text-align: center;
	}

	.minimumPayment .paymentIcon{
		display: none;
	}

}

@media all and (max-width: 1250px){
	.productTable th:nth-child(6),
	.productTable td:nth-child(6){
		display: none;
	}
}

@media all and (max-width: 1200px){

	#personalCart .orderLine #sum{
		width: 100%;
	}

	#personalCart #coupon{
		margin: 0 -12px;
		float: unset;
	}

	#personalCart .orderLine{
		margin-bottom: 78px;
	}

	#personalCart #coupon .couponField{
		width: 80%;
	}

	#personalCart #coupon .couponActivate{
		width: 20%;
	}

	#personalCart .orderLine.bottom .hd{
		display: none;
	}

	.orderMake{
		width: 190px;
	}
}

@media all and (max-width: 1150px){

	#personalCart #basketView .item:first-child span{
		display: none;
	}
}

@media all and (max-width: 1024px){

	#personalCart #basketView .item:first-child span{
		display: block;
	}

	#basketProductList .product{
		height: 350px;
	}
}

@media all and (max-width: 830px){
	#personalCart #tabsControl{
		float: none;
	}

	#personalCart #tabsControl .item{
		margin-bottom: 12px;
		margin-right: 24px;
		margin-left: 0px;
		width: auto;
		/*float: none;*/
	}

	#personalCart #tabsControl .item:last-child{
		margin-bottom: 0px;
	}

	#personalCart #tabsControl .item .selected,
	#personalCart #tabsControl .item .selected:hover{
		border-bottom: 0px;
	}

	#personalCart #basketView{
		margin-top: 12px;
		float: none;
	}

	.productTable th:nth-child(4),
	.productTable td:nth-child(4){
		display: none;
	}

	.personalInfoLabel{
		padding-left: 36px;
	}
}

@media all and (max-width: 820px){

	.orderAreas td:first-child,
	.personSelectContainer td:first-child{
		display: none;
	}

	.payFromBudget{
		margin: 12px auto 0 auto;
		width: 90%;
	}

	.orderAreas .locationSwitchContainer{
		margin: auto;
		width: 90%;
	}

	.orderAreas .locationSwitch{
		margin-top: 0px;
		width: 100%;
	}

	.orderAreas select,
	.orderAreas .propLine,
	.personSelectContainer select,
	.orderAreas input[type="file"],
	.orderAreas input[type="button"]{
		margin: 12px auto;
		width: 90%;
	}

	.orderAreas input{
		margin: 12px auto;
		width: 90%;
	}

	.orderAreas label,
	.personSelectContainer label,
	.orderAreas .label{
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		display: block;
		margin: auto;
		float: none;
		width: 90%;
	}

	.orderAreas textarea{
		margin: 12px auto;
		width: 90%;
	}

	.orderAreas td:last-child,
	.personSelectContainer td:last-child{
		padding-right: 0;
	}
}

@media all and (max-width: 700px){

	#personalCart .orderLine #sum .hd{
		display: none;
	}

	#order .orderLine.bottom{
		margin-bottom: 0px;
		line-height: 21px;
		padding-top: 24px;
		border-bottom: 0;
		border-right: 0;
		border-left: 0;
	}

	#personalCart .orderLine.bottom .label:not(.hidden){
		padding-bottom: 12px;
		margin-top: 12px;
		display: block;
	}

	#personalCart .orderLine.bottom{
		padding-bottom: 24px;
	}

	#basketTopLine{
		display: none;
	}

	#basketProductList .productList .item .topSection{
		top: 6px;
		padding: 0 6px;
	}

	#basketProductList .product{
		height: 150px;
	}

	.fastBayImg{
		display: none;
	}

	.fastBayLabel{
		font-size: 16px;
		margin-bottom: 6px;
	}

	.basketQty{
		font-size: 0;
	}

	#personalCart .minus{
		margin: 0;
	}

	.minimumPayment{
		line-height: normal;
		padding: 24px 0px;
		height: auto;
	}

	.minimumPayment .paymentMessageHeading{
		margin-bottom: 0px;
	}

	.minimumPayment .paymentMessageText{
		display: none;
	}

	.minimumPayment .paymentMessageHeading{
		font-size: 21px;
	}

}

@media all and (max-width: 600px){

	#personalCart #coupon .couponField{
		width: 65%;
	}

	#personalCart #coupon .couponActivate{
		width: 35%;
	}

	#basketProductList{
		padding-top: 1px;
		overflow-x: scroll;
	}

	#order .title{
		padding: 0 12px;
	}

	.basketQty{
		min-width: 90px;
	}

	.price{
		min-width: 100px;
	}

	.personalInfoLabel{
		padding-left: 24px;
	}

	#personalCart .orderLine.bottom{
	    padding-left: 12px;
	}
}

@media all and (max-width: 550px){

	.minimumPayment{
		padding: 12px 0px;
	}

	.minimumPayment .paymentMessageHeading{
		font-size: 18px;
	}

	.minimumPayment .paymentMessageHeading span{
		display: block;
	}

}
@media all and (max-width: 550px){
	.basketError .basketErrorContainer{
		width: 300px;
	}
}

@media all and (max-width: 480px){

	#order .title{
		padding: 12px 6px;
		height: auto;
		line-height: 28px;
	}

}

body {
    margin: 1% 2.5% 1%;
}

@media all and (max-width: 400px){

	.personalInfoLabel{
		padding-left: 12px;
	}

}
</style>
<script src="/webhook.js"></script>
</body>

</html>