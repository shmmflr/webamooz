<ul>
    <li class="item-li i-dashboard @if(request()->is('dashboard')) is-active @endif"><a href={{route('dashboard')}}>پیشخوان</a>
    </li>
    @if(auth()->user()->role === 'admin')
        <li class="item-li i-users @if(request()->is('dashboard/users') || request()->is('dashboard/users/*')) is-active @endif">
            <a
                href="{{route('users.index')}}"> کاربران</a></li>

        <li class="item-li i-categories @if(request()->is('dashboard/category') || request()->is('dashboard/category*')) is-active @endif ">
            <a href="{{route('category.index')}}">دسته بندی ها</a></li>
    @endif
    <li class="item-li i-articles @if(request()->is('dashboard/post') || request()->is('dashboard/post*')) is-active @endif">
        <a href="{{route('post.index')}}">مقالات</a></li>
    <li class="item-li i-comments"><a href=""> نظرات</a></li>
    <li class="item-li i-user__inforamtion"><a href="">اطلاعات کاربری</a></li>
</ul>
