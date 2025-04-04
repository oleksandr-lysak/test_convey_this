@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2 class="mt-5">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container shadow-lg p-3 mb-5 bg-white rounded">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
@endsection
