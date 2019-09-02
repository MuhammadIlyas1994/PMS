@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
      
    <div class="col-md-9">
         <div class="jumbotron">
          <div class="container">
            <h1 class="display-3">{{ $project->name }}</h1>
            <p>{{$project->description}}</p>
          </div>
        </div>
          <div class="container">
          <div class="row">
           <table class="table table-light">
             <thead>
               <th># </th>
               {{--  <th>Project Manager</th>  --}}
               <th>Company name</th>
               <th>started Date</th>
               <th>Days</th>
              
             </thead>
             <tbody>
               <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->company->name}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->days}}</td>

               </tr>
             </tbody>
           </table>
           
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
              <a class="nav-link" href="{{ route('projects.create')}}">
                  Add New member
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/company/{{$project->id}}/edit">
                  Edit
              </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('projects.destroy', $project->id)}}" method="post">
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