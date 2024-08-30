@extends('subject.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Edit Subject</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('subject.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('subject.update',$subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputSubject" class="form-label"><strong>Subject:</strong></label>
            <input 
                type="text" 
                name="subject" 
                value="{{ $subject->subject }}"
                class="form-control @error('subject') is-invalid @enderror" 
                id="inputSubject" 
                placeholder="Subject">
            @error('subject')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputSks" class="form-label"><strong>SKS:</strong></label>
            <input 
                type="number" 
                name="sks" 
                value="{{ $subject->sks }}"
                class="form-control @error('sks') is-invalid @enderror" 
                id="inputSks" 
                placeholder="SKS">
            @error('sks')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputSemester" class="form-label"><strong>Semester:</strong></label>
            <input 
                type="number" 
                name="semester" 
                value="{{ $subject->semester }}"
                class="form-control @error('semester') is-invalid @enderror" 
                id="inputSemester" 
                placeholder="Semester">
            @error('semester')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
  
        {{-- <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:150px" 
                name="detail" 
                id="inputDetail" 
                placeholder="Detail">{{ $subject->detail }}</textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
  </div>
</div>
@endsection