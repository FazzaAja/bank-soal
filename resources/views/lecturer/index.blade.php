@extends('lecturer.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Lecturer
    <a class="btn btn-primary btn-sm" href="/"><i class="fa fa-arrow-left"></i> Back</a></h2> 
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('lecturer.create') }}"> <i class="fa fa-plus"></i> Create New <lecturer></lecturer></a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    {{-- <th>Details</th> --}}
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($lecturers as $lecturer)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $lecturer->name }}</td>
                    {{-- <td>{{ $lecturer->detail }}</td> --}}
                    <td>
                        <form action="{{ route('lecturer.destroy',$lecturer->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('lecturer.show',$lecturer->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('lecturer.edit',$lecturer->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $lecturers->links() !!}
  
  </div>
</div>  
@endsection