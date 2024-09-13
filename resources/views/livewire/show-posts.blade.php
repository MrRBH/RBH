<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <livewire:styles />
    <style>
        body {
            background-color: #f8f9fa;
        }

        nav .w-5 {
            display: none;
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
        }

        .post-container {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 30px;
        }

        .post-section {
            grid-column: 2;
        }

        .container {
            margin-top: 20px;
        }

        .card img {
            border-radius: 4px;
        }

        .category-select {
            max-width: 300px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .post-container {
                grid-template-columns: 1fr;
            }

            .post-section {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h3>All Posts</h3>
            <h3>Recent Posts</h3>
        </div>
        <div class="post-container">
            <div>
                <div class="mb-3 category-select">
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
                    <div class="card mb-3" style="width: 100%;">
                        <img src="{{ asset('photos/' . $post->image) }}" alt="Post Image" class="card-img-top">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Title: {{ $post->title }}</h5>
                                @livewire('like-button', ['post' => $post])
                            </div>
                            <p class="card-text">Content:
                                {{ implode(' ', array_slice(str_word_count($post->content, 1), 0, 20)) }}......</p>
                            <div class="d-flex justify-content-between mt-4">
                                <p class="card-text text-muted">Posted By: {{ $post->user->name }}</p>
                                <p class="card-text text-muted">Created {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                <p class="card-text">
                                    @foreach($post->tags as $tag)
                                    <a href="#" class="badge bg-primary">{{ $tag->tags }}</a>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h3 class="card-title">Post not found</h3>
                    </div>
                </div>
                @endif
            </div>
            <div class="post-section">
                <div class="col-md-12 mb-3">
                    <form role="search">
                        <input class="form-control me-2" wire:model.live.500ms="search" type="search"
                            placeholder="Search..." aria-label="Search">
                    </form>
                </div>
                @if ($blogs->count() > 0)
                @foreach ($blogs as $blog)
                <a href="{{ route('view.post', ['postId' => $blog->id]) }}" class="text-decoration-none text-black">
                    <div class="card mt-3">
                        <img src="{{ asset('photos/' . $blog->image) }}" alt="Post Image" class="card-img-top"
                            style="height: 200px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Title: {{ $blog->title }}</h5>
                            </div>
                            <p class="card-text">Content:
                                {{ implode(' ', array_slice(str_word_count($blog->content, 1), 0, 10)) }}......</p>
                        </div>
                    </div>
                </a>
                @endforeach
                @else
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">No blog posts available.</h5>
                    </div>
                </div>
                @endif
                <ul class="list-group mt-3">
                    <div>
                        @php
                        $uniqueTags = [];
                        @endphp
                        @foreach ($poststag->chunk(3) as $chunk)
                        <div class="d-flex flex-wrap">
                            @foreach ($chunk as $tag)
                            @if (!in_array($tag->tags, $uniqueTags))
                            @php
                            $uniqueTags[] = $tag->tags;
                            @endphp
                            <p class="mx-1">
                                <a wire:click="$set('tags', '{{ $tag->tags }}')"
                                    style="cursor: pointer;">{{ $tag->tags }}</a>
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

    <livewire:scripts />


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HoA4VEhOfJ5B6N2u1MC/2Kw6KY7Bo24/zCAAmwRn+sXK4kwGECSlGkftTLPFF4on" crossorigin="anonymous">
    </script> --}}
</body>

</html>