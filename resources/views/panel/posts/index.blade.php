<x-panel-layout>
    <x-slot name="title">
        نمایش پست ها
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('post.index')}}" class="is-active"> مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('post.index')}}">لیست مقالات</a>
                <a class="tab__item " href="{{route('post.create')}}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" class="text" placeholder="نام مقاله">
                                <btutton class="btn btn-webamooz_net">جستجو</btutton>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>نویسنده</th>
                    <th>متن</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <tr role="row" class="">
                    <td><a href="">1</a></td>
                    <td><a href="">فریم ورک لاراول چیست</a></td>
                    <td>توفیق حمزئی</td>
                    <td>فریم ورک لاراول یکی از فریم ورک های محبوب ...</td>
                    <td>1399/11/11</td>
                    <td>
                        <a href="" class="mlg-15" title="حذف">
                            <i class="fi fi-rr-trash"></i>
                        </a>
                        <a href="" target="_blank" class="mlg-15" title="مشاهده">
                            <i class="fi fi-rr-eye"></i>
                        </a>
                        <a href="{{route('post.edit',1)}}" title="ویرایش">
                            <i class="fi fi-rr-edit"></i>
                        </a>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>

</x-panel-layout>
