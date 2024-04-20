<div>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
    </head>

    <body>
        <div>
            <form wire:submit.prevent="createTags">
                <div>
                    <label for="tags">Tags:</label>
                    <input type="text" placeholder="Enter tags separated by commas" wire:model="tags" class="form-control">
                    @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                {{-- <button type="submit" wire:click='createTags' class="btn btn-warning mt-2">Create Tags</button> --}}
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>

    </html>

</div>