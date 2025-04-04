@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="mt-5">Dashboard</h2>

    <div class="my-4">
        <div class="container shadow-lg p-3 mb-5 bg-white rounded">
            <h4>Your domain</h4>

            @error('domain')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('domain.save') }}">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" name="domain" id="domain"
                        value="{{ old('domain', optional($domain)->domain) }}" required>
                </div>

                <button type="submit" class="btn btn-{{ $domain ? 'success' : 'primary' }}">
                    {{ $domain ? 'Update' : 'Add' }}
                </button>

            </form>
        </div>
    </div>
@endsection
