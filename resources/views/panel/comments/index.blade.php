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
                <a class="tab__item is-active" href="{{route('comments.index')}}"> همه نظرات</a>
                <a class="tab__item " href="{{route('comments.index',['status'=>'0'])}}">نظرات تاییده نشده</a>
                <a class="tab__item " href="{{route('comments.index',['status'=>'1'])}}">نظرات تاییده شده</a>
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
                    <td> {{$comment->id}}</td>
                    <td> {{$comment->user->name}}</td>
                    <td> {{$comment->post->title}}</td>
                    <td>{{$comment->content}}</td>
                    <td>
                      {{verta($comment->created_at)->format('%d، %B  %Y')
                    }}
                    </td>
                    <td>{{$comment->replace_count}}</td>
                    <td class="{{$comment->status =='active' ? "text-success" :"text-danger"}}" >
                        {{$comment->status =='active' ? 
                        " تاییده شده" 
                        :" تاییده نشده"}}   
                    </td>
                    <td>
                        <a href="{{route('comment.destroy',$comment->id)}}" class=" mlg-15" onclick="delcomment(event,{{$comment->id}})" title="حذف">
                            <i class="bi bi-trash-fill" style="font-size: 16px"></i>
                        </a>
                        @if ($comment->status === 'active')

                        <a href="{{route('comment.update',$comment->id)}}" onclick="updatecomment(event,{{$comment->id}})" class=" mlg-15" title="تایید">
                            <i class="bi bi-check2-square" style="font-size: 16px;color:green"></i>
                        </a>
                            
                        @else
                        <a href="{{route('comment.update',$comment->id)}}" onclick="updatecomment(event,{{$comment->id}})"  class=" mlg-15" title="رد">
                            <i class="bi bi-x" style="font-size: 22px;color:red"></i>
                        </a>
                      
                        @endif
                        <a href="" class=" mlg-15" title="ویرایش">
                            <i class="bi bi-vector-pen" style="font-size: 16px"></i>
                        </a>
                    </td>
                    <form id="update-comment-{{$comment->id}}" method="POST" action="{{route('comment.update',$comment->id)}}">
                        @csrf
                        @method('put')
                    </form>
                    <form id="destroy-comment-{{$comment->id}}" method="POST" action="{{route('comment.destroy',$comment->id)}}">
                        @csrf
                        @method('delete')
                        <input type="text" hidden name="status" value="{{$comment->status}}">
                    </form>
                </tr>             
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <x-slot name="script">
        <script>
            //Delete method
              function delcomment(event, id) {
                event.preventDefault();
                Swal.fire({
                    title: 'هشدار',
                    text: "آیا برای حذف این مقاله اطمینان دارید؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله ! حذف شود.',
                    cancelButtonText: 'خیر ! منصرف شدم.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`destroy-comment-${id}`).submit();
                    }

                })
            }
            //Update Method
              function updatecomment(event, id) {
                event.preventDefault();
                Swal.fire({
                    title: 'سوال',
                    text: "وضعیت نظر را ویرایش می کنید.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله ! ویرایش شود.',
                    cancelButtonText: 'خیر ! منصرف شدم.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`update-comment-${id}`).submit();
                    }

                })
            }
        </script>
    </x-slot>
</x-panel-layout>
