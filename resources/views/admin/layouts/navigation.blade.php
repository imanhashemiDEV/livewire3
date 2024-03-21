<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="{{route('logout')}}" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{route('users')}}">لیست کاربران</a></li>
                </ul>
            </li>
            <li>
                <a href="#">دسته بندی ها</a>
                <ul>
                    <li><a href="{{route('categories')}}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">مقاله ها</a>
                <ul>
                    <li><a href="{{route('create.article')}}">ایجاد مقاله</a></li>
                    <li><a href="{{route('articles')}}">لیست مقاله ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">تاریخ</a>
                <ul>
                    <li><a href="{{route('date.picker')}}">انتخاب تاریخ</a></li>
                </ul>
            </li>
            <li>
                <a href="#">آلپاین جی اس</a>
                <ul>
                    <li><a href="{{route('alpinejs')}}">install</a></li>
                    <li><a href="{{route('x-data')}}">x-data/x-text</a></li>
                    <li><a href="{{route('x-on')}}">x-on</a></li>
                    <li><a href="{{route('x-init')}}">x-init</a></li>
                    <li><a href="{{route('x-show')}}">x-show</a></li>
                    <li><a href="{{route('x-bind')}}">x-bind</a></li>
                    <li><a href="{{route('x-model')}}">x-model</a></li>
                    <li><a href="{{route('x-modelable')}}">x-modelable</a></li>
                    <li><a href="{{route('x-transition')}}">x-transition</a></li>
                    <li><a href="{{route('x-for')}}">x-for</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
