@extends('exam.layout')

@section('content')
<div class="container">
    <h1>Exam Details</h1>

    <div class="card mt-3">
        <div class="card-header">
            <h2>{{ $exam->exam }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Period:</strong> {{ $exam->period }}</p>
            <p><strong>Subject:</strong> {{ $exam->subject->subject }}</p>
            <p><strong>Lecturer:</strong> {{ $exam->lecturer->name }}</p>
            <p><strong>Year:</strong> {{ $exam->year }}</p>
            <p><strong>Created At:</strong> {{ $exam->created_at->format('d M Y') }}</p>
            <p><strong>Updated At:</strong> {{ $exam->updated_at->format('d M Y') }}</p>
        </div>
    </div>

    <a href="{{ route('exam.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
