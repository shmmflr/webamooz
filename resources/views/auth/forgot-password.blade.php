<x-app-layout>
    <x-slot name="title"> - صفحه بازیابی رمزعبور</x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form " method="POST" action="{{route('password.email')}}">
                    @csrf
                    <input name="email" type="text" class="text text--left" placeholder="ایمیل">
                    @error('email')
                    <p style="color: red">
                        {{$message}}
                    </p>
                    @enderror
                    @if(\Illuminate\Support\Facades\Session::has('status'))
                        <p style="color:green;">
                            {{\Illuminate\Support\Facades\Session::get('status')}}
                        </p>
                    @endif
                    <button class="btn btn--blue btn--shadow-blue width-100 ">بازیابی</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{route('register')}}" class="color--46b2f0">صفحه ثبت نام</a>

                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
