   <main class="layout_category">
      @include('in_clude.breadcrumbs')
      <section class="content">
         <div class="" data-nameTag="dynamic-content">
            <kd-widget-list class="">
               <section class="portal-section">
                  <ul class="portal-categ_names">
                     @foreach ($paginateCategories as $category)
                        <li class="portal-categ_name mx-auto">
                           <kd-list-tile>
                              <form action="{{ route('home.show.products', ['category'=> $category->catgEng, 'id'=> $category->id]) }}"
                                    method="GET"
                                    class="category_card"> 
                                 <button class="btn btn-primary btn-lg category_card_img"
                                    type="submit">
                                    <img src="{{'http://laravel-3-study.loc/storage/images/imgCategorys/'.$category->saver}}"
                                       class="categ_saver"
                                       width="224"
                                       height="168">
                                    <p class="categ_name"
                                       data-catg_eng="{{ $category->catgEng }}">
                                       {{ $category->catgRus }}
                                    </p>
                                 </button>
                              </form>
                           </kd-list-tile>
                        </li>
                     @endforeach
                  </ul>
               </section>
               @include('in_clude.paginationElements', ['paginateCategories' => $paginateCategories])

               {{-- Данные с бекэнда exploringTheBackend.blade.php
                     Просто раскоментируй строку ниже
                  --}}
               {{-- @include('in_clude.exploringTheBackend') --}}
            </kd-widget-list>
         </div>
      </section>
   </main>
