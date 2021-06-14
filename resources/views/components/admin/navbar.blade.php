<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('categories.*')) active @endif" href="{{ route('categories.index') }}">
                    <span data-feather="file"></span>Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('news.*')) active @endif" href="{{ route('news.index') }}">
                    <span data-feather="edit"></span>Новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('sources.*')) active @endif" href="{{ route('sources.index') }}">
                    <span data-feather="briefcase"></span>Источники данных</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('orders.*')) active @endif" href="{{ route('orders.index') }}">
                    <span data-feather="shopping-cart"></span>Заказы выгрузки данных</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('feedback.*')) active @endif" href="{{ route('feedback.index') }}">
                    <span data-feather="message-square"></span>Сообщения</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('users.*')) active @endif" href="{{ route('users.index') }}">
                    <span data-feather="users"></span>Профили пользователей</a>
            </li>
        </ul>
    </div>
</nav>
