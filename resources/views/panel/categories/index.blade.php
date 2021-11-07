<x-panel-layout>
    <x-slot name="title">
        مدیریت دسته بندی ها
    </x-slot>
    <x-slot name="style">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('category.index')}}" class="is-active">دسته بندی ها</a></li>
        </ul>
    </div>

    <div class="main-content padding-0 categories">
        <div class="d-flex justify-content-around no-gutters w-100 ">
            <div class="w-75 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key=>$category)
                            <tr role="row" class="">
                                <td>{{$key +=1}}</td>
                                <td id="cat-name-{{$category->id}}">{{$category->name}}</td>
                                <td>{{$category->slug}}</td>

                                <td>{{$category->getParentName()}}</td>


                                <td>
                                    <a href="{{route('category.destroy',$category->id)}}"
                                       onclick="destroyCat(event,{{$category->id}})"
                                       class=" mlg-15"
                                       title="حذف">
                                        <i
                                            class="fi fi-rr-trash"></i>
                                    </a>
                                    <a href="{{route('category.edit',$category->id)}}" title="ویرایش">
                                        <i
                                            class="fi fi-rr-edit"></i></a>
                                    <form method="POST"
                                          action="{{route('category.destroy',$category->id)}}"
                                          id="category-destroy-{{$category->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
            <div class="w-25 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                <form action="{{route('category.store')}}" method="POST" class="padding-30">
                    @csrf
                    <input type="text" name="name" placeholder="نام دسته بندی" class="text">
                    @error("name")
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <input type="text" name="slug" placeholder="نام انگلیسی دسته بندی" class="text">
                    @error("slug")
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select class="select" name="category_id" id="parent">
                        <option value="">ندارد</option>
                        @foreach($parent_cats as $key=>$parent_cat)
                            <option value="{{$parent_cat->id}}">
                                {{$parent_cat->name}}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            function destroyCat(event, id) {
                var name = document.getElementById(`cat-name-${id}`).innerText;
                console.log(name)
                event.preventDefault();
                Swal.fire({
                    title: name,
                    text: "آیا برای حذف این دسته اطمینان دارید؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله ! حذف شود.',
                    cancelButtonText: 'خیر ! منصرف شدم.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`category-destroy-${id}`).submit();
                    }

                })
            }
        </script>
    </x-slot>
</x-panel-layout>
