@extends('exam.layout')

@section('content')
<div class="container">
    <h1>Exams List</h1>
    <a href="{{ route('exam.create') }}" class="btn btn-primary mb-3">Add New Exam</a>
    <a class="btn btn-primary btn-sm" href="/"><i class="fa fa-arrow-left"></i> Back</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Exam</th>
                <th>Period</th>
                <th>Subject</th>
                <th>Lecturer</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>@if($exam->exam)
                        <!-- Link untuk membuka file PDF di tab baru -->
                        <a href="{{ asset('storage/' . $exam->exam) }}" target="_blank">View PDF</a>
                    @else
                        No PDF available
                    @endif</td>
                    <td>{{ $exam->period }}</td>
                    <td>{{ $exam->subject->subject }}</td>
                    <td>{{ $exam->lecturer->name }}</td>
                    <td>{{ $exam->year }}</td>
                    <td>
                        <a href="{{ route('exam.show',$exam->id) }}" class="btn btn-info">View</a>
                        @auth
                        <a href="{{ route('exam.edit',$exam->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('exam.destroy',$exam->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>   
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $exams->links() }}
    </div>
</div>
@endsection
