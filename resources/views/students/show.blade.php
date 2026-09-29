@extends('layouts.master')
@section('pageTitle', 'Show A Student')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Student Details</h2>
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>First Name:</strong> 
                <p class="form-control-plaintext">{{ $student->first_name }}</p>
            </div>

            <div class="mb-3">
                <strong>Last Name:</strong> 
                <p class="form-control-plaintext">{{ $student->last_name }}</p>
            </div>

            <div class="mb-3">
                <strong>Age:</strong> 
                <p class="form-control-plaintext">{{ $student->age }}</p>
            </div>

            <div class="mb-3">
                <strong>Email Address:</strong> 
                <p class="form-control-plaintext">{{ $student->email }}</p>
            </div>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit Student</a>
            
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
