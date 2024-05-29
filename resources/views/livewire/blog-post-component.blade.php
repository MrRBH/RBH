<!doctype html>
<html lang="en">

<head>
    <title>Blog Post</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        @livewireStyles
    <style>
        body {
            background-color: #f8f9fa;
        }

        .alert-dismissible {
            margin-top: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .submit-button {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .table-container {
            margin-top: 40px;
        }

        .table img {
            border-radius: 50%;
        }

        .btn-primary {
            margin-right: 5px;
        }
    </style>
    <script>
        setTimeout(function() {
            var adminAlert = document.getElementById('adminAlert');
            var userAlert = document.getElementById('userAlert');
            if (adminAlert) {
                adminAlert.classList.add('d-none');
            }
            if (userAlert) {
                userAlert.classList.add('d-none');
            }
        }, 1000);
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-8 m-auto">
            @if(($role=='admin'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="adminAlert">
                <strong>You are logged in as an admin</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif($role=='user')
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="userAlert">
                <strong>You are logged in as a user</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="col-md-8 m-auto form-container">
            @if(!$postId)
            <form wire:submit.prevent="createPost">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input wire:model="title" id="title" class="form-control" type="text" placeholder="Title..." required>
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea wire:model="content" id="content" class="form-control" rows="5"
                        placeholder="Content..." required></textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Image</label>
                    <input class="form-control" wire:model="image" type="file" id="formFile" required>
                    @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" style="height: 100px; width: auto; margin-top: 10px;">
                    @endif
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="active" class="form-label">Publish:</label>
                    <select class="form-control" id="active" wire:model="active" required>
                        <option value="">Select</option>
                        <option value="true">Publish</option>
                        <option value="false">Do not Publish</option>
                    </select>
                    @error('active') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-control" id="category" wire:model="category" required>
                        <option value="other">Other</option>
                        <option value="programming">Programming</option>
                        <option value="Sports">Sports</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="Fabrics">Fabrics</option>
                        <option value="Brands">Brands</option>
                    </select>
                    @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <livewire:tagfield />
                <div class="d-grid">
                    <button type="submit" class="btn btn-success col-md-2 mt-2 submit-button">Create Post</button>
                </div>
            </form>
            @elseif ($postId)
            <div class="mt-4">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input wire:model="title" id="title" class="form-control" type="text" placeholder="Title" required>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea wire:model="content" id="content" class="form-control" rows="5"
                            placeholder="Content" required></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn submit-button">Update Post</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
        <div class="col-md-8 m-auto table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        @if ($role === 'admin')
                        <th>Image</th>
                        @endif
                        <th>Title</th>
                        <th>Publish</th>
                        @if ($role === 'admin')
                        <th>Created by</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        @endif
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        @if ($role === 'admin')
                        <td>
                            <img src="{{ asset('storage/photos/' . $post->image) }}" alt="Post Image"
                                style="height: 30px; width: 30px;">
                        </td>
                        @endif
                        <td>
                            <a href="{{ route('view.post', ['postId' => $post->id]) }}" wire:navigate
                                class="text-decoration-none text-black">{{ $post->title }}</a>
                        </td>
                        <td>{{ $post->active }}</td>
                        @if ($role === 'admin')
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        @endif
                        <td>
                            <a href="{{ route('view.post', ['postId' => $post->id]) }}" wire:navigate
                                class="btn btn-success btn-sm">View</a>
                            <button class="btn btn-primary btn-sm" wire:click.prevent="edit({{ $post->id }})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click.prevent="delete({{ $post->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>
