@extends('reglogs.layout')

@section('meta-title')
  <title>Login - August Project</title>
@endsection

@section('content')

<div class="reglogs-form">

<div class="logs-form">

<div class="para-head-form">
	
	<h1 class="h3 text-center">Sign In</h1>

</div>

@if (Session::has('success'))
    <div class="success text-center"><b>{{ Session::get('success') }}</b></div>
@endif

@if (Session::has('failure'))
    <div class="error text-center"><b>{{ Session::get('failure') }}</b></div>
@endif 

@if (Session::has('verify_failure'))
    <div class="error text-center"><b>{{ Session::get('failure') }} <a href="{!! route('back_getverifymail') !!}">Get verification mail.</a></b></div>
@endif 

	<form method="POST" action="{!! route('postadminlogin')  !!}"  >
		    {{ csrf_field() }}

<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
      @endif
    </div>

   <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>

    <button type="submit" class="btn btn-success btn-block">Sign In</button>	
    <!--
    <p class="p-eqmargin text-center"> OR  </p>

	    <div class="social-login" style="">
		    <button class="btn btn-facebook btn-social  btn-block" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
	        <button class="btn btn-google btn-social btn-block" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google</span> </button>
	 	</div>
	 <div>
	 	<a href="">
	 		Forget Password?
	 	</a>
	 </div>

   !-->

	</form>
</div>


</div>

@endsection