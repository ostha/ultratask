<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ url('/dashboard') }}" class="header-logo">
           <h4 class="logo-title ml-3">UltraTask</h4>
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-times wrapper-menu"></i>
        </div>
    </div>    

    <div class="data-scrollbar" data-scroll="1">

        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                        <a href="{{ url('/dashboard') }}" class="svg-icon">
                            <i>
                                <svg class="svg-icon" id="iq-main-1" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </i>
                            <span>Dashboard</span>
                        </a>
                    <ul id="index" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class="">
                    <a href="#notebooks" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                        <i>
                            <svg width="20" class="svg-icon" id="iq-main-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                            </svg>
                        </i>
                        <span>Products</span>
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="notebooks" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="{{ url('/dashboard/product/create') }}" class="svg-icon">
                                <i>
                                    <svg width="20" class="svg-icon" id="iq-main-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                </i>
                                <span>Add Products</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ url('/dashboard/category/create') }}" class="svg-icon">
                                <i>
                                    <svg width="20" class="svg-icon" id="iq-main-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                </i>
                                <span>Add Category</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ url('/dashboard/product') }}" class="svg-icon">
                                <i>
                                    <svg width="20" class="svg-icon" id="iq-main-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                </i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ url('/dashboard/category/') }}" class="svg-icon">
                                <i>
                                    <svg width="20" class="svg-icon" id="iq-main-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                </i>
                                <span>Categories</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
     
                <li>

                    <a href="{{ url('logout') }}"
                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="" data-toggle="">
                      
                        <span class="hidden-xs">Logout</span>
                         <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>  
                      </a>

                </li>
            </ul>
        </nav>

        <div class="p-3"></div>
    </div>
</div>