<div id="breadcrumbs">
    <ul>
        <li><a href="/"><span itemprop="title">Главная страница</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li><a href="/"><span itemprop="title">Личный кабинет</span></a></li>
        <li><span class="arrow"> • </span></li>
        <li><span class="changeName">Содержимое корзины</span></li>
    </ul>
</div>

<div id="basketProductList">
    <div class="items productList">
        <div class="item product fastBayContainer">
            <div class="tb">
                <div class="tc">
                    <img class="fastBayImg" src="/cartH3.png" alt="Быстрый заказ">
                    <div class="fastBayLabel">Быстрый заказ</div>
                    <div class="fastBayText">Оформите покупку, заполнив только телефон, мы свяжемся с Вами для
                        подтверждения заказа</div>
                    <a href="#" class="show-always btn-simple btn-micro" id="fastBasketOrder" onclick="$('#webmodal_fast').addClass('visible');">Купить в 1 клик</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>



<div id="order" class="DwBasketOrder orderContainer" style="    background: white;">
    <span class="title">Заполните пожалуйста Ваши данные для заказа</span>

        <table class="orderAreas active" data-person-id="1">
            <tbody>
                <tr>
                    <td><span>Личные данные</span></td>
                    <td class="mainPropArea">
                        <ul class="userProp">
                            <li class="propItem">
                                <span class="label">Ф.И.О.*</span>
                                <label></label>
                                <input type="text" name="ORDER_PROP_1">
                            </li>
                            <li class="propItem">
                                <span class="label">E-Mail*</span>
                                <label></label>
                                <input type="text" name="ORDER_PROP_2">
                            </li>
                            <li class="propItem">
                                <span class="label" >Телефон*</span>
                                <label></label>
                                <input type="text" class="phone_mask" name="ORDER_PROP_3" required placeholder="+7 (000) 000-00-00">
                            </li><script>$(".phone_mask").mask("+7(999)999-99-99");</script>
                            </li></script>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td><span>Данные для доставки</span></td>
                    <td class="mainPropArea">
                        <ul class="userProp">
                            <li class="propItem">
                                <span class="label">Индекс*</span>
                                <label></label>
                                <input type="text" name="ORDER_PROP_4">
                            </li>
                            <li class="propItem">
                                <span class="label">Город</span>
                                <label></label>
                                <input type="text" name="ORDER_PROP_5" value="Курган">
                            </li>
                            <li class="propItem">
                                <span class="label">Адрес доставки*</span>
                                <label></label>
                                <textarea name="ORDER_PROP_7"></textarea>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="orderAreas active" data-person-id="1">
            <tbody>
                <tr>
                    <td></td>
                    <td>
                        <span class="label">Комментарий к заказу</span>
                        <textarea name="comment" class="orderComment"></textarea>
                        <div class="personalInfoLabel">*Нажимая на кнопку оформить заказ, я даю согласие на <a href="#" class="pilink" target="_blank">обработку персональных данных.</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    <div class="orderLine bottom">
        <div id="sum" style="text-align: center;margin: 20px;padding-bottom: 30px;">
            <a href="#" class="order orderMake" id="orderMake" onclick="return store.finish_more()">Оформить заказ</a>
        </div>
    </div>
</div>


<div class="webformModal small" id="webmodal_fast">
    <div class="webformModalHideScrollBar">
        <div class="webformModalcn100">
            <div class="webformModalContainer">
                <div class="webFormDwModal">
                    <div class="webFormModalHeading">Быстрый заказ<a href="#" class="webFormModalHeadingExit"></a>
                    </div>
                    <p class="webFormDescription">Оформите покупку, заполнив только телефон, мы свяжемся с Вами для подтверждения заказа</p>
                    <div class="webFormItems">

                        <div class="webFormItem" id="WEB_FORM_ITEM_TELEPHONE">
                            <div class="webFormItemCaption">
                                <div class="webFormItemLabel" >Ваш телефон<span class="webFormItemRequired">*</span>
                                </div>
                            </div>
                            <div class="webFormItemError"></div>
                            <div class="webFormItemField">
                                <input type="text" class="inputtext" name="form_text_10" value="" size="40">
                            </div>
                        </div>
                        <div class="webFormItem" id="WEB_FORM_ITEM_NAME">
                            <div class="webFormItemCaption">
                                <div class="webFormItemLabel">Ваше имя</div>
                            </div>
                            <div class="webFormItemError"></div>
                            <div class="webFormItemField">
                                <input type="text" class="inputtext" name="form_text_11" value="" size="40"> </div>
                        </div>
                        <div class="personalInfo">
                            <div class="webFormItem">
                                <div class="webFormItemError"></div>
                                <div class="webFormItemField">
                                    <label class="label-for" data-for="personalInfoField">Нажимая кнопку отправить вы соглашаетесь с <a
                                            href="/personal-info/" class="pilink">обработкой персональных
                                            данных.</a><span class="webFormItemRequired">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="webFormError"></div>
                    <div class="webFormTools">
                        <div class="tb">
                            <div class="tc" onclick="return store.finish_fast()">
                                <input type="submit" value="Отправить" class="sendWebFormDw">
                                <input type="hidden" value="Y">
                            </div>
                        </div>
                        <p><span class="form-required starrequired">*</span> - Поля, обязательные для заполнения</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
