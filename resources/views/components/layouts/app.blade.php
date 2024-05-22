<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>{{ $title ?? 'Page Title' }}</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #f4f6f8;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            color: #000 !important;
            border: 1px solid #000;
        }

        .nav-link:hover {
            background-color: #e9ecef;
            color: #000 !important;
        }

        .ml-auto {
            margin-left: auto !important;
        }

        .btn-outline-secondary,
        .btn-outline-success,
        .btn-outline-danger {
            border: 1px solid #000;
        }

        .btn-outline-secondary:hover,
        .btn-outline-success:hover,
        .btn-outline-danger:hover {
            background-color: #e9ecef;
            color: #000 !important;
        }

        .btn-outline-success {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-5">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if(Route::currentRouteName() == 'showposts')
                    @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" href="{{ route('livewire.login') }}" wire:navigate>Create
                            Post</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" href="{{ route('blog.posts') }}" wire:navigate>Create
                            Post</a>
                    </li>
                    @endguest
                    @endif
                    @if(Route::currentRouteName() == 'view.post')
                    @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" href="{{ route('livewire.registerr') }}" wire:navigate>Create
                            Post</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" href="{{ route('blog.posts') }}" wire:navigate>Create
                            Post</a>
                    </li>
                    @endguest
                    @endif

                    @guest
                    <li class="nav-item ml-auto">
                        @if(Route::currentRouteName() == 'livewire.login')
                        <a class="nav-link btn btn-outline-secondary" wire:navigate
                            href="{{ route('livewire.registerr') }}">Register</a>
                        @elseif(Route::currentRouteName() == 'livewire.registerr')
                        <a class="nav-link btn btn-outline-secondary" wire:navigate href="{{ route('livewire.login') }}">Login</a>
                        @elseif(Route::currentRouteName() == 'showposts')
                        <a class="nav-link btn btn-outline-secondary" wire:navigate
                            href="{{ route('livewire.registerr') }}">Register</a>
                        @endif
                    </li>
                    @else
                    @if(Route::currentRouteName() == 'blog.posts')
                    @auth
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success" href="{{ route('showposts') }}" wire:navigate>Home</a>
                    </li>
                    @endauth
                    @endif

                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-outline-secondary" wire:navigate
                            href="{{route('livewire.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-outline-secondary" wire:navigate href="{{route('blog.posts')}}">Blogs</a>
                    </li>
                    @endguest
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger" wire:navigate
                            href="{{route('livewire.signout')}}">Logout</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2D1uSp6u6c6d5mMa6t0hU6yuIWkV7mI1JEiSkF3K6eS0Q1RSj4q5shqAR5p" crossorigin="anonymous">
    </script>
</body>

</html>
