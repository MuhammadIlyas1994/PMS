@extends('layouts.app')
@section('content')

<div class="card col-md-6 col-lg-6">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="card-header">
      <div class="container">
        <div class="row">
      <div class="col-md-9"> Companies</div>
      <div class="col-md-3"><a href="{{route('company.create')}}">Add Company</a></div>
      </div>
    </div>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($companies as $company )
        <li class="list-group-item">
          <div class="row">
          <div class="col-md-10">
            <a href="/company/{{$company->id}}">{{ $company->name }}</a>
          </div>
          
          <div class="col-md-2">
              <a class="btn btn-primary" href="{{route('company.edit',$company->id)}}">Edit</a>
              <form action="{{ route('company.destroy', $company->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
          </div>
        </div>
        
           
         
        </li>
        @endforeach
      
      
    </ul>
  </div>
  
@endsection