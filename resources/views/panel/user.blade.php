<x-panel-layout>
    <x-slot name="title">
        کاربران
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </x-slot>
    <div class="breadcrumb" style="margin-right: 270px">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" title="پیشخوان">کاربر</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('users.index')}}">همه کاربران</a>
                <a class="tab__item" href="{{route('users.create')}}">ایجاد کاربر جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>سطح کاربری</th>
                    <th>تاریخ عضویت</th>
                    <th>موبایل</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr role="row" class="">
                        <td><a href="">{{$key+=1}}</a></td>
                        <td><a href="">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userRole()}}</td>
                        <td>
                            {{$user->jalaliDate()}}

                        </td>
                        <td class="text-success">{{$user->mobile}}</td>
                        <td>
                            @if($user->role !== 'admin' && auth()->user()->id !== $user->id)
                                <a href="{{route('users.destroy',$user->id)}}"
                                   onclick="destroyUser(event,{{$user->id}})"
                                   target="_blank" class=" mlg-15"
                                   title="حذف"><i
                                        class="fi fi-rr-trash"></i></a>
                            @endif

                            <a href="{{route('users.edit',$user->id)}}" class="" title="ویرایش"><i
                                    class="fi fi-rr-edit"></i></a>
                            <form method="post" action="{{route('users.destroy',$user->id)}}"
                                  id="destroy-user-{{$user->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
    <x-slot name="script">
        <script>
            function destroyUser(event, id) {
                event.preventDefault();
                Swal.fire({
                    title: "{{$user->name}}",
                    text: "آیا برای حذف این کاربر اطمینان دارید؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله ! حذف شود.',
                    cancelButtonText: 'خیر ! منصرف شدم.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`destroy-user-${id}`).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>
