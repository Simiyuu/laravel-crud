@extends('layouts.master')
@section('pageTitle', 'Edit A Student')


@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Edit Student</h2>
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" 
                           class="form-control" 
                           id="first_name" 
                           name="first_name" 
                           value="{{ old('first_name', $student->first_name) }}">
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" 
                           class="form-control" 
                           id="last_name" 
                           name="last_name" 
                           value="{{ old('last_name', $student->last_name) }}">
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" 
                           class="form-control" 
                           id="age" 
                           name="age" 
                           value="{{ old('age', $student->age) }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $student->email) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
