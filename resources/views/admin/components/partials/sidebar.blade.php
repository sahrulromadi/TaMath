<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('assets/admin/img/logo_light.svg') }}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pages</h4>
                </li>
                <li class="nav-item {{ Route::is('admin.question.index') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#content">
                        <i class="fas fa-layer-group"></i>
                        <p>Content</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Route::is('admin.question.index') ? 'show' : '' }}" id="content">
                        <ul class="nav nav-collapse">
                            @foreach (App\Models\Category::all() as $category)
                                <li>
                                    <a href="{{ route('admin.question.index', $category->name) }}">
                                        <span class="sub-item">{{ $category->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li
                    class="nav-item {{ Route::is('admin.question.create') || Route::is('admin.question.edit') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#question">
                        <i class="fas fa-question-circle"></i>
                        <p>Question</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Route::is('admin.question.create') ? 'show' : '' }}" id="question">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.question.create') }}">
                                    <span class="sub-item">Create</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
