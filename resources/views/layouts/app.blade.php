<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <div class="container">
        <!-- Header -->
        <header class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('dashboard') }}" class="h3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mr-2" style="height: 40px;">
                SampleName
            </a>
            <div class="d-flex justify-content-center w-50">
                <a href="{{ route('dashboard') }}" class="mx-3">Dashboard</a>
                <a href="{{ route('plans') }}" class="mx-3">Plans</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('users') }}" class="mx-3">Users</a>
                    @endif
                @endauth
            </div>
            <div>
                @auth
                    <span>{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                @endauth
            </div>
        </header>

        <!-- Main content -->
        @yield('content')
    </div>

    <footer class="text-center mt-5">
        &copy; {{ date('Y') }} SampleName
    </footer>
</body>
</html>
