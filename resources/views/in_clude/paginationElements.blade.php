   @if ( Str::is( '*categorys*', url()->full()) )
      <nav id="categories_navigation" class="mx-auto" style="width: min-content;">
         <ul class="pagination" data-page_count="{{ $paginateCategories->lastPage() }}">
            <li class="page-item">
               <a class="page-link" href="{{ $paginateCategories->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
               </a>
            </li>
            @foreach ($paginateCategories->getUrlRange(1, $paginateCategories->lastPage()) as $page => $urlPage)
               <li class="page-item">
                  <a class="page-link" href="{{ $urlPage }}">{{ $page }}</a>
               </li>
            @endforeach
            <li class="page-item">
               <a class="page-link" href="{{ $paginateCategories->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
               </a>
            </li>
         </ul>
      </nav>
   @elseif ( Str::is( '*/*', url()->full()) )
      <nav id="products_navigation" class="mx-auto" style="width: min-content;">
         <ul class="pagination" data-page_count="{{ $paginateProducts->lastPage() }}">
            <li class="page-item">
               <a class="page-link" href="{{ $paginateProducts->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
               </a>
            </li>
            @foreach ($paginateProducts->getUrlRange(1, $paginateProducts->lastPage()) as $page => $urlPage)
               <li class="page-item">
                  <a class="page-link" href="{{ $urlPage }}">{{ $page }}</a>
               </li>
            @endforeach
            <li class="page-item">
               <a class="page-link" href="{{ $paginateProducts->nextPageUrl() }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
               </a>
            </li>
         </ul>
      </nav>
   @endif
