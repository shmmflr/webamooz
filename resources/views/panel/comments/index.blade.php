<x-panel-layout>
    <x-slot name="title">
        مدیریت نظرات
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('comments.index')}}" class="is-active"> نظرات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="comments.html"> همه نظرات</a>
                <a class="tab__item " href="comments.html">نظرات تاییده نشده</a>
                <a class="tab__item " href="comments.html">نظرات تاییده شده</a>
            </div>
        </div>


        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>ارسال کننده</th>
                    <th>برای</th>
                    <th>دیدگاه</th>
                    <th>تاریخ</th>
                    <th>تعداد پاسخ ها</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                <tr role="row">
                    <td><a href="">{{$comment->id}}</a></td>
                    <td><a href="">محمد نیکو</a></td>
                    <td><a href=""> لاراول</a></td>
                    <td>{{$comment->content}}</td>
                    <td>
                      {{verta($comment->created_at)->format('%d، %B  %Y')
                    }}
                    </td>
                    <td>13</td>
                    <td class="{{$comment->status =='active' ? "text-success" :"text-danger"}}" >
                        {{$comment->status =='active' ? 
                        " تاییده شده" 
                        :" تاییده نشده"}}   
                    </td>
                    <td>
                        <a href="" class="item-delete mlg-15" title="حذف"></a>
                        <a href="show-comment.html" class="item-reject mlg-15" title="رد"></a>
                        <a href="show-comment.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                        <a href="show-comment.html" class="item-confirm mlg-15" title="تایید"></a>
                        <a href="edit-comment.html" class="item-edit " title="ویرایش"></a>
                    </td>
                </tr>             
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-panel-layout>
