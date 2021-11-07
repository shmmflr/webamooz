<x-panel-layout>
    <x-slot name="title">
        ویرایش دسته بندی
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('category.index')}}">دسته بندی ها</a></li>
            <li><a href="{{route('category.edit',$category->id)}}" class="is-active"> ویرایش دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش دسته بندی </p>
                <form action="{{route('category.update',$category->id)}}" method="POST" class="padding-30">
                    @csrf
                    @method('PUT')
                    <input value="{{$category->name}}" type="text" name="name" placeholder="نام دسته بندی"
                           class="text">
                    @error("name")
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    {{--  بخاطر سئو این بخش اجازه تغییرات رت نمیدهیم--}}
                    <input value="{{$category->slug}}" disabled type="text" name="slug"
                           placeholder="نام انگلیسی دسته بندی" class="text">
                    @error("slug")
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select class="select" name="category_id" id="parent">
                        <option value="">ندارد</option>
                        @foreach($parent_cats as $key=>$parent_cat)
                            <option value="{{$parent_cat->id}}"
                                    @if($parent_cat->id === $category->category_id) selected @endif>
                                {{$parent_cat->name}}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
                </form>

            </div>
        </div>
    </div>

</x-panel-layout>
