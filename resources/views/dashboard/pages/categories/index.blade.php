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
                      <h4 class="card-title">Categories List</h4>
                   </div>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      
                      <table id="user-list-table" class="table table-striped tbl-server-info mt-4" role="grid" aria-describedby="user-list-page-info">
                      <thead>
                         <tr class="ligth">
                            <th>Title</th>
                            <th>Image</th>
                            <th style="min-width: 100px">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach ($results as $res )
                              
                         
                            <tr>
                                <td>{{ $res->title }}</td>

                               <td class="text-center">
                                   @if($res->featimg != null && file_exists(public_path('')."/assets/media/categories/".$res->featimg))
                                   <img class="rounded img-fluid avatar-40" src="{{ asset('assets/media/categories/thumbnails') }}/{{ $res->featimg }}" alt="profile">
                                   @else
                                   <i>Image not available</i>
                                @endif
                                </td>
                                </td>
       
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{!! route('category.edit',$res->id) !!}"><i class="ri-pencil-line"></i></a>
                                     <a onclick="event.preventDefault();  document.getElementById('fif').submit();" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{ url('/') }}"><i class="ri-delete-bin-line"></i>
                                        <form id = "fif" action="{!! route('category.destroy',$res->id) !!}" method="POST" style="display: none">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </form>
                                    
                                    
                                    </a>
                                  </div>
                               </td>
                            </tr>
                            @endforeach
                      </tbody>
                      </table>

                      {{ $results->links() }}
                   </div>
                      <div class="row justify-content-between mt-3">
                         <div id="user-list-page-info" class="col-md-6">
                            <span>Showing 1 to 5 of 5 entries</span>
                         </div>
                         <div class="col-md-6">
                            <nav aria-label="Page navigation example">
                               <ul class="pagination justify-content-end mb-0">
                                  <li class="page-item disabled">
                                     <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                  </li>
                                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                     <a class="page-link" href="#">Next</a>
                                  </li>
                               </ul>
                            </nav>
                         </div>
                      </div>
                </div>
             </div>
       </div>
    </div>
 </div>


 @endsection