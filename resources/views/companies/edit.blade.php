@extends('layouts.app')
@section('content')
<div class="col-md-5">
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
</div>
<div class="container">
  <div class="row">
      
    <div class="col-md-9">
        <form action="{{ route( 'company.update', $company->id )}}"  method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
              <div class="col-md-10 mb-6">
                <label for="validationServer01">Company Name</label>
                <input type="text" class="form-control is-valid" name="name" id="validationServer01" placeholder="First name" value="{{$company->name}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-10 mb-6">
                <label for="validationServer02">Description</label>
                <input type="text" class="form-control is-valid" name="description" id="validationServer02" placeholder="Last name" value="{{$company->description}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
            </div>
            <button class="btn btn-primary m-4" type="submit">Update</button>
          </form>
      </div>
     
   
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
             <h2> Action </h2>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('company.show',$company->id)}}">
               
                View Company
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('company.index')}}">
               
                All companies
              </a>
            </li>
           
                       
          </ul>
       
      </div>
      </nav>
     </div>
      </div>
</div>
@endsection