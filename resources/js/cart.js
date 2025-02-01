$(document).ready(function(){
    class Page {
        // _protectedProperty = 0;                   // Условно защищённое свойство начинается с '_'
        constructor() {
        this.selectedProducts = null;
        }

        add_flag_to_button() {                       // Если товар выбран, на кнопке будет корзина с галочкой
        if( sessionStorage.getItem('products_in_cart') != null ) {
            var cartFull = JSON.parse(sessionStorage.getItem('products_in_cart'));
            cartFull.forEach(
                (item, i, cartFull) => {
                    $("[data-product_id = "+''+item.id+"] button svg").eq(0).attr("style", "display: none;");    // empty
                    $("[data-product_id = "+''+item.id+"] button svg").eq(1).removeAttr("style");                // full
                }
            );
        }
        }

        remove_flag_from_button(obj) {
        if (obj != undefined) {
            $("[data-product_id = "+''+obj.id+"] button svg").eq(0).removeAttr("style");              // empty
            $("[data-product_id = "+''+obj.id+"] button svg").eq(1).attr("style", "display: none;");  // full
        }else {
            $("[data-base='empty']").removeAttr("style");                                             // empty
            $("[data-base='full']").attr("style", "display: none;");                                  // full
        }
        }

        show_amount_in_cart() {                      // отрожает количество товара в корзине
        var num = sessionStorage.getItem('amountInCart');
        if( num > 0 ) {
            $("#icon-counter")
            .html(
                '<span class="counter counter--green">'
                    +num
                +'</span>'
            );
        }
        else { /*( num == 0 )*/
            $("#icon-counter").empty();
        }
        }

        get_data_sessionStorage() {
        this.selectedProducts = sessionStorage.getItem('products_in_cart');     // array
        this.amountInCart = sessionStorage.getItem('amountInCart');             // number
        this.orderSum     = sessionStorage.getItem('orderSum');                 // number
        this.orderSum = ( this.orderSum != null ) ? +this.orderSum : 0.00;
        }

        set_data_sessionStorage() {
        sessionStorage.setItem('orderSum', this.orderSum.toFixed(2));                          // number
        sessionStorage.setItem('amountInCart', this.amountInCart);                             // number
        sessionStorage.setItem('products_in_cart', JSON.stringify( this.selectedProducts ));   // array
        }

        increase(obj) {                              /* увеличить */
        this.amountInCart++;
        obj.amount++;
        this.orderSum = this.orderSum + (+obj.price);
        }

        decrease(obj) {                              /* уменьшить */
        this.amountInCart--;
        obj.amount--;
        this.orderSum = this.orderSum - (+obj.price);
        }

        loop(i, id) {
        var element = this.selectedProducts[i];
        if ( element.id == id ) {
            var it = i;
            this.matchInArray = it;
        }
        else {
            i++;
            this.matchInArray = this.selectedProducts.length;
            if (i < this.selectedProducts.length) {
                this.loop(i, id);
            }
        }
        }
    }

    class Cart extends Page {
        constructor() {
            super();                                  // обязательный вызов родительского конструктора
            this.matchInArray = null;
        }

        addToCart() {
            var self = this;
            $("[data-product='add_to_cart']").click(  // добавление товара по клику
            function(){
                var parentElement = this.parentElement.parentElement.parentElement;     // продед в нём productAsObj
                self.add_product_to_cart(parentElement);
            });
        }

        add_product_to_cart(tagElem) {
            var i = 0;
            this.matchInArray = false;
            super.get_data_sessionStorage();
            if( this.selectedProducts != null ) {
                this.selectedProducts = JSON.parse(this.selectedProducts);
                super.loop(i, tagElem.productAsObj.id);
                if (this.matchInArray < this.selectedProducts.length) {
                    super.increase(this.selectedProducts[this.matchInArray]);
                }
                else if ( this.matchInArray == this.selectedProducts.length ) {
                    super.increase(tagElem.productAsObj);
                    this.selectedProducts.push(tagElem.productAsObj);
                }
            }
            else {
                this.selectedProducts = [];
                super.increase(tagElem.productAsObj);
                this.selectedProducts.push(tagElem.productAsObj);
            }
            this.set_data_sessionStorage();
            super.add_flag_to_button();
            super.show_amount_in_cart();
        }

        openCart() {
        var self = this;
        $("[name='Open-cart']").click(            // событие проявляющее корзину
            function() {
                $('body').addClass('modal-open_cart');
                $('#modal_backdrop, #modal_wrap').addClass('show');
                self.show_cart();
            });
        }

        show_cart() {
        var htmlEmptyCart =
            '<div class="cart-dummy" data-testid="empty-cart">'
                +'<img class="cart-dummy__illustration"'
                    +'src="http://laravel-3-study.loc/storage/images/emptyCart.png"'
                    +'alt="">'
                +'<h4 class="cart-dummy__heading">'
                    +'Корзина пуста'
                +'</h4>'
                +'<p class="cart-dummy__caption">'
                    +'Но это никогда не поздно исправить'
                +'</p>'
            +'</div>';
        super.get_data_sessionStorage();
        if ( this.selectedProducts != null ) {
            this.selectedProducts = JSON.parse(this.selectedProducts);
            if ( this.selectedProducts.length > 0 ) {
                this.show_cart_full();
            }else if( this.selectedProducts.length == 0 ){
                this.show_cart_empty(htmlEmptyCart);
            }
        }else { /* 'products_in_cart == null' */
            this.show_cart_empty(htmlEmptyCart);
        }
        }

        show_cart_full() {
        var self = this;
        $(".cart-dummy").remove();
        $(".cart-footer").remove();
        $("#cart_product_list").empty();
        var selectedProducts = this.selectedProducts;
        selectedProducts.forEach(
            (item, i, selectedProducts) => {
                var fullSrc = 'http://laravel-3-study.loc/storage/images/imgProducts/'+item.prodEng+'.jpg';
                $("#cart_product_list")
                .append(
                    '<li class="cart-list_item"'
                    +'id="'+item.prodEng+'_'+item.id+'">'
                    +'<div class="cart-product" style="opacity: 1;">'
                        +'<div class="cart-product__body">'
                            +' <!-- <span data-testid="picture-discount" class="promo-label promo-label_size_small promo-label_type_action cart-product__label ng-star-inserted"> −10% </span> -->'
                            +'<a class="cart-product__ picture" href="">'
                                +'<img data-cart-picture="picture"'
                                +'width="96" height="96" alt="'+item.prodRus+'" src="'+fullSrc+'">'
                            +'</a>'
                            +'<div class="cart-product__main">'
                                +'<h5 data-cart-prodRus="prodRus" class="cart-product__title" title="">'
                                +item.prodRus+' - '+item.country
                                +'</h5>'
                                +'<p data-cart-units="units" class="cart-product__title">'
                                +item.units+' - '+item.price
                                +'</p>'
                            +'</div>'
                            +'<button type="button" class="button button--white button--small popup-menu__toggle popup-menu__toggle--context" id="cartProductActions0" aria-expanded="false" aria-label="" aria-controls="cartProductActions0" aria-haspopup="true">'
                                +'<svg class="bi bi-three-dots-vertical"'
                                +'width="16"'
                                +'height="16"'
                                +'fill="currentColor"'
                                +'viewBox="0 0 16 16"'
                                +'xmlns="http://www.w3.org/2000/svg">'
                                +'<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>'
                                +'</svg>'
                            +'</button>'
                        +'</div>'
                        +'<div class="cart-product__footer">'
                            +'<div class="cart-price">'
                                +'<p>'
                                +'<span>Цена</span><span>'+item.price+'</span><span>за '+item.units+'</span>'
                                +'</p>'
                            +'</div>'
                            +'<div class="cart-product_counter"'
                                +'data-cart_product_id="'+item.id+'">'
                                +'<div class="cart-counter">'
                                +'<button class="button button_color_white button_size_xx_large cart-counter__button"'
                                    +'name="minus"'
                                    +'value=""'
                                    +'aria-label="Убрать один товар">'
                                    +'<!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">'
                                        +'<path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>'
                                    +'</svg> -->'
                                +'-</button>'
                                +'<input class="cart-counter__input"'
                                    +'id="prod_amount"'
                                    +'type="text"'
                                    +'name="amount"'
                                    +'value="'+item.amount+'"'
                                    +'disabled>'
                                +'<button class="button button_color_white button_size_xx_large cart-counter__button"'
                                    +'name="plus"'
                                    +'value=""'
                                    +'aria-label="Добавить ещё один товар">'
                                    +'<!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">'
                                        +'<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>'
                                    +'</svg> -->'
                                +'+</button>'
                                +'</div>'
                            +'</div><!-- the end cart-counter -->'
                            +'<div class="cart-product__coast ng-star-inserted">'
                                +'<!--'
                                +'<p data-testid="old-cost" class="cart-product__old-price ng-star-inserted">'
                                    +'28&nbsp;999&nbsp;₴'
                                +'</p>'
                                +'--><!---->'
                                +'<p class="cart-product_sum cart-product_sum--red">'
                                +'<span>Сумма </span>'
                                +'<span>'+(item.price*item.amount).toFixed(2)+'</span>'
                                +'<small> ₴</small>'
                                +'</p>'
                            +'</div>'
                        +'</div><!-- div class="cart-product__footer" -->'
                    +'</div><!-- div class="cart-product" style="opacity: 1;" -->'
                    +'</li>'
                );
            }
        );
        $(".card-body")
        .append(
            '<div class="cart-footer">'
                +'<button class="button button_size_medium button_color_gray cart-footer__continue ng-star-inserted"'
                    +'style="visibility: visible;"'
                    +'data-testid="continue-shopping-link">'
                    +'"Продолжить покупки"'
                +'</button>'
                +'<div class="cart-receipt" data-translate="квитанция">'
                    +'<div class="cart-receipt_order">'
                    +'<p class="cart-receipt_order-label">Итого</p>'
                    +'<div class="cart-receipt_order-sum">'
                        +'<span class="cart-receipt_order-sum-as-number"></span>'
                        +'<span class="cart-receipt_order-currency">₴</span>'
                    +'</div>'
                    +'</div>'
                    +'<a id="place_order"'
                    +'class="button button_size_large button_color_green cart-receipt_order-submit"'
                    +'href="" target="_blank">'
                    +'"Оформить заказ"'
                    +'</a>'
                +'</div><!-- end class="cart-receipt"-->'
            +'</div><!-- <div class="cart-footer"> -->'
        );
        $(".cart-receipt_order-sum-as-number").text(this.orderSum.toFixed(2));

        $(".cart-product_counter").click(function (event) {      // Подключил кнопки plus and minus в корзине
            var tagTarget = event.currentTarget;
            var action = $(event.target).attr('name');                  // plus || minus  на этом элементе произошло событие
            var idProd = $(event.currentTarget).attr('data-cart_product_id');
            if ( action == 'plus' ) {
                self.plus_in_cart(idProd, tagTarget);
            }
            else if ( action == 'minus' ) {
                self.minus_in_cart(idProd, tagTarget);
            }
        });

        $("#place_order").click(function (event) {            // Подключил кнопку оформить заказ
            event.preventDefault();
            self.save_order_database();
            self.close_modalBlock_clear_cart();
            self.remove_flag_from_button();
            self.show_amount_in_cart();
        });
        }

        show_cart_empty(htmlEmptyCart) {
            $(".cart-dummy").remove();
            $(".card-body").append(htmlEmptyCart);
        }

        prepare_for_action(id){                                        // подготовиться к действию
            var i = 0;
            this.get_data_sessionStorage();
            this.selectedProducts = JSON.parse(this.selectedProducts);
            this.loop(i, id);
        }

        plus_in_cart(id, tagTarget) {
            this.prepare_for_action(id);
            var iElem = this.selectedProducts[this.matchInArray];
            this.increase(iElem);
            this.recalculate_amount_product(tagTarget, iElem);
            $(".cart-receipt_order-sum-as-number").text(this.orderSum.toFixed(2));
            this.set_data_sessionStorage();
            this.show_amount_in_cart();

        }

        minus_in_cart(id, tagTarget) {
            this.prepare_for_action(id);
            var iElem = this.selectedProducts[this.matchInArray];
            this.decrease(iElem);
            if (iElem.amount > 0) {
                this.recalculate_amount_product(tagTarget, iElem);
                $(".cart-receipt_order-sum-as-number").text(this.orderSum.toFixed(2));
                this.set_data_sessionStorage();
                this.show_amount_in_cart();
            }
            else if ( iElem.amount == 0 && this.selectedProducts.length > 1 ) {
                this.recalculate_amount_product(tagTarget, iElem);
                $(".cart-receipt_order-sum-as-number").text(this.orderSum.toFixed(2));
                $("#"+iElem.prodEng+"_"+iElem.id).remove();
                this.selectedProducts.splice(this.matchInArray, 1);
                this.set_data_sessionStorage();
                this.remove_flag_from_button(iElem);
                this.show_amount_in_cart();
            }
            else if ( iElem.amount == 0 && this.selectedProducts.length == 1 ) {
                this.remove_flag_from_button(iElem);
                this.close_modalBlock_clear_cart();
                this.show_amount_in_cart();   // работает на sessionStorage вызывать после sessionStorage.clear();
            }
        }

        recalculate_amount_product(tag, obj) {
            var toPay = (obj.amount*obj.price).toFixed(2);
            $(tag).children().children().eq(1).attr('value', obj.amount);  // insert newAmount in input type=text
            $(tag).next().children().children().eq(1).text(toPay);
        }

        close_modalBlock_clear_cart() {
            $('body').removeClass($('body').attr('class'));
            $('#modal_backdrop, #modal_wrap').removeClass('show');
            $("#cart_product_list").empty();
            $(".cart-footer").remove();
            sessionStorage.clear();
        }

        prepare_data_for_analytics() {                                    // подготовить данные для аналитики
            var productsInCart = JSON.parse(this.selectedProducts);         // заказ покупателя  [{...}, {...}, ...]
            productsInCart.forEach(                                         // Удаляем лишние свойства, чтоб сохранить в БД,
                (item, i, productsInCart) => {                               // кроме свойств: exept property: [id, price, amount]
                    item.sum = (item.amount*item.price).toFixed(2);           // добавляем свойство сумма
                    // delete item.id;
                    // delete item.price;
                    // delete item.amount;
                    // delete item.prodEng;
                    delete item.prodRus;
                    delete item.units;
                    delete item.country;
                    delete item.picture;
                }
            );
            var customerOrder = {                                            // заказ покупателя
                amountInCart: this.amountInCart,
                orderSum: this.orderSum,
                inCart: productsInCart
            }; // console.log(JSON.stringify(productsInCart));       // [{"id":1,"prodEng":"Cherry_plum","price":"19.50","amount":1}]
            customerOrder = JSON.stringify(customerOrder);
            console.log(customerOrder);

            return customerOrder;   // JSON string
        }

        save_order_database() {                                           // сохранить заказ в БД
            this.get_data_sessionStorage();
            var userOrder = this.prepare_data_for_analytics();                // JSON string -подготовить заказ покупателя
            var urlAddress = 'http://laravel-5vite.loc/cart';
            this.settings_request(urlAddress, userOrder);                     // заказ покупателя
            this.request_completed();
        }

        settings_request(address, order) {                                // Настройки запроса
            $.ajaxSetup({                                                  // Настраивать
                headers: {
                    'X-CSRF-TOKEN': $('#token').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                },
                url:  address,
                type: 'POST',
                async:'true',
                contentType: 'application/json',
                data: order,
                dataType: 'json',
                scriptCharset: 'UTF-8',
                statusCode: {
                    404: function() { console.log( "Page not found.\n Страница не найдена." ); },
                    414: function() { console.log( "URI, запрошенный клиентом, длиннее, чем сервер готов интерпретировать." ); },
                    200: function() { console.log( "Successful request.\n Успешный запрос." ); }
                },
            }); // The end $.ajaxSetup()
        }

        request_completed() {                                                // Запрос выполнен
            $.ajax().done(function(data, textStatus, jqXHR) {                 // done - готово
                var serverMessage = JSON.parse(jqXHR.responseText);
                if ( "object" == typeof serverMessage && "undefined" == typeof serverMessage.length ) {
                    $('.header-actions')
                        .append('<li class="header-actions_link server-message">'
                                +'<div class="message-block alert alert-warning header-actions__component"'
                                    +'role="alert">'
                                +'</div>'
                            +'</li>');
                    for (var key in serverMessage) {
                        $('.header-actions_link.server-message div')
                        .append('<p class="message-'+key+'"><b><span>'+serverMessage[key]+'</span></b></p>');
                    }
                }
                setTimeout(() => {$('.server-message').remove()}, 5000);
            })
            .fail(function() {	          // to fail - Запрос потерпел неудачу
                alert( "Error" );
            });
        }

    };    // The end Cart

    var cartDialogInModalBlock = new Cart();                    // Создаётся экземпляр класса Cart

    cartDialogInModalBlock.openCart();

    cartDialogInModalBlock.addToCart();
    cartDialogInModalBlock.add_flag_to_button();
    cartDialogInModalBlock.show_amount_in_cart();

    $("#fat-menu").click(function () {                       // – удалить всё временно подключенна для тестирования
        sessionStorage.clear();
    });


}); // the end $(document)