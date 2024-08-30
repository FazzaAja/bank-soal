@extends('subject.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Subject
    <a class="btn btn-primary btn-sm" href="/"><i class="fa fa-arrow-left"></i> Back</a></h2> 
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('subject.create') }}"> <i class="fa fa-plus"></i> Create New Subject</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Subject</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    {{-- <th>Details</th> --}}
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($subjects as $subject)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $subject->subject }}</td>
                    <td>{{ $subject->sks }}</td>
                    <td>{{ $subject->semester }}</td>
                    <td>
                        <form action="{{ route('subject.destroy',$subject->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('subject.show',$subject->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('subject.edit',$subject->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             
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
        
        {!! $subjects->links() !!}
  
  </div>
</div>  
@endsection