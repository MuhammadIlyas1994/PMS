@extends('layouts.app')

@section('content')
<div class="row">
       
    <div class="form-group col-md-12">
      <a class="btn btn-primary" href="{{ route('projects.create')}}">Add Project</a>
      </div>
</div>
<table class="table table-bordered" >
  <thead>
      <tr>
          <th>Id</th>
          <th> project Name</th>
          <th>Description</th>
          <th colspan="2">Action</th>
                 
      </tr>
      <tbody>
      @foreach ($projects as $project)
      <tr>
        {{--  {{dd($project)}}  --}}
          <td>{{$project->id}}</td>
          <td>{{$project->name}}</td>
          <td>{{$project->description}}</td>
           
          <td><a class="btn btn-primary" href="{{route('projects.edit',$project->id)}}">Edit</a> </td>
           <td> <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
           </td>
        </tr>
      @endforeach
      
      </tbody>
  </thead>
</table>
@endsection
 


