<x-panel-layout>
    <x-slot name="title">
        نمایش پست ها
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                <form action="{{route('post.index')}}">
                    <input value="{{ old('search') }}" name="search" class="text w-50" type="text">
                    <button type="submit" class="btn btn-primary">
                        بگرد
                    </button>
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
                @foreach($posts as $key=>$post)

                    <tr role="row" class="">
                        <td>{{$key+=1}}</td>
                        <td id="post-name-{{$post->id}}">{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{!! $post->content !!}</td>
                        <td> {{$post->jalaliDate()}}</td>
                        <td>
                            <a href="{{route('post.destroy',$post->id)}}"
                               onclick="delpost(event,{{$post->id}})"
                               class="mlg-15" title="حذف">
                                <i class="fi fi-rr-trash"></i>
                            </a>
                            <a href="{{route('post.show',$post->id)}}"

                               target="_blank"
                               class="mlg-15" title="مشاهده">
                                <i class="fi fi-rr-eye"></i>
                            </a>
                            <a href="{{route('post.edit',$post->id)}}" title="ویرایش">
                                <i class="fi fi-rr-edit"></i>
                            </a>
                        </td>
                        <form action="{{route('post.destroy',$post->id)}}"
                              method="POST"
                              id="destroy-post-{{$post->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{$posts->appends(request()->query())->links()}}
        </div>
    </div>

    <x-slot name="script">
        <script>
            function delpost(event, id) {
                var name = document.getElementById(`post-name-${id}`).innerText;
                event.preventDefault();
                Swal.fire({
                    title: name,
                    text: "آیا برای حذف این مقاله اطمینان دارید؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله ! حذف شود.',
                    cancelButtonText: 'خیر ! منصرف شدم.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`destroy-post-${id}`).submit();
                    }

                })
            }
        </script>
    </x-slot>
</x-panel-layout>
