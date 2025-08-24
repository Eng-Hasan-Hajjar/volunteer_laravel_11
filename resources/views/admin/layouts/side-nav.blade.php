@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager'))
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
@else
    <aside class="main-sidebar sidebar-light-primary elevation-4">
@endif
<!-- Brand Logo -->
<a href="#" class="brand-link text-center" dir="rtl">
    <span class="brand-text font-weight-light text-right" dir="rtl">نظام المتطوعين</span>
</a>
<br>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="info">
            <a href="#" class="d-block text-right">{{ auth()->user()->name }} - {{ auth()->user()->roles->pluck('name')->implode(', ') }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        لوحة التحكم
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>الرئيسية</p>
                        </a>
                    </li>
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager'))
                        <li class="nav-item">
                            <a href="{{ route('people.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>المنسقين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('volunteers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>المتطوعين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('skills.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>مهارات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('volunteer-skills.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>مهارات المتطوع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('volunteer-tasks.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>مهام المتطوع</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('events.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>الفعاليات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employed-available-resources.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>موارد متاحة</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organizations.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>المنظمات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('financial-supports.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-donate"></i>
                                <p>الداعم المالي</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('funding-organizations.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <p>تمويل المنظمات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('event-volunteers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>مشاركات المتطوعين</p>
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>المستخدمين</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('main_home') }}" class="nav-link">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>الموقع</p>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom: 10px">
                        <a class="nav-link" style="margin-bottom: 10px" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('تسجيل خروج') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li >
                       <li class="nav-item" style="margin-bottom: 10px"  hidden>
                        <a class="nav-link" style="margin-bottom: 10px" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('تسجيل خروج') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>