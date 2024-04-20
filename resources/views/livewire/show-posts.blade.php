<div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            nav .w-5 {
                display: none;
            }

            h1 {
                font-family: 'Times New Roman', Times, serif;
            }


            .post-container {
                display: grid;
                grid-template-columns: auto auto;
                grid-template-rows: auto auto;
                column-gap: 50px;
            }

            .post-section {
                grid-column: 2;
            }

            .container {
                margin-top: -4px;
                padding-top: 0;
            }


            @media (max-width: 768px) {
                .post-container {
                    flex-direction: column;
                }

                .post-container .post-section {
                    margin-right: 0;
                    margin-bottom: 20px;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="d-flex justify-content-between mb-4" style="margin-right: 108px">
                <h3>All Posts</h3>
                <h3>Recent Posts</h3>
            </div>
            <div class="post-container">
                <div>
                    <div class="col-md-4 mb-3">
                        <select class="form-control" id="category" wire:model.live="category" required>
                            <option value="">Select category</option>
                            <option value="programming">Programming</option>
                            <option value="Sports">Sports</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="Fabrics">Fabrics</option>
                            <option value="Brands">Brands</option>
                        </select>

                    </div>
                    @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                    <a class="text-decoration-none text-black" href="{{ route('view.post', ['postId' => $post->id]) }}"
                        wire:navigate>
                        <div class="card mb-3" style="width: 60rem;">
                            <img src="{{ asset('photos/' . $post->image) }}" alt="Post Image"
                                style="width: 100%; height: 500px; object-fit: fill; border-radius: 4px">
                            <div class="card-body">
                                <div class="d-flex justify-content-between ">
                                    <h5 class="mx-1"> Title:{{ $post->title }}</h5>
                                    @livewire('like-button', ['post' => $post])
                                </div>
                                <p class="card-text">Content: {{ implode(' ', array_slice(str_word_count($post->content,
                                    1),
                                    0, 20)) }}......</p>
                          
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="card-text">
                                        <long class="text-muted">Posted By: {{ $post->user->name }}</long>
                                    </p>
                                    <p class="card-text">
                                        <long class="text-muted">Created
                                            {{ $post->created_at->diffForHumans() }}</long>
                                    </p>
                                </div>
                                <div>
                                    <p class="card-text">
                                        <long class="text-muted">
                                            @foreach($post->tags as $tag)

                                            <a href="" class="rounded-pill btn btn-primary"> {{$tag->tags }}</a>
                    </a>
                    @endforeach

                    </long>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="card mt-3" style="width: 60rem;">
            <div class="card-body text-center">
                <h3 class="card-title ">Post not found</h3>
            </div>
        </div>
        @endif
</div>
<div class="post-section " style="margin-left:15px;margin-bottom:100px;">
    {{-- Search Bar --}}
    <div class="col-md-12 mb-3 ">
        <form class="" role="search">
            <input class="form-control me-2" wire:model.live.500ms="search" type="search" placeholder="Search..."
                aria-label="Search">
        </form>
    </div>
    {{-- Display recent Posts --}}
    @if ($blogs->count() > 0)
    @foreach ($blogs as $blog)
    <a href="{{ route('view.post', ['postId' => $blog->id]) }}" class="text-decoration-none text-black">
        <div class="card mt-3" style="width: 100%;  object-fit: fill;">
            <img src="{{ asset('photos/' . $blog->image) }}" alt="Post Image"
                style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;">
            <div class="card-body">
                <div class="d-flex justify-content-between ">
                    <h5 class="mx-1"> Title:{{ $post->title }}</h5>
                    {{-- @livewire('like-button', ['post' => $post]) --}}
                </div>
                <p class="card-text"> Content:{{ implode(' ', array_slice(str_word_count($blog->content, 1), 0, 10))
                    }}......</p>
            </div>
        </div>
    </a>

    @endforeach

    



    @else
    <div class="card mt-3" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">No blog posts available.</h5>
        </div>
    </div>
    @endif
    <ul class="list-group mt-3">
        <div class="" style="">
            @php
            $uniqueTags = [];
            @endphp

            @foreach ($poststag->chunk(3) as $chunk)
            <div class="d-flex flex-row">
                @foreach ($chunk as $tag)
                @if (!in_array($tag->tags, $uniqueTags))
                @php
                $uniqueTags[] = $tag->tags;
                @endphp

                <p class="mx-1 text-decoration-underline rounded">
                    <a wire:click="$set('tags', '{{ $tag->tags }}')" style="cursor: pointer;">{{ $tag->tags }}</a>
                </p>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </ul>
</div>

</div>
{{ $posts->links() }}
</div>

@livewireScripts

</body>

</html>
</div>