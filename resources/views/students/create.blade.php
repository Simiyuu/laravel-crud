@extends('layouts.master')
@section('pageTitle', 'Create A Student')
@section('content')
    <h1 class="display-6">Create New Student</h1>
    <hr/>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}">
        </div>
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create!</button>
    </form>
@endsection