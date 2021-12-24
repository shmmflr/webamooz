<div id="comment-{{$comment->id}}">
    <div class="comments__box">
        <div class="comments__inner">
            <div class="comments__header">
                <div class="comments__row">
                    <div class="d-flex flex-grow-1">
                        <div class="comments__avatar">
                            <img src="img/profile.jpg" class="comments__img">
                        </div>
                        <div class="comments__details">
                            <h5 class="comments__author"><span class="comments__author-name">{{$comment->user->name}}</span>
                            </h5>
                            <span class="comments_date">{{$comment->jalaliDate()}} </span>
                        </div>
                    </div>
                    <a onclick="setCommentId({{$comment->id}})"class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال
                        پاسخ</a>
                </div>
            </div>
            <p class="comments__body">
            {{$comment->content}}
            </p>
        </div>
        @isset($comment->replace)
        <div class="comments__subset">
            @foreach ($comment->replace as $replay)
            @include('comments.comments',['comment'=>$replay])      
            
            @endforeach
        </div>     
        @endisset
    </div>
</div>