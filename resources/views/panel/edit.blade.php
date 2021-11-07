<x-panel-layout>
    <x-slot name="title">
        ویرایش
    </x-slot>
    <div class="breadcrumb w-100" style="margin-right: 270px">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a href="{{route('users.edit',$user->id)}}" class="is-active">ویرایش کاربر </a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر </p>
                <form action="{{route('users.update',$user->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('patch')
                    <input name="name" type="text" class="text" placeholder="نام و نام خانوادگی"
                           value="{{$user->name}}">
                    <input name="email" type="email" class="text" placeholder="ایمیل" value="{{$user->email}}">
                    <input name="mobile" type="text" class="text" placeholder="شماره موبایل" value="{{$user->mobile}}">
                    <select name="role" id="role">
                        <option value="user" @if($user->role === "user") selected @endif> کاربر عادی</option>
                        <option value="teacher" @if($user->role === "teacher") selected @endif>مدرس</option>
                        <option value="author" @if($user->role === "author") selected @endif>نویسنده</option>
                        <option value="admin" @if($user->role === "admin") selected @endif>مدیر</option>
                    </select>
                    <button class="btn btn-webamooz_net">ویرایش کاربر</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
