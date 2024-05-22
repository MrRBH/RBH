<!doctype html>
<html lang="en">

<head>
    <title>Post Detail</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .post-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .post-meta {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .recent-posts img {
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .post-content {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .post-container {
                flex-direction: column;
            }

            .post-container .post-section {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-4">
            <h5>Recent Posts</h5>
        </div>
        <div class="d-flex justify-content-between post-container">
            <div class="col-8">
                @if ($post->image)
                <img src="{{ asset('photos/' . $post->image) }}" alt="Post Image" class="post-image">
                @endif
                <div class="d-flex justify-content-between post-meta mb-2">
                    <b>Published By: <small>{{ $post->user->name }}</small></b>
                    <b>Published On: <small>{{ $post->created_at->format('d F, Y') }}</small></b>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h1 class="h3">{{ $post->title }}</h1>
                    @livewire('like-button', ['post' => $post])
                </div>
                <p class="post-content">{{ $post->content }}</p>
            </div>
            <div class="recent-posts col-3">
                @if ($blogs->count() > 0)
                @foreach ($blogs as $blog)
                <a href="{{ route('view.post', ['postId' => $blog->id]) }}" class="text-decoration-none text-black">
                    <div class="card mb-3">
                        <img src="{{ asset('photos/' . $blog->image) }}" alt="Post Image" class="card-img-top recent-posts-img">
                        <div class="card-body">
                            <h5 class="card-title">Title: {{ $blog->title }}</h5>
                            <p class="card-text">Content: {{ implode(' ', array_slice(str_word_count($blog->content, 1), 0, 10)) }}......</p>
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
            </div>
        </div>
        <div class="mt-4">
            <livewire:comment :postId="$post->id" :userId="$post->user_id" />
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
