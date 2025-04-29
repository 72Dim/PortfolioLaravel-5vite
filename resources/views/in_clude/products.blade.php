<main class="layout_product">
      @include('in_clude.breadcrumbs')
      <section class="catalog">
         <kd-catalog-settings class="catalog_layout ng-star-inserted" style="top: 5px;">
            <div class="catalog-settings">
               <kd-selected-filters class="catalog-settings__selection">
                  <div class="catalog-selection ng-star-inserted">
                     <ul class="catalog-selection__list">
                     </ul>
                  </div>
               </kd-selected-filters>
               <kd-sort class="catalog-settings__sorting">
                  <select class="select-css css-for-svg ng-pristine ng-valid ng-star-inserted ng-touched">
                     <option selected="" disabled="" hidden=""> По рейтингу </option>
                     <option value="1: cheap" class="ng-star-inserted"> От дешевых к дорогим </option>
                     <option value="2: expensive" class="ng-star-inserted"> От дорогих к дешевым </option>
                     <option value="3: popularity" class="ng-star-inserted"> Популярные </option>
                     <option value="4: novelty" class="ng-star-inserted"> Новинки </option>
                     <option value="5: action" class="ng-star-inserted"> Акционные </option>
                     <option value="6: rank" class="ng-star-inserted"> По рейтингу </option>
                  </select>
               </kd-sort>
               <kd-view-switch class="catalog-settings__view">
                  <div class="catalog-view__switch ng-star-inserted">
                     <button class="catalog-view__button left-button ng-star-inserted" title="Крупная плитка" arial-label="Крупная плитка">
                        <svg width="16" height="16" aria-hidden="true">
                        </svg>
                     </button>
                     <button class="catalog-view__button right-button ng-star-inserted" title="Малая плитка" arial-label="Малая плитка">
                        <svg width="16" height="16" aria-hidden="true">
                        </svg>
                     </button>
                  </div>
               </kd-view-switch>
            </div>
         </kd-catalog-settings>

         <div class="layout_product layout_with_sidebar"><!-- content with products -->
            <section class="content content_type_catalog">
               <kd-grid class="ng-star-inserted">
                  <ul class="catalog-grid">
                     @foreach ($paginateProducts as $product)
                        <li class="catalog-grid__cell catalog-grid__cell_type_slim" style="width: calc(100%/3);">
                           <kd-catalog-tile class="ng-star-inserted">
                              <app-goods-tile-default>
                                 <div class="goods-tile" data-tile="small">
                                    <div class="g-id display-none" data-product_name="{{ $nameProduct ?? '' }}">
                                       {{ $product->id }}
                                    </div><!-- id product --->
                                    <div class="goods-tile__inner" data-product_name="{{ $product->prodEng }}" data-product_id="{{ $product->id }}"><!-- id card product -------------------->
                                       <span class="goods-tile__label promo-label promo-label_type_popularity">
                                          ТОП ПРОДАЖ
                                       </span>
                                       <a class="goods-tile__picture" style="height: 300px;"
                                          href="">
                                          <img class="ng-lazyloaded" style="height: 168px;"
                                             alt="{{ $product->prodRus }}" title="{{ $product->prodRus }}"
                                             src="{{ url('/storage/images/imgProducts/'.$product->picture) }}"
                                             loading="lazy">
                                       </a>
                                       <a class="goods-tile__heading"
                                          href=""
                                          title="{{ $product->prodRus }}">
                                          <span class="goods-tile__title">
                                             {{ $product->prodRus.' - '.$product->country }}
                                          </span>
                                       </a>
                                       <div class="goods-tile__rating">
                                          <a class="ng-star-inserted" href="">
                                             <div class="goods-tile__stars">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                   <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                   <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                   <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                </svg>
                                                <span class="goods-tile__reviews-link"> 33 отзыва </span>
                                             </div>
                                          </a>
                                       </div>
                                       <div class="goods-tile__prices"
                                          data-product_as_obj="тут_here">
                                          <p class="hidden">
                                             {{ json_encode($product) }}
                                          </p>
                                          <div class="goods-tile__price--old price--gray">
                                             priceOld
                                             <small class="ng-star-inserted">₴</small>
                                          </div>
                                          <div class="goods-tile__price price--red">
                                             <p class="ng-star-inserted">
                                                <span class="goods-tile__price-value">
                                                   {{ $product->price }}
                                                </span>
                                                <span class="goods-tile__price-currency">₴</span>
                                             </p>
                                             <div class="goods-tile__buy-button toOrder">
                                                   <button
                                                      class="buy-button goods-tile__buy-button"
                                                      data-product="add_to_cart">
                                                      <svg
                                                         data-base = "empty"
                                                         width="20" height="20"
                                                         fill="#00a046"
                                                         viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                                      </svg>
                                                      <!-- После клика по корзине svg картинка меняется на ниже следующую -->
                                                      <svg
                                                         data-base = "full"
                                                         style = "display: none;"
                                                         width="20" height="20"
                                                         fill="#00a046"
                                                         viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                      </svg>
                                                   </button>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="goods-tile__availability goods-tile__availability--available">
                                          Готов к отправке
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00a046" class="bi bi-truck" viewBox="0 0 16 16">
                                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                          </svg> 
                                       </div>
                                    </div>
                                 </div><!-- The end class="goods-tile" -->
                              </app-goods-tile-default>
                           </kd-catalog-tile>
                        </li>
                     @endforeach
                  </ul>
               </kd-grid>
            </section> 
            @include('in_clude.sidebar')
         </div>
      </section>
      @include('in_clude.paginationElements', ['paginateProducts' => $paginateProducts])
</main>