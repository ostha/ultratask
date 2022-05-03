@extends('dashboard.layouts.layout')

@section('title') Category - UltraTask Project @endsection
@section('contenttitle') Category @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Add New Category</h4>
                   </div>
                </div>
                <div class="card-body">

        
                     <div class="new-user-info">
                        <form method="POST" action="{{ route('category.store') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                              <div class="form-group col-md-12">
                                 <label for="title">Title:</label>
                                 <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') }}">
                                 @if ($errors->has('title'))
    <div class="error">{{ $errors->first('title') }}</div>
@endif
                                </div>
                              <div class="form-group col-md-12">
                                 <label for="slug">Slug:</label>
                                 <input type="text" class="form-control" id="slug" placeholder="slug" name="slug" {{ old('slug') }}>
                                 @if ($errors->has('slug'))
                                 <div class="error">{{ $errors->first('slug') }}</div>
                             @endif
                                </div>
                              <div class="form-group col-md-12">
                                <label for="featimg">Image:</label>
                                <input type="file" class="form-control" id="featimg" placeholder="featimage" name="featimg">
                                @if ($errors->has('featimg'))
                                <div class="error">{{ $errors->first('featimg') }}</div>
                            @endif
                             </div>
                             <div class="form-group col-md-12">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" name="description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                            @endif
                            </div>

            
                           </div>
                           
                
                           <button type="submit" class="btn btn-primary">Add New </button>
                        </form>
                </div>
             </div>
       </div>
    </div>
 </div>


 @endsection