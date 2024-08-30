@extends('exam.layout')

@section('content')
<div class="container">
    <h1>Add New Exam</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('exam.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            {{-- <label for="exam">Exam Name</label>
            <input type="text" name="exam" class="form-control" id="exam" required> --}}
            <label for="exam">Upload PDF:</label>
            <input type="file" name="exam" class="form-control" id="exam" accept="application/pdf" required>
        </div>

        <div class="form-group mt-3">
            <label for="period">Period</label>
            <input type="text" name="period" class="form-control" id="period"  required>
        </div>

        <div class="form-group mt-3">
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control" required>
                @foreach ($subject as $subj)
                    <option value="{{ $subj->id }}">
                        {{ $subj->subject }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="lecturer_id">Lecturer</label>
            <select name="lecturer_id" id="lecturer_id" class="form-control" required>
                @foreach ($lecturer as $lect)
                    <option value="{{ $lect->id }}">
                        {{ $lect->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" id="year" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>

    <a href="{{ route('exam.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
