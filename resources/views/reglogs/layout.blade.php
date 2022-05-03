<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>August Project</title>

  <link rel="stylesheet" href="{{asset('assets/extras')}}/bootstrap/css/bootstrap.min.css">




  <link rel="stylesheet" href="{{asset('assets/extras')}}/style.css">


  @yield('styles')

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body>
<div class="reglogs">



  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    
    @yield('content')


  </div>
  <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->



@yield('scripts')
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('assets/extras')}}/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="{{asset('assets/extras')}}/bootstrap/js/bootstrap.min.js"></script>

</body>