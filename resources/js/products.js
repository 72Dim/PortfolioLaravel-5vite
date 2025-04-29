$(document).ready(function() {

    class PageProducts {
        constructor() {}

        addObjectInNodeHTMLAndRemoveTransitElement() {
            /* В тег Р записан объект продукта в формате JSON, его отпарсил и добавил, как значение свойства
                productAsObj родительскому елементу тега Р. А затем тег Р удалили.
            */
            var elems = document.getElementsByClassName("goods-tile__prices");
            for( var i=0; i<elems.length; i++) {
                var first = elems[i];
                var first_P = first.children[0];
                first.productAsObj = JSON.parse(first_P.textContent);
                delete first.productAsObj.category;                      // удаление свойства
                first.productAsObj.amount = 0;                           // добавление свойства
                first_P.remove();                                        // удалили транзитный узел
            }
        }

        hoverToImage() {
            $("img[class='ng-lazyloaded']").hover(
                function(){
                    $(this).css("height", "300px");
                },
                function(){
                    $(this).height(
                    function(index, oldval){
                        $(this).css("height", "168px");
                    }
                    )
                }
            );
        }
    }

    var eventsOnTheProductPage = new PageProducts();

    eventsOnTheProductPage.addObjectInNodeHTMLAndRemoveTransitElement();
    eventsOnTheProductPage.hoverToImage();

});