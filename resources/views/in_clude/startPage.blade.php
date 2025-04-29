<main class="layout_startPage">
   @include('in_clude.breadcrumbs')
   <section class="content">
      <div class="ng-star-inserted" data-nameTag="dynamic-content">
         <kd-widget-list class="ng-star-inserted">
            <section class="portal-section">
               <div class="container-fluid">
                  <div class="row">
                     <h1 class="text-center">
                        <p>{{ $h1_title1 }}</p>
                        <p>{{ $h1_title2 }}</p>
                     </h1>
                  </div>
                  <div class="row">
                     <div class="col">
                        @include('in_clude.technicalTask') 
                     </div>
                     <div class="col text-center">
                        <img class="{{ $imgClassName ?? '' }}" src="{{ $laravelBook ?? '' }}" alt="Книга по ларавел">
                     </div>
                     <div class="col">               
                        @include('in_clude.projectDescription')
                     </div>
                  </div>
               </div>
            </section>
         </kd-widget-list>
      </div>
   </section>
</main>
