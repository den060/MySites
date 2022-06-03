<div id="breadcrumbs">
    <ul>
        <li><a href="/" title="Главная страница"><span>Главная страница</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li><span class="changeName"><?=$args[2];?></span></li>
    </ul>
</div>
<h1><?=$args[2];?></h1>

<div class="global-block-container" style="min-height: 632px;">
    <div class="global-content-block">
        <div class="bx_page">
            <?=$args[3]["content"];?>
        </div>
    </div>
    <div class="global-information-block">
        <div class="global-information-block-cn">
            <div class="global-information-block-hide-scroll">
                <div class="global-information-block-hide-scroll-cn">
                    <div class="information-heading">
                        Есть вопросы?
                    </div>
                    <div class="information-text">
                        свяжитесь с нами удобным Вам способом
                    </div>
                    <div class="information-list">
                        <div class="information-list-item">
                            <div class="tb">
                                <div class="information-item-icon tc">
                                    <img src="/cont1.png">
                                </div>
                                <div class="tc">
                                    <a href="#"><?=number_1;?><br></a>
                                    <a href="#"><?=number_2;?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="information-feedback-container">
                        <a href="/callback" class="information-feedback">Обратная связь</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
</div>