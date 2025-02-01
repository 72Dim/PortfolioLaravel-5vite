<div class="layout_breadcrumbs">
   <kd-breadcrumbs>
      <ul class="breadcrumbs">
         <li class="breadcrumbs__item breadcrumbs__item--home">
            <a class="breadcrumbs__link" title="Интернет магазин" href="{{ route('main.first_start') }}">
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="16" height="16" fill="currentColor"
                  class="bi bi-house breadcrumbs__icon-home"
                  viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
               </svg>
            </a>
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
               width="16" height="16" fill="currentColor"
               class="bi bi-chevron-right breadcrumbs__icon-chevron"
               viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
         </li>
         @if ( $nameContent == 'products' || $nameContent == 'authenticated' )
            <li class="breadcrumbs__item breadcrumbs__item--last">
               <a class="breadcrumbs__link" href="{{ route('home.show.categories') }}">
                  <span style="margin-left: 8px;">
                     Все категории товаров
                  </span>
               </a>
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="16" height="16" fill="currentColor"
                  class="bi bi-chevron-right breadcrumbs__icon-chevron"
                  viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
               </svg>
            </li>
         @endif
      </ul>
   </kd-breadcrumbs>
   <div class="breadcrumbs_heading">
      @if ( $nameContent == 'authenticated' || $nameContent == '' )
         <h1 style="color: #f2571d">
            Стартовая страница -
            <span style="font-size: 0.75em;">
               не много о проекте.
            </span>
         </h1>
      @elseif ( $nameContent == 'categories' )
         <h1 class="catalog-heading">
            Все категории товаров
         </h1>
      @elseif ( $nameContent == 'products' )
         <h1 class="catalog-heading">
            {{ $allCategories->where('catgEng', $categName)->pluck('catgRus')[0] }}
         </h1>
      @endif
   </div>
</div>
