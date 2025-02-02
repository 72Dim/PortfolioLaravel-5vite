<li class="header-actions_link">
    <div class="header-actions__component">
        <a class="header__button"
            href={{ route('login') }}>
            Login
        </a>
    </div>
</li>
<li class="header-actions_link">
    <div class="header-actions__component and-img">
        <img alt="Pen for register"
            width="40" height="40"
            src="{{ $penRegister ?? '' }}">
        <a class="header__button"
            title="Зарегистрироваться"
            href={{ route('register') }}>
            Register
        </a>
    </div>
</li>