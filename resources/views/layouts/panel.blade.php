<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>{{$title ??""}}</title>
    {{$style ?? ''}}
    <link rel="stylesheet" href="{{asset('plugin/v5/bootstrap.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/responsive_991.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/responsive_768.css')}}">
    <link rel="stylesheet" href="{{asset('panel/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('css/uicons-regular-rounded.css')}}">

</head>
<body>
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18">

    </span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img">
            <img src="{{asset('panel/img/pro.jpg')}}" class="avatar___img">

            <input type="file" accept="image/*" class="hidden avatar-img__input">

            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : {{auth()->user()->name}}</span>
        <span class="profile__name">نقش : {{auth()->user()->userRole()}}</span>
    </div>

    @include('_partisal.panel-sidebar')

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars">   <i class="fi fi-rr-align-justify"></i></span>
            <a class="header__logo" href="https://webamooz.net"></a>
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" title="خروج">خروج</button>
            </form>
        </div>
    </div>
    {{$slot}}
</div>
</body>
<script src="{{asset('panel/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('panel/js/js.js')}}"></script>
<script src="{{asset('plugin/v5/js/popper.min.js')}}"></script>
<script src="{{asset('plugin/v5/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
@if(session()->has('status'))
    <script>
        Swal.fire({
            title: "{{session('status')}}",
            icon: 'success',
            confirmButtonText: 'بسیار خوب'
        })
    </script>
@endif

{{$script ?? ""}}
</html>
