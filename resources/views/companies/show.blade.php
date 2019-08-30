@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
      
    <div class="col-md-9">
         <div class="jumbotron">
          <div class="container">
            <h1 class="display-3">{{ $company->name }}</h1>
            <p>{{$company->description}}</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
          </div>
        </div>
  
        <div class="container">
         
          <div class="row">
     
            @foreach ($projects as $project)
             <div class="col-md-4">
              <h2>{{$project->name}}</h2>
              <p>{{ $project->description }}</p>
              <p><a class="btn btn-secondary" href="/projects/{{$project->id}}" role="button">View details »</a></p>
            </div>
            @endforeach
           
          <hr>
  
        </div> <!-- /container -->
       
        
      </div>
     
    </div>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
               <h2> Action </h2>
            
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('company.create')}}">
                  Add New member
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/company/{{$company->id}}/edit">
                  Edit
              </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('company.destroy', $company->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              
            </li>
                       
          </ul>

          
        </div>
      </nav>
         </div>
      </div>
</div>
@endsection