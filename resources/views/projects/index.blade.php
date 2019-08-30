@extends('layouts.app')

@section('content')
<div class="row">
       
    <div class="form-group col-md-12">
      <a class="btn btn-primary" href="{{ route('projects.create')}}">Add Project</a>
      </div>
  </div>
</div>
<table class="table table table-bordered" id="table_id">
  <thead>
      <tr>
          <th>Id</th>
          <th> project Name</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Company Name</th>
         
         
      </tr>
  </thead>
</table>
@endsection
 
@section('script')
{{-- Jquery CDN --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
{{-- DataTable CDN --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

{{-- JavaScript Papulate data and Dom function --}}
<script>
  {{-- initilization the dom --}}
$(document).ready( function () {
  $('#table_id').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{!! route('get.project') !!}',
    columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'company', name: 'company' },
           
        ]
  });
} );
{{-- End  --}}


</script>
@endsection