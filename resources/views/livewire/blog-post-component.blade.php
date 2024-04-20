<div>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Blog Post</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
            @livewireStyles
        <script>
            setTimeout(function () {
                    var adminAlert = document.getElementById('alert');
                    var userAlert = document.getElementById('alert');
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
        <div class="col-md-8 m-auto" id="alert">
            @if(($role=='admin'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>You are login as a admin </strong>
                <button onclick="close()" id="alert" type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
            @elseif($role=='user')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>You are login as a user </strong>
                <button id="alert" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


        </div>
        <div class="col-md-8 m-auto">
            @if(!$postId)
            <div>
                <form wire:submit.prevent="createPost">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input wire:model="title" id="title" class="form-control" type="text" placeholder="Title...">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea wire:model="content" id="content" class="form-control"
                            placeholder="Content..."></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Image</label>
                        <input class="form-control" wire:model='image' type="file" id="formFile">
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" style="height: 100px; width: auto;">
                        @endif
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
              
                
                    <div class="form-group">
                        <label for="active">Do Your Wanna Your Blog Publish or not:</label>
                        <select class="form-control" id="active" wire:model="active" required>
                          
                            <option value="">Select</option>
                            <option value="true">Publish</option>
                            <option value="false">Do not Publish</option>
                        </select>
                        @error('active') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                   
                   
                    <div class="form-group">
                        <label for="category">Select Your Blog Category:</label>
                        <select class="form-control" id="category" wire:model="category" required>
                            <option value="other">other</option>
                            <option value="programming">programming</option>
                            <option value="Sports">Sports</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option> 
                            <option value="Fabrics">Fabrics</option>
                            <option value="Brands">Brands</option>
                        </select>
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div>

                    </div>
                    {{-- @livewire('livewire.tagfield') --}}

                       {{-- <div>
                        <label for="tags">Tags:</label>
                        <input type="text" placeholder="Enter tags separated by commas" wire:model="tags" class="form-control">
                        @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>     --}}
                    
                    
                    <livewire:tagfield >
                    <button type="submit"  class="btn btn-info mt-2">Create Post</button>
                </form>

            </div>

                    
            @elseif ($postId)
            <div class="mt-4">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input wire:model="title" id="title" class="form-control" type="text" placeholder="Title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea wire:model="content" id="content" class="form-control"
                            placeholder="Content"></textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Image</label>
                        <input class="form-control" wire:model='image' type="file" id="formFile">
                        @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" style="height: 100px; width: auto;">
                        @endif
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <button type="submit" class="btn btn-info">Update Post</button>
                </form>
            </div>
            @endif
            <div class="mt-4">
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
                            <th>Updated at</th> <!-- Include updated_at column -->
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
                                    style="height: 30px; width: 30px; border-radius: 50%;">
                            </td>
                            @endif
                            <td>
                                <a href="{{ route('view.post', ['postId' => $post->id]) }}" wire:navigate
                                    class="text-decoration-none text-black">{{ $post->title }}</a>
                            </td>
                            <td>
                                {{$post->active}}
                            </td>
                            @if ($role === 'admin')
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                            @endif
                            <td>
                                <a href="{{ route('view.post', ['postId' => $post->id]) }}" wire:navigate
                                    class="btn btn-success">View</a>
                                <button class="btn btn-primary" wire:click.prevent="edit({{ $post->id }})">Edit</button>
                                <button class="btn btn-danger" wire:click.prevent="delete({{ $post->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @livewireScripts
    </body>

    </html>
</div>