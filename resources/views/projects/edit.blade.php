@extends('layouts.app')
@section('content')
<div class="col-md-5">
@if ($message = Session::get('error'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
</div>
<div class="container">
  <div class="row">
      
    <div class="col-md-9">
        <form action="{{ route('projects.update',$project->id)}}"  method="POST" enctype="multipart/form-data">
           @csrf
          @method('PUT')
              <div class="col-md-10 mb-6">
                <label for="validationServer01">Project Name</label>
                <input type="text" class="form-control is-valid" name="name" id="validationServer01" placeholder="Enter project name" value="{{$project->name}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-10 mb-6">
                <label for="validationServer02">Description</label>
                <input type="text" class="form-control is-valid" name="description" id="validationServer02" placeholder="Enter description" value="{{$project->description}}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
            </div>
            <div class="col-md-10 mb-6">
                    <label for="validationServer02">Days</label>
                    <input type="text" class="form-control is-valid" name="days" id="validationServer02" placeholder=" Enter no of days" value="{{$project->days}}" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
             </div>
             <div class="col-md-10 mb-6">
                    <label for="validationServer02">Days</label>
                    <select class="custom-select" name="company_id">
                        <option selected>Choose...</option>
                        @foreach ($companies as $company )
                      <option value="{{$company->id}}" selected>{{$company->name}}</option>
                      @endforeach      
                    </select>
                  </div>
            <button class="btn btn-primary m-4" type="submit">Update Project</button>
          </form>
      </div>
      
   
    
   
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
             <h2> Action </h2>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('projects.index')}}">
                All Project
              </a>
            </li>    
          </ul>
      </div>
      </nav>
     </div>
      </div>
</div>
@endsection