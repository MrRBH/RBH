<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <livewire:styles />
    </head>
    <body>
        <!-- resources/views/livewire/query-form.blade.php -->

<div>
    <form wire:submit="storeUser">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model.live="name" placeholder="Enter your name...">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model.live="email" placeholder="Enter your email...">
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" wire:model.live="password" placeholder="Enter your password...">
            @error('password') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<livewire:scripts />

    </body>
    </html>
</div>
