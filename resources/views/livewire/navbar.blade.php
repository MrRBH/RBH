<div>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <livewire:styles />
 </head>
 <body >
    <nav
        class="navbar navbar-expand-lg navbar-dark bg-dark"
    >
        <div class="container">
            <a class="navbar-brand"  wire:navigate href="/">Home</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active"  wire:navigate href="/show" aria-current="page"
                            >card placeholder
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" wire:navigate href="/form"> Form</a>
                    </li>
                   
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input
                        class="form-control me-sm-2"
                        type="text"
                        placeholder="Search"
                    />
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Search
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="mx-5 pt-3">

        <div x-data="{count:0}" >
            <span x-text="count"></span>
            <button x-on:click="count++">
                + 
            </button>
        </div>
        curent title: <span x-text="$wire.todo.toUpperCase()"></span>
        <button x-on:click="$wire.todo=''"> clear</button>
        <div>
            <h1>Count: {{ $count }}</h1>
            <button wire:click.lazy="increment(1)">Increment</button>
        </div>
        <form wire:submit="add">
            
            <input type="text"wire:model.live="todo">
            <small><span x-text="$wire.todo.split(' '). length-1" ></span>words</small>
            <span><li>count: {{$todo}}</li></span>
            <button type="button" >submit</button>
        </form>
        @foreach ($todos as $item)
        <li>{{$item}}</li>
        @endforeach
        <div>
            <form  wire:submit="plus">
                
                <input type="text" wire:model.live="num1">
                <input type="text" wire:model.live="num2"> 
                <button type="submit" wire:click="@emit('rescalculate')" >submit</button>
                <p>  {{$num1}} and {{$num2}} = {{$result}}</p>
                <p>{{$message}}</p>
            </form>
        </div>
    </div>

    <livewire:scripts />

 </body>
 </html>
</div>
