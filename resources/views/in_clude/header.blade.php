<kd-header class="app-header">
    <kd-main-header class="header--thin">
        <div class="preloader" hidden></div>
        <header class="header">
            <div class="layout">
                <div class="header-layout">
                    <kd-mobile-user-menu class="header-menu">
                        <button class="header__button" type="button" aria-label="Открыть меню">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </button>
                    </kd-mobile-user-menu>
                    <a href="/"
                        class="header__logo"
                        style="width: 260px">
                        @if ( 'categories' == $nameContent || 'products' == $nameContent )
                        <img
                            width="40"
                            height="40"
                            src="{{ $brandImage ?? '' }}"
                            alt="Name brand">
                            <span style="margin-left: 6px; color:yellowgreen">
                                Brand image
                            </span>
                        @else
                        <img
                            width="40"
                            height="40"
                            src="{{ $nameBranch ?? '' }}"
                            alt="Name git branch">
                            <span style="margin-left: 10px; color:yellowgreen">
                                jsAsOOP
                            </span>
                        @endif
                    </a>
                    <button class="button button--medium button--with-icon menu__toggle"
                        id="fat-menu" aria-label="Каталог"
                        formaction="">
                        Кнопка
                    </button>
                    <div class="header-search js-app-search-suggest">
                        <form class="search-form ng-pristine ng-valid ng-touched"
                            method="POST"
                            action=""
                            novalidate="">
                            <div class="search-form__inner">
                                <div class="search-form__input-wrapper">
                                    <button class="search-form__back" type="button" aria-label="Отменить поиск">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                                    <input class="search-form__input ng-pristine ng-valid ng-touched"
                                        type="text"
                                        name="search"
                                        search-input=""
                                        placeholder="Я ищу..."
                                        autocomplete="off"
                                    ><!----><!---->
                                    <button class="search-form__microphone"
                                        type="button"
                                        aria-label="Голосовой поиск">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                                            <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0V3z"/>
                                            <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </button>
                                </div>
                                <!----><!---->
                            </div><!---->
                            <button class="button button_color_green button_size_medium search-form__submit"
                                type="submit"
                                name="open_categorys">
                                Найти
                            </button>
                        </form>
                    </div>
                    <ul class="header-actions">
                        @guest
                            @include('in_clude.buttonsLoginAndRegister')
                        @endguest

                        @auth
                            @if ( 'authenticated' != $nameContent )
                                <li class="header-actions_link absolutely-right">
                                    <div class="header-actions__component">
                                        <button class="header__button"
                                            @if ( $modalDialog != 'cart') {{ "disabled" }} @endif
                                            type="button"
                                            name="Open-cart">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
                                            </svg>
                                            <div id="icon-counter">
                                                <!-- Указывается количество товара в корзине -->
                                            </div>
                                        </button>
                                    </div>
                                </li>
                            @endif
                        @endauth
                        <li class="header-actions_link">
                            <div class="header-actions__component">
                                <a class="header__button" data-info="рабочая строка"
                                    title="Тест представления почтового отправления."
                                    href="{{ route('mail.show.viewMailable') }}">
                                    View Mailable
                                </a>
                            </div>
                        </li>

                        @auth
                            <li class="header-actions_link">
                                <a id="navbarDropdown"
                                    href="#"
                                    class="nav-link dropdown-toggle"
                                    style="color: white;"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </header>
    </kd-main-header>
</kd-header>