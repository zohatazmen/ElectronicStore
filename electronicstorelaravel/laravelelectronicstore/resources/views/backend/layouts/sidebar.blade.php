<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Authentication</div>
                <a class="nav-link" href="{{ url('admin/login') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                    Login
                </a>
                <a class="nav-link" href="{{ url('admin/register') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                    Register
                </a>
                <a class="nav-link" href="{{ url('/admin/admins-list') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
                <div class="sb-sidenav-menu-heading">Shop Management</div>

                <!-- Link to view all shop products -->
                <a class="nav-link" href="{{ route('admin.shops.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    View All Products
                </a>

                <!-- Link to add a new shop product -->
                <a class="nav-link" href="{{ route('admin.shops.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Add New Product
                </a>

                <div class="sb-sidenav-menu-heading">Order Management</div>

                <!-- Link to view all orders -->
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    View All Orders
                </a>

                <!-- Link to add a new order -->
                <a class="nav-link" href="{{ route('admin.orders.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Add New Order
                </a>
                <div class="sb-sidenav-menu-heading">Wishlist Management</div>

                <!-- Link to view all wishlists -->
                <a class="nav-link" href="{{ route('admin.wishlists.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                    View All Wishlists
                </a>

                <!-- Link to add a new wishlist -->
                <a class="nav-link" href="{{ route('admin.wishlists.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Add New Wishlist
                </a>
                <div class="sb-sidenav-menu-heading">Contact Management</div>

                <a class="nav-link" href="{{ route('admin.contacts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                    View All Contacts
                </a>

                <a class="nav-link" href="{{ route('admin.contacts.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    Add New Contact
                </a>

                <div class="sb-sidenav-menu-heading">Logout</div>

                <!-- Logout link -->
                <a class="nav-link" href="{{ route('admin.login') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>





            
            </div>
        </div>
     
    </nav>
</div>
