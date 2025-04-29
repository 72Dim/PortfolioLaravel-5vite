<aside class="sidebar" spinnerid="LOAD_FILTERS" spinnertype="element">
   <kd-filter-stack class="ng-star-inserted">
      <div class="sidebar-block">
         <div class="sidebar-block__inner" style="overflow-x: hidden;">
         </div>
      </div>
      <div class="sidebar-block">
         <button type="button" class="sidebar-block__toggle">
            <span class="sidebar-block__toggle-title">
               Категории товаров
            </span>
         </button>
         <div class="sidebar-block__inner" style="overflow-x: hidden;">

         <kd-filter-searchline class="ng-star-inserted">
            <div class="sidebar-search">
               <input type="search" name="searchline"
                  class="sidebar-search__input ng-untouched ng-pristine ng-valid"
                  placeholder="Поиск">
            </div>
         </kd-filter-searchline>
         <ul class="menu-categories menu-categories_type_main">
            <li class="menu-categories__item">
               <a class="menu-categories__link"
                  href="{{ route('home.show.categories') }}"
                  data-base="categories">
                  <span class="menu-categories__icon">
                  </span>
                     Все категории товаров
               </a>
            </li>
            @foreach ( $allCategories->all() as $category )
               <li class="menu-categories__item">
                  <a class="menu-categories__link"
                     href="{{ route('home.show.products', ['category'=> $category->catgEng, 'id'=> $category->id]) }}"
                     data-base="products">
                     {{ $category->catgRus }}
                     <span class="menu-categories__icon">
                        (свежак)
                     </span>
                  </a>
               </li>
            @endforeach
         </ul>
      </div>
   </kd-filter-stack>
</aside>