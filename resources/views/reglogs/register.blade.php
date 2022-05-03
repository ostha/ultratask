
@extends('reglogs.layout')

@section('meta-title')
  <title>Register - August Project</title>
@endsection

@section('content')

<div class="reglogs-form">

<div class="logs-form">

<div class="para-head-form">
  
  <h1 class="h3 text-center">Register</h1>

</div>


  <form class="needs_validation" method="POST" action="{!! route('postadminregister')  !!}" >
    {{ csrf_field() }}
<div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{ old('name') }}" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      @if ($errors->has('username'))
        <div class="error">{{ $errors->first('username') }}</div>
      @endif
    </div>

<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      @if ($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"  required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      @if ($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
      @endif
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
      @if ($errors->has('password_confirmation'))
        <div class="error">{{ $errors->first('password_confirmation') }}</div>
      @endif
    </div>


    <button type="submit" class="btn btn-success btn-block">Register</button>  

   <div>
    Already have an account? <a href="{!! route('getadminlogin') !!}">Log In.</a>
 
   </div>

  </form>
</div>


</div>

@endsection