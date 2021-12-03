<x-panel-layout>
    <x-slot name="title">
        ایجاد پست
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{route('post.index')}}" class="is-active"> مقالات</a></li>
            <li><a href="{{route('post.edit',$post->id)}}" class="is-active">ایجاد مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data"
                      class="padding-30">
                    @csrf
                    @method('patch')
                    <label>عنوان مقاله</label>
                    <input type="text" name="title" class="text" placeholder="عنوان مقاله" value="{{$post->title}}">
                    @error('title')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <label>دسته بندی</label>
                    <ul class="tags">
                        @foreach($post->categories as $cat)
                            <li class="addedTag">{{$cat->name}}<span class="tagRemove"
                                                                     onclick="$(this).parent().remove();">x</span>
                                <input type="hidden" value="{{$cat->name}}" name="categories[]"></li>
                            <li class="tagAdd taglist">
                                <input type="text" id="search-field">
                            </li>
                        @endforeach
                    </ul>
                    @error('categories')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span style="font-family: 'Vazir'">آپلود بنر دوره</span>
                            <img src="{{$post->banner}}"/>
                            <input type="file" class="file-upload" id="files" name="banner" accept="image/*">
                        </div>
                        @error('banner')
                        <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                        @enderror
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    <textarea id="content" placeholder="متن مقاله" name="content"
                              class="text ">{{$post->content}}</textarea>
                    @error('content')
                    <p style="text-align: right;font-size: .8rem;color: #ec5858;margin-bottom: 5px">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-webamooz_net">ایجاد مقاله</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="{{asset('panel/js/tagsInput.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content', {
                language: 'fa',
                contentsLangDirection: 'rtl',
                height: 200,
                filebrowserUploadUrl: '{{route("upload.file",["_token"=>csrf_token()])}}',
                filebrowserUploadMethod: 'form',
            });
        </script>

    </x-slot>
</x-panel-layout>
