<style>
    .active-link {
        color: #545766;
        border-right: 4px solid #1e9ff2;
        background: whitesmoke;
    }

    .navigation {
        font-size: 1rem !important;
    }

    ol li, ul li, dl li {
        line-height: 1.5 !important;
    }
</style>

<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item {{ Request::path() == 'admin' ? 'active-link' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">Dashboard</span>
                </a>
            </li>
            <li class=" nav-item {{ Request::path() == 'admin/categories' ? 'active-link' : '' }}">
                <a href="{{ route('admin.categories') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">Categories</span>
                </a>
            </li>
            <li class="nav-item has-sub">
                <a href="#">
                    <i class="la la-user"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Books</span>
                </a>
                <ul class="menu-content" style="">
                    <li class="{{ Request::path() == 'admin/books/add' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.books.create') }}"
                           data-i18n="nav.dash.ecommerce">Add
                        </a>
                    </li>
                    <li class="{{ Request::path() == 'admin/books' ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.books') }}"
                           data-i18n="nav.dash.crypto">View</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ Request::path() == 'admin/users' ? 'active-link' : '' }}">
                <a href="{{ route('admin.users') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">Users</span>
                </a>
            </li>
            <li class=" nav-item {{ Request::path() == 'admin/orders' ? 'active-link' : '' }}">
                <a href="{{ route('admin.orders') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">Orders</span>
                </a>
            </li>
        </ul>
    </div>
</div>
