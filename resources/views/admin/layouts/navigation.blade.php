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
        </ul>
    </div>
</div>
