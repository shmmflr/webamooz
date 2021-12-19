<x-panel-layout>
    <x-slot name="title">
        مدیریت پنل
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="d-flex justify-content-around">
            @if(auth()->user()->role==='admin')
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p> تعداد کاربران </p>
                <p>{{$count_users}} نفر</p>
            </div>
                <div class="bg-light p-4 text-center" style="border-radius: 10px">
                    <p>تعداد دسته بندی ها</p>
                    <p>{{$count_categories}} دسته بندی</p>
                </div>
                @endif
                @if(auth()->user()->role==='admin' || auth()->user()->role==='author')
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p>تعداد پست ها</p>
                <p>{{$count_posts}} پست</p>
            </div>
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p>تعداد نظرات</p>
                <p>{{$count_comments}} نظر</p>
            </div>
            @endif
        </div>

    </div>
</x-panel-layout>
