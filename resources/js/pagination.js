$(document).ready(function(){
    var nav = ['categories_navigation', 'products_navigation']; // навигация по категориям и по продуктам
    for (let i = 0; i < nav.length; i++) {
        if (document.getElementById(nav[i]) !== null) {          // Cуществует блок управления категориями
            Elements_disabled_and_active(nav[i]);                 // Элемент отключеный и активный
            break;
        }
    }

    function Elements_disabled_and_active(id) {                 // Элемент отключеный и активный
    if ( /page=\d+$/.test(location.href) ) {                 // Есть ли в адрессе такая часть
        $("a[href = '"+location.href+"']").addClass('active');
        let numberPage  = location.href.split('=');
        let countPages = $('#'+id+' ul').attr("data-page_count");
        if ( 1 == +numberPage[1] ) {
            $(".pagination li").first().addClass('disabled').attr("data-count", id+", "+countPages+" && "+numberPage[1]);
        }
        else if( +countPages == +numberPage[1] ) {
            $(".pagination li").last().addClass('disabled')
        }
    }
    else { // если http://..../main                          // Адресс не соответсвует регулярке
        $(".pagination li").first().addClass('disabled');
        if ( /\?$/.test(location.href) ) {
            $("a[href = '"+location.href+'page=1'+"']").addClass('active');
        }
        else {
            $("a[href = '"+location.href+'?page=1'+"']").addClass('active');
        }
    }
    } // The end Element_disabled_and_active

});