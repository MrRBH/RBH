<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color: #f4f6f8;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if(Route::currentRouteName() == 'showposts')
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-black btn btn-outline-success" style="border: 1px solid black;" href="{{ route('livewire.login') }}"wire:navigate >Create Post</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-black btn btn-outline-success" style="border: 1px solid black;" href="{{ route('blog.posts') }}"wire:navigate >Create Post</a>
                        </li>
                    @endguest
                @endif
                @if(Route::currentRouteName() == 'view.post')
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-black btn btn-outline-success" style="border: 1px solid black;" href="{{ route('livewire.registerr') }}"wire:navigate >Create Post</a>
                       
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-black btn btn-outline-success" style="border: 1px solid black;" href="{{ route('blog.posts') }}"wire:navigate >Create Post</a>
                    </li>
                @endguest
            @endif
                
                    @guest
                    <li class="nav-item" style="margin-left: 1050px">
                        @if(Route::currentRouteName() == 'livewire.login')
                        <a class="nav-link text-black btn btn-outline-secondary" style="border: 1px solid black;" wire:navigate href="{{ route('livewire.registerr') }}">Register</a>
                        @elseif(Route::currentRouteName() == 'livewire.registerr')
                        <a class="nav-link text-black btn btn-outline-secondary" style="border: 1px solid black;" wire:navigate href="{{ route('livewire.login') }}">Login</a>
                        @elseif(Route::currentRouteName() == 'showposts')
                        <a class="nav-link text-black btn btn-outline-secondary" style="border: 1px solid black;" wire:navigate href="{{ route('livewire.registerr') }}">Register</a>
                        @endif
                    </li>
                    @else
                   
                    @if(Route::currentRouteName() == 'blog.posts')
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-black btn btn-outline-success" style="border: 1px solid black;" href="{{ route('showposts') }}"wire:navigate>Home</a>
                        </li>
                    @endauth
                @endif
               
                <li class="nav-item mx-2" >
                    <a class="nav-link text-black btn btn-outline-secondary" style="border: 1px solid black;" wire:navigate href="{{route('livewire.dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item mx-2" >
                    <a class="nav-link text-black btn btn-outline-secondary" style="border: 1px solid black;" wire:navigate href="{{route('blog.posts')}}">Blogs</a>
                </li>
                
                 <!-- Search form -->
                
         @endguest
                    <div class="ml-auto"> 
                        @auth 
                        <li class="nav-item">
                            <a class="nav-link text-black btn btn-outline-danger" style=" border: 1px solid black; margin-left: 900px;" wire:navigate href="{{route('livewire.signout')}}">Logout</a>
                        </li>
                        @endauth
                    </div>
                </ul>
            </div>
        </div>
    </nav> 
   
    
    {{ $slot }}
</body>
</html>
