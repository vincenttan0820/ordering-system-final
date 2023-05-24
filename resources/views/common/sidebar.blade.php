<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('showMenu',['id'=>auth()->user()->id])}}">
        <div class="sidebar-brand-icon">
        <!--<img src="{{ asset('images/icon.png') }}"style="width: 75px; height: 75px;" >-->
        </div>
        <div class="sidebar-brand-text mx-3">Boba Drinks</div>
    </a>
    @unlessrole('User')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

  
    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>User Management</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">List</a>
                <a class="collapse-item" href="{{ route('users.create') }}">Add New</a>
            </div>
        </div>
    </li>
  
    
      <!-- Divider -->
      <hr class="sidebar-divider">
        <div class="sidebar-heading">
        Manage Menu
        </div>
 
    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#myDropdown"
            aria-expanded="true" aria-controls="myDropdown">
            <i class="fa fa-mug-hot"></i>
            <span>Menu Management</span>
        </a>
        <div id="myDropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Management:</h6>
                <a class="collapse-item" href="{{ route('menu.master') }}">Menu List</a>            
                <a class="collapse-item" href="{{ route('category.master') }}">Category List</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
      
<!-- Heading -->
<div class="sidebar-heading">
    Orders
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orderDropDown"
        aria-expanded="true" aria-controls="orderDropDown">
        <i class="fas fa-fw fa-folder"></i>
        <span>Order Management</span>
    </a>
    <div id="orderDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Order Management:</h6>
            <a class="collapse-item" href="/main">Lists</a>
           <!-- <a class="collapse-item" href="/insert">Add New</a>-->
        </div>
    </div>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endunlessrole

    @hasrole('Admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin Section
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Masters</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Role & Permissions</h6>
                    <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                    <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endhasrole
 

 <!-- Nav Item - Drink Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('showMenu',['id'=>auth()->user()->id])}}">
        <i class="fa fa-mug-hot"></i>
            <span>Menu</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('showCart',['id'=>auth()->user()->id]) }}">
        <i class="fas fa-shopping-basket"></i>
            <span>Cart</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('showHistory',['id'=>auth()->user()->id]) }}">
        <i class="fa fa-clipboard"></i>
            <span>Order History</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('showNews') }}">
        <i class="fa fa-newspaper"></i>
            <span>News</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
