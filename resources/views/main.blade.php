@extends('layouts.base')
@section('title', 'Main page')
@section('linkIcon', $siteFavicon ?? '')

@section('bodyHeader')
   <body
        data-git_branch="jsAsOOP"
        class = "{{ $bodyClass }}"
        data-modalBackdrop = "{{ $modalBackdrop ?? '' }}"
        data-modalDialog = "{{ $modalDialog ?? '' }}"
        data-nameContent = "{{ $nameContent ?? '' }}"
        data-categName = "{{ $categName ?? '' }}"
        data-categId = "{{ $categId ?? '' }}"
        {{-- data-allCategories = "{{ $allCategories ?? '' }}" --}}
        >
        <!-------------------------- Modal блок из бутстрап и розетки ------------------------------------>
        <div id="modal_backdrop" class="modal-backdrop fade"></div>
        <div id="modal_wrap" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!------------- Вставляем диалоговые окна в модальный блок -------------------->
                @if ( 'login' == $modalDialog )
                    @include('auth.my_login', ['nameButton' => 'Login',])
                @elseif ( 'register' == $modalDialog )
                    @include('auth.my_register', ['nameButton' => 'Register', 'test_di' => 'redirect_register'])
                @elseif ( 'cart' == $modalDialog )
                    @include('in_clude.cart')
                @endif
                <!----------- The end вставляем диалоговые окна в модальный блок ----------------->
            </div>
            </div>
        </div>
        <!-------------------------- The end modal блок из бутстрап и розетки ------------------------------>
        <div class="container-fluid">
            <div class="wrapper">
            @component('in_clude.banerHeader')
                @slot('framework')
                    <h5>
                        <span style="padding: 0 10px;">
                        Работа выполнена на Framework Laravel_8 и переделана под Laravel_11
                        </span>
                    </h5>
                @endslot
            @endcomponent

            <div style="order: 1;">
                @include('in_clude.header')
                {{-- @include('in_clude.messages') --}}
@endsection

@section('bodyContent')

   @guest
      @include('in_clude.startPage')
   @endguest

   @auth
      @if ( 'authenticated' == $nameContent )
         @include('in_clude.startPage')
      @endif

      @if ($paginateCategories != '')
         @include('in_clude.categories')

      @elseif($paginateProducts != '')
         @include('in_clude.products')
      @endif
   @endauth

@endsection

@section('footerSite')
   @include('in_clude.footerSite')
@endsection


