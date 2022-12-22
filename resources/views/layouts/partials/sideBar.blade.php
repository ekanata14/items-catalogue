<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-basket-shopping"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Items Catalogue</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('/', 'home*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('user') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/user">
            <i class="fa-solid fa-user"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Items
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('category') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/category">
            <i class="fa-solid fa-list"></i>
            <span>Category</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('items') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/items">
            <i class="fa-solid fa-basket-shopping"></i>
            <span>Items</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('sale') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/sale">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>Sale</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('inout') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/inout">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>In Out</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
