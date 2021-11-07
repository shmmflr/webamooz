<x-app-layout>
    <x-slot name="title"> - صفحه عضویت</x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">ثبت نام در وب‌سایت</h1>
                <form class="sign-page__form" method="POST" action="{{route('register.store')}}">
                    @csrf
                    <input name="name" type="text" class="text text--right" placeholder="نام  و نام خانوادگی"/>
                    @error('name')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input name="mobile" type="text" class="text text--left" placeholder="شماره موبایل"/>
                    @error('mobile')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input name="email" type="text" class="text text--left" placeholder="ایمیل"/>
                    @error('email')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input name="password" type="password" class="text text--left" placeholder="رمز عبور"/>
                    @error('password')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input name="password_confirmation" type="password" class="text text--left"
                           placeholder="تکرار رمز عبور"/>
                    @error('password_confirmation')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror


                    <button type="submit" class="btn btn--blue btn--shadow-blue width-100 mb-10">ثبت نام</button>

                    <div class="sign-page__footer">
                        <span>در سایت عضوید ؟ </span>
                        <a href="{{route('login')}}" class="color--46b2f0">صفحه ورود</a>

                    </div>
                </form>

            </div>
        </div>
    </main>
</x-app-layout>
