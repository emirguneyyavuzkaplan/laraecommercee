<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/orders')}}">
                <i class="mdi mdi-chart-line menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title" >Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('category')}}">View Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-plus-circle-multiple-outline menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">View Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('brands')}}">
                <i class="mdi mdi-library-books menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('colors.index')}}">
                <i class="mdi mdi-library-books menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/users/create')}}">Add User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/users')}}">View User</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sliders')}}">
                <i class="mdi mdi-card-bulleted-settings menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.settings')}}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>
