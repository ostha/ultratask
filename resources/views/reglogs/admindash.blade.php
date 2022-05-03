@extends('reglogs.layout')

@section('meta-title')
  <title>Dashboard - August Project</title>
@endsection

@section('content')

<div class="reglogs-form">

<div class="logs-form">

<div class="para-head-form">
	
	<h1 class="h3 text-center">Dashboard</h1>

</div>

@if (Session::has('success'))
    <div class="success text-center"><b>{{ Session::get('success') }}</b></div>
@endif

@if (Session::has('failure'))
    <div class="error text-center"><b>{{ Session::get('failure') }}</b></div>
@endif 



<p>Welcome</p>

@if(Auth::check())
    You're logged in.

    <a href="{{ url('logout') }}"
          onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="" data-toggle="">
            
              <span class="hidden-xs">Logout</span>
               <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>  
            </a>
    

    @else
Please Login
    @endif






</div>


</div>

@endsection