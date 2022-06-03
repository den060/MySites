var inc = false;
var store = {
    items: [],
    add: (id, name, image, price, alertify, status, tocart) => {
        let s = true;
        if(status == 0 && !inc) {
            inc = true;
            if(!confirm("Данный товар только под заказ, вы действительно хотите его заказать?"))
                s = false;
            
        }
        if(!s) return false;
        let count = 0;
        if(store.items[id]) count = store.items[id].count;
        count++;

        store.items[id] = {
            name: name,
            image: image,
            status: status,
            price: price,
            count: count,
            id: id
        };

        store.update();
        if(tocart) return window.location = '/cart';
        if(alertify) return Swal.fire({
            title: "Добавление в корзину", 
            type: 'success',
            html: 'Товар был перемещен в корзину.',  
        }); 
    },
    remove: (id) => {
        delete store.items[id];
        store.update();
        location.reload();
    },
    update: () => {

        let price = 0, count = 0, html = "";
        for(let i in store.items) {
            if(!store.items[i]) continue;
            count ++;
            price += parseFloat(store.items[i].price) * store.items[i].count;
            html += `<div class="item product parent"><div class="tabloid"><div class="topSection"><div class="column"><a class="onOrder label changeAvailable"><img src="/onOrder.png" alt="Под заказ" class="icon">`; 
                if(store.items[i].status == 0) html += `Под заказ`;
                else html += `В наличии`;
                html += `</a></div><div class="column"><a href="#" class="delete" onclick="store.remove(${ i })" style="color: #717171;text-decoration: none;float: right;font-size: 13px;position: relative;z-index: 111;">Удалить</a></div></div><div class="productTable"><div class="productColImage"><a href="#" class="picture"><img src="${ store.items[i].image }"><span class="getFastView">Быстрый просмотр</span></a></div><div class="productColText"><a href="/store/${ i }" class="name" target="_blank"><span class="middle">${ store.items[i].name }</span></a><a class="price"><span class="priceContainer">${ prettify(parseFloat(store.items[i].price).toFixed(1) * store.items[i].count) } руб.</span> ${ store.items[i].count } / шт.</a></div></div></div></div>`;
        };
function prettify(num) {
            var n = num.toString();
            return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ' ');
        }
        $('.cart .cartIcon .count').text(count);
        $('.cart .total').html(`${ parseFloat(price).toFixed(1) } руб.`);
        $('#basketProductList .productList').prepend(html);
        localStorage["data"] = JSON.stringify(store.items);
    },
    finish_fast: () => {
        if(!$('[name="form_text_10"]').val()) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Телефон не найден!" });
        idT = "";
        let result = `
        Имя: ${ $('[name="form_text_11"]').val() } <br /> 
        Телефон: ${ $('[name="form_text_10"]').val() } <hr />
        Оформленные товары: <br />`, arr = store.items, count = 0, price = 0;
    arr.forEach(function(item, i, arr) { 
        if(item == null) return; 
        count += item.count; 
        price += item.price * item.count; 
        result += `${ item.name }, 
        сумма: ${ parseFloat(item.price).toFixed(1) } руб. <br />
        кол-во: ${ item.count },
        Итоговая сумма товара: ${ parseFloat(item.price).toFixed(1) * item.count } руб.<br>`;
        idT += `${ item.id }.${ item.count },`;
    }); 
        if(count==0) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Перед заказом добавьте товары!" });
        result += `<hr /> Всего: ${ parseFloat(price).toFixed(1) } руб. `;
    store.items = [];
        var Zsum = parseFloat(price).toFixed(1);
        store.update(); 
        $.post('/order', { order: 'Быстрый заказ', text: result, sumZ: Zsum, idT: idT } , (data) => {
            data = JSON.parse(data); idT = "";
        window.location = "/oplata.php?sum=" + parseFloat(price).toFixed(1) + "&tel=" + $('[name="form_text_10"]').val();
            Swal.fire({
                title: "Успех!", 
                type: data.status,
                html: data.msg,  
            }); 
        });
    },
    finish_more: () => {
        if(!$('[name="ORDER_PROP_1"]').val()) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "ФИО не найдено!" });
        if(!$('[name="ORDER_PROP_2"]').val()) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Почта не найдена!" });
        if(!$('[name="ORDER_PROP_3"]').val()) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Телефон не найден!" });
        if(!$('[name="ORDER_PROP_4"]').val()) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Индекс не найден!" });
        if(!$('[name="ORDER_PROP_7"]').val()) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Адрес доставки не найден!" });
        idT = "";
        let result = `
        Имя: ${ $('[name="ORDER_PROP_1"]').val() } <hr /> 
        Почта: ${ $('[name="ORDER_PROP_2"]').val() } <br />
        Телефон: ${ $('[name="ORDER_PROP_3"]').val() } <br />
        индекс: ${ $('[name="ORDER_PROP_4"]').val() } <br />
        город: ${ $('[name="ORDER_PROP_5"]').val() } <br />
        Адрес: ${ $('[name="ORDER_PROP_7"]').val() } <br />
        Комментарий: ${ $('[name="comment"]').val() } <br />
        Оформил заказ: (Товары) <hr />`, arr = store.items, count = 0, price = 0;
    arr.forEach(function(item, i, arr) { 
        if(item == null) return; 
        count += item.count; 
        price += item.price * item.count; 
        result += `${ item.name }, 
        сумма: ${ parseFloat(item.price).toFixed(1) } руб. <br />
        кол-во: ${ item.count },
        Итоговая сумма товара: ${ parseFloat(item.price).toFixed(1) * item.count } руб.<br>`;
        idT += `${ item.id }.${ item.count },`; 
    }); 
        if(count==0) return Swal.fire({ title: "Оформление заказа.", type: 'error', html: "Перед заказом добавьте товары!" });
        result += `<hr /> Всего: ${ parseFloat(price).toFixed(1) } руб. `;
    store.items = [];
        var Zsum = parseFloat(price).toFixed(1);
        store.update(); 
        $.post('/order', { order: 'Подробный заказ', text: result, sumZ: Zsum, idT: idT } , (data) => {
            data = JSON.parse(data); idT = "";
        window.location = "/oplata.php?sum=" + parseFloat(price).toFixed(1) + "&tel=" + $('[name="ORDER_PROP_3"]').val();
            Swal.fire({
                title: "Успех!", 
                type: data.status,
                html: data.msg,  
            }); 
        });
    }
}

if(localStorage["data"]) {
    store.items = JSON.parse(localStorage["data"]);
    store.update();
}

$('.webformModal .webFormModalHeadingExit').click(() => $('.webformModal').removeClass('visible'));

function call() {
    if(!$('[name="form_text_6"]').val()) return Swal.fire({ title: "Заказ звонка.", type: 'error', html: "Телефон не найден!" });
    $.post('/order', { order: 'Заказ звонка', text: `Новый заказ звонка от абонента: ${ $('[name="form_text_6"]').val() }, Имя: ` + $('[name="form_text_7"]').val() } , (data) => {
        data = JSON.parse(data);
        Swal.fire({
            title: "Заказ звонка.", 
            type: data.status,
            html: data.msg,  
        }); 
    });
}