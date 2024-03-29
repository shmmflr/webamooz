<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> وبلاگ {{ $title ?? "" }}</title>
    <meta name="description"
          content="وب آموز وبسایت آموزش برنامه نویسی وب و موبایل ، جاوااسکریپت ، لاراول ، react ، آموزش node js با مجرب ترین مدرسین">
    <meta name="keywords"
          content="آموزش طراحی سایت,آموزش برنامه نویسی,طراحی وب,ساخت وب سایت,آموزش git,آموزش لاراول,آموزش php,آموزش react,آموزش پی اچ پی,آموزش laravel,آموزش جاوا اسکریپت,آموزش ساخت وب سایت,آموزش mvc,آموزش React Native,وب آموز , وب اموز">
    <link rel="canonical" href="https://webamooz.net"/>
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/uicons-regular-rounded.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" media="(max-width:991px)">
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">--}}
</head>
<body>
<header class="c-header">
    <div class="container container--responsive container--white">
        <div class="c-header__row ">
            <div class="c-header__right">
                <div class="logo">
                    <a href="{{route('index')}}" class="logo__img"></a>
                </div>
                <div class="c-search width-100 ">
                    <form action="" class="c-search__form position-relative">
                        <label>
                            <input type="text" class="c-search__input" placeholder="جستجو کنید">
                        </label>
                        <button class="c-search__button"><i class="fi fi-rr-search"></i></button>
                    </form>
                </div>

            </div>
            <div class="c-header__left">
                <div class="c-header__icons">
                    <div class="c-header__button-search "></div>
                    <div class="c-header__button-nav"></div>
                </div>

                @guest
                    <div class="c-button__login-regsiter">
                        <div><a class="c-button__link c-button--login" href="{{route('login')}}">ورود</a></div>
                        <div><a class="c-button__link c-button--register" href="{{route('register')}}">ثبت نام</a></div>
                    </div>
                @else
                    <div style="width: 90%">
                        <div class="dropdown-select wide" id="user_name" tabindex="0" onclick="show_user()">
                        <span class="current">
                            {{auth()->user()->name}}
                        </span>
                            <div class="list">
                                <ul>
                                    <li class="option selected" data-value="0" data-display-text="">
                                        <a href="{{route('dashboard')}}">پروفایل</a>
                                    </li>
                                    <li class="option " data-value="0" data-display-text="" onclick="logout_user()">
                                        خروج
                                    </li>
                                    <form method="POST" action="{{route('logout')}}" id="form_logout">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endguest

            </div>
        </div>
    </div>
    <nav class="nav" id="nav">
        <div class="c-button__login-regsiter d-none">
            <div><a class="c-button__link c-button--login" href="sign-in.html">ورود</a></div>
            <div><a class="c-button__link c-button--register" href="register.html">ثبت نام</a></div>
        </div>
        <div class="container container--nav">
            <ul class="nav__ul">
                <li class="nav__item"><a href="{{route('index')}}" class="nav__link">صفحه اصلی</a></li>
                @php
                $categories = App\Models\Category::where('category_id', null)->with('children')->get();
                @endphp
                @foreach($categories as $cat)
                <li class="nav__item nav__item--has-sub"><a href="#" class="nav__link">{{$cat->name}}</a>
                    <div class="nav__sub">
                        <div class="container d-flex item-center flex-wrap container--nav">
                            @foreach($cat->children as $subcat)
                            <a href="" class="nav__link">{{$subcat->name}} </a>
                @endforeach
                        </div>
                    </div>
                </li>
                @endforeach
                <li class="nav__item"><a href="#" class="nav__link">درباره ما</a></li>
                <li class="nav__item"><a href="#" class="nav__link">تماس باما</a></li>
            </ul>
        </div>
    </nav>
</header>

{{$slot}}

<footer class="footer">
    <a href="" class="scroll-top"></a>

    <div class="container">
        <div class="footer__links">
            <a href="" class="footer__link">لینک اول</a>
            <a href="" class="footer__link">لینک اول</a>
            <a href="" class="footer__link">لینک اول</a>
            <a href="" class="footer__link">لینک اول</a>
            <a href="" class="footer__link">لینک اول</a>
            <a href="" class="footer__link">لینک اول</a>
        </div>
        <div class="footer__hr"></div>
        <div class="footer__about">
            <p class="footer__txt">
                وب اموز مرجعی تخصصی برای یادگیری طراحی و برنامه نویسی وب و موبایل است. ما در وب اموز با بهره گیری از
                نیروهای متخصص، باتجربه تمام تلاش خود را برای تهیه و تولید آموزش های با کیفیت و کامل و حرفه ای انجام
                می دهیم. باور ما اینست که کاربران ایرانی لایق بهترین ها هستند و باید بهترین و بروزترین فیلم های
                آموزشی، در اختیار آنها قرار بگیرد تا بتوانند به سرعت پیشرفت کنند و جزء بهترین ها شوند. امید است که
                با همراهی هر چه بیشتر شما کاربران عزیز در این راه، ما را برای حرکتی قدرتمند در مسیر این هدف باارزش
                یاری دهید.
            </p>
        </div>
    </div>
    <div class="footer__webamooz">
        طراحی و توسعه با لاراول توسط تیم
        <a class="footer__copy" href="https://webamooz.net">وب آموز</a>
        © 1399
    </div>
</footer>
<div class="overlay"></div>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
<script src="{{asset('panel/js/js.js')}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>-->
<script>
    function logout_user() {
        document.getElementById('form_logout').submit();
    }
</script>
{{$script ?? ''}}
</body>
</html>
