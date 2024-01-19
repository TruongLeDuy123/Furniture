 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-home"></i>
         </div>
         <div class="sidebar-brand-text mx-3">BiSys Admin</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->routeIs('customer_manager', 'edit_customer', 'detail_customer') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('customer_manager')}}">
             <i class="fas fa-users "></i>
             <span>Quản lý khách hàng</span></a>
     </li>

     <!-- Divider -->
     <!-- <hr class="sidebar-divider"> -->

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->routeIs('product_manager', 'edit_product', 'detail_product', 'create_product') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('product_manager')}}">
             <i class="fas fa-tags "></i>
             <span>Quản lý sản phẩm</span></a>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->routeIs('bill_manager', 'detail_bill','edit_bill') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('bill_manager')}}">
             <i class="fas fa-money-bill "></i>
             <span>Quản lý hóa đơn</span></a>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->routeIs('categories_manager', 'edit_categories', 'detail_categories', 'create_categories') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('categories_manager')}}">
             <i class="fas fa-boxes"></i>
             <span>Quản lý danh mục</span></a>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->routeIs('discount_manager', 'edit_discount', 'detail_discount', 'create_discount') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('discount_manager')}}">
             <i class="fas fa-percent"></i>
             <span>Quản lý khuyến mãi</span></a>
     </li>
     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ request()->routeIs('staff_manager', 'edit_staff', 'detail_staff', 'create_staff') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('staff_manager')}}">
             <i class="fas fa-address-card"></i>
             <span>Quản lý nhân viên</span></a>
     </li>

     <li class="nav-item {{ request()->routeIs('chart_manager' ) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('chart_manager')}}">
            <i class="fas fa-chart-line"></i>
            <span>Thống kê doanh thu</span></a>
    </li>

     <li class="nav-item {{ request()->routeIs('chatbox') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('chatbox')}}">
             <i class="fas fa-solid fa-envelope"></i>
             <span>Chatbox</span></a>
     </li>
 </ul>
 <!-- End of Sidebar -->
