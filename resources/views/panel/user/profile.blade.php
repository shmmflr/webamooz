<x-panel-layout>
    <x-slot name="title">
        اطلاعات کاربری
    </x-slot>


    <div class="breadcrumb">
        <ul>
            <li><a href="index.html">پیشخوان</a></li>
            <li><a href="user-information.html" class="is-active">اطلاعات کاربری</a></li>
          </ul>
    </div>
    <div class="main-content  ">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="img/pro.jpg" class="avatar___img">
                        <input type="file" name="image" accept="image/*" class="hidden avatar-img__input">
                        @error('image')
                        <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                        @enderror
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">کاربر : {{auth()->user()->name}} </span>
                </div>
                <input name="name" type="text" class="text" placeholder="نام کاربری" value="{{auth()->user()->name}}">
                @error('name')
                <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                @enderror
                <input name="email" type="email" class="text text-left" placeholder="ایمیل" value="{{auth()->user()->email}}">
                @error('email')
                <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                @enderror
                <input name="mobile" type="text" class="text text-left" placeholder="موبایل" value="{{auth()->user()->mobile}}">
                @error('mobile')
                <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                @enderror
                <input name="password" type="password" class="text text-left" placeholder="رمز عبور">
                @error('password')
                <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                @enderror
                <p class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p>
                <br>
                <br>
                <button class="btn btn-webamooz_net">ذخیره تغییرات</button>
            </form>
        </div>

    </div>
</x-panel-layout>