<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>@yield('title')</title>
   
      
      <!-- Favicon -->

      @include('dashboard.common.head')
      @yield('styles')
      <style>
          .error{color:red}
      </style>
    
    </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
  </div>
  @include('dashboard.common.header')

  @include('dashboard.common.sidebar')


    <!-- Wrapper Start -->
    <div class="wrapper">
            <div class="content-page">

                <div class="container-fluid">
                    <div class="desktop-header">
                        <div class="card card-block topnav-left">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-between">
                                    <h4 class="text-capitalize">@yield('contenttitle')</h4>
                                </div>
                            </div>
                        </div>
                     

                    </div>    
                      </div>
                      <div class="container-fluid">

                      @include('dashboard.common.flash')
                      </div>
                @yield('content')

            </div>
    </div>
 <!-- Wrapper End-->

 @include('dashboard.common.footer')

 @include('dashboard.common.foot')

 @yield('scripts')

  </body>
</html>