@extends('exam.layout')

@section('content')
<div class="container">
    <h2>Edit Exam</h2>

    <form action="{{ route('exam.update', $exam->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="period">Period:</label>
            <input type="text" name="period" value="{{ old('period', $exam->period) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject_id">Subject:</label>
            <select name="subject_id" class="form-control" required>
                @foreach($subject as $sub)
                    <option value="{{ $sub->id }}" {{ $exam->subject_id == $sub->id ? 'selected' : '' }}>
                        {{ $sub->subject }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="lecturer_id">Lecturer:</label>
            <select name="lecturer_id" class="form-control" required>
                @foreach($lecturer as $lec)
                    <option value="{{ $lec->id }}" {{ $exam->lecturer_id == $lec->id ? 'selected' : '' }}>
                        {{ $lec->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" name="year" value="{{ old('year', $exam->year) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="exam">Upload New PDF (optional):</label>
            <input type="file" name="exam" class="form-control" accept="application/pdf">
            @if ($exam->exam)
                <p>Current PDF: <a href="{{ asset('storage/' . $exam->exam) }}" target="_blank">View PDF</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('exam.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
