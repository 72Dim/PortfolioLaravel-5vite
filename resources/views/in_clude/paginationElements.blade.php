{{-- <nav aria-label="Page navigation example">
   <ul class="pagination">
     <li class="page-item"><a class="page-link" href="#">Previous</a></li>
     <li class="page-item"><a class="page-link" href="#">1</a></li>
     <li class="page-item"><a class="page-link" href="#">2</a></li>
     <li class="page-item"><a class="page-link" href="#">3</a></li>
     <li class="page-item"><a class="page-link" href="#">Next</a></li>
   </ul>
 </nav> --}}
 {{-- <pre>{{ var_dump($myPaginate) }}</pre> --}}
{{-- @foreach ($myPaginate->getUrlRange(1, $myPaginate->lastPage()) as $key => $value)
         <p>{{ $key.' - '.$value.';' }}</p>
@endforeach --}}
{{-- <p>{{ '   Получить текущий номер страницы - $myPaginate->currentPage()             '.$myPaginate->currentPage() }}</p>
<p>{{ '   Получите URL следующей страницы - $myPaginate->nextPageUrl()             '.$myPaginate->nextPageUrl() }}</p>
<p>{{ '   Получите URL-адрес предыдущей страницы - $myPaginate->previousPageUrl()  '.$myPaginate->previousPageUrl() }}</p><br> --}}

{{-- <nav id="Page_navigation" class="mx_centering" style="width: min-content; margin-left: auto; margin-right: auto;"> --}}
   @if ( Str::is( '*categorys*', url()->full()) )
      <nav id="categories_navigation" class="mx-auto" style="width: min-content;">
         <ul class="pagination" data-page_count="{{ $paginateCategories->lastPage() }}">
            <li class="page-item">
               <a class="page-link" href="{{ $paginateCategories->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
               </a>
            </li>
            @foreach ($paginateCategories->getUrlRange(1, $paginateCategories->lastPage()) as $page => $urlPage)
               {{-- <p>{{ $key.' - '.$value.';' }}</p><br>  urlPage--}}
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
      {{-- "http://laravel-3-study.loc/fruits/1" --}}
   @elseif ( Str::is( '*/*', url()->full()) )
      <nav id="products_navigation" class="mx-auto" style="width: min-content;">
         <ul class="pagination" data-page_count="{{ $paginateProducts->lastPage() }}">
            <li class="page-item">
               <a class="page-link" href="{{ $paginateProducts->previousPageUrl() }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
               </a>
            </li>
            @foreach ($paginateProducts->getUrlRange(1, $paginateProducts->lastPage()) as $page => $urlPage)
               {{-- <p>{{ $key.' - '.$value.';' }}</p><br>  urlPage--}}
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
{{-- <br><pre>{{ var_dump($paginateProducts) }}</pre><!-- array(2) { [0]=> string(4) "main" [1]=> string(9) "Categorys" } --> --}}
{{-- <br><pre>{{ var_dump(request()->segments()) }}</pre><!-- array(2) { [0]=> string(4) "main" [1]=> string(9) "Categorys" } --> --}}
{{-- <br><pre>{{ var_dump(url()->full()) }}</pre><!-- string(41) "http://laravel-3-study.loc/categorys" --> --}}
{{-- <p>{{ var_dump( Str::is( '*categorys*', url()->full() )) }}</p> --}}
{{-- <p>{{ $paginateProducts->lastPage() }}</p> --}}
<pre>
   <?php
      // use Illuminate\Support\Str;   paginationElements
      // var_dump( Str::is( '*categorys', url()->full() ));
   ?>
</pre>