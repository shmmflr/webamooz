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
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p> تعداد کاربران </p>
                <p>20 نفر</p>
            </div>
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p>تعداد پست ها</p>
                <p>20 پست</p>
            </div>
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p>تعداد نظرات</p>
                <p>300 نظر</p>
            </div>
            <div class="bg-light p-4 text-center" style="border-radius: 10px">
                <p>تعداد دسته بندی ها</p>
                <p>300 نظر</p>
            </div>
        </div>

    </div>
</x-panel-layout>
