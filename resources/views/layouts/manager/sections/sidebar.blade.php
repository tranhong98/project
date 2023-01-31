<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ assetStorageAvatar(auth()->user()->avatar) }}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                    <span class="text-secondary text-small">Quản Trị Viên</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Bảng Điều Khiển</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <span class="menu-title">Quản Lý Người Dùng</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('course-types.index')}}">
                <span class="menu-title">Quản Lý Thể Loại</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('courses.index')}}">
                <span class="menu-title">Quản Lý Khoá Học</span>
                <i class="mdi mdi-book-open-variant menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('courseUser.index')}}">
                <span class="menu-title">Quản Lý Hoá Đơn</span>
                <i class="mdi mdi-book-open-variant menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
