<x-app-layout>
    <x-slot name="title"> - صفحه پست
        {{$post->title}}
    </x-slot>
    <main>
        <div class="container article">
            <article class="single-page">
                <div class="breadcrumb">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__item"><a href="{{route('index')}}" class="breadcrumb__link" > خانه</a>
                        </li>
                        <li class="breadcrumb__item"><a href="{{route('show.single.post',$post->slug)}}" class="breadcrumb__link">
                                {{$post->title}}‌</a></li>
                    </ul>
                </div>
                <div class="single-page__title">
                    <h1 class="single-page__h1">{{$post->title}}‌ </h1>
                    <span class="single-page__like"></span>
                </div>
                <div class="single-page__details">
                    <div class="single-page__author">نویسنده :{{$post->user->name}}</div>
                    <div class="single-page__date">تاریخ :{{$post->jalaliDate()}}</div>
                </div>
                <div class="single-page__img">
                    <img class="single-page__img-src" src="img/banner/lara.png" alt="">
                </div>
                <div class="single-page__content">
               {!!$post->content!!}
                </div>
                <div class="single-page__tags">
                    <ul class="single-page__tags-ul">
                        @foreach($post->categories as $cat)
                        <li class="single-page__tags-li"><a href="" class="single-page__tags-link">
                        {{$cat->name}}    
                        </a></li>
                        @endforeach
                    </ul>
                </div>

            </article>
        </div>
        <div class="container">
            <div class="comments" id="comments">
               @auth
               <div class="comments__send">
                <div class="comments__title">
                    <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                    <span class="comments__count">  نظرات ( {{$post->comments_count}} ) </span>
                </div>
                <form method="POST" action="{{route('comment.store')}}" >
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="comment_id" value="" id="comment_id">
                    <textarea name="content" class="comments__textarea" placeholder="بنویسید"></textarea>
                    <button class="btn btn--blue btn--shadow-blue">ارسال نظر</button>
                    <button class="btn btn--red btn--shadow-red">انصراف</button>

                </form>
            </div>

            @else

            <p>شما برای ارسال نظر ابتدا باید وارد سایت شوید</p>
               @endauth
                <div class="comments__list">
                    @foreach ($post->comments as $comment)
                    @include('comments.comments',['comment'=>$comment])      
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <x-slot name='script'>
        <script>
            function setCommentId(id){
                console.log(id);
                 document.getElementById('comment_id').value = id;

            }
        </script>
    </x-slot>
</x-app-layout>
