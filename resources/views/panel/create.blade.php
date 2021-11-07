<x-panel-layout>
    <x-slot name="title">
        ایجاد کاربر جدید
    </x-slot>
    <div class="breadcrumb w-100" style="margin-right: 270px">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a href="{{route('users.create')}}" class="is-active">ایجاد کاربر جدید</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ساخت کاربر جدید</p>
                <form action="{{ route('users.store')}}" method="POST" class="padding-30">
                    @csrf
                    <input name="name" type="text" class="text" placeholder="نام و نام خانوادگی">
                    @error('name')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input name="email" type="email" class="text" placeholder="ایمیل">
                    @error('email')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input name="mobile" type="number" class="text" placeholder="شماره موبایل">
                    @error('mobile')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    {{--                    <input name="password" type="password" class="text" placeholder="رمز عبور">--}}
                    {{--                    <input name="password_confirmation" type="password" class="text" placeholder="تایید رمز عبور">--}}
                    <select class="select" name="role" id="role">
                        <option value="user">کاربر عادی</option>
                        <option value="teacher">مدرس</option>
                        <option value="author">نویسنده</option>
                        <option value="admin">مدیر</option>
                    </select>
                    @error('role')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-webamooz_net">ایجاد</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
