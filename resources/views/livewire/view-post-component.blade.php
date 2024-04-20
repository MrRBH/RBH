<div>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
    </head>

    <body>
        <div class="d-flex justify-content-end " style="margin-right: 280px" > 
            <h5>Recent Post</h5>
        </div>
        <div class="container  d-flex justify-content-evenly  " style="height: 80%" >
            <div class=" col-8 " >
               
                @if ($post->image)
                <img src="{{ asset('photos/' . $post->image) }}" alt="Post Image" style="width:100%;height:500px">
            @endif
            <div class="d-flex justify-content-between mx-1" >
           <b > Pulish By:<samll> {{$post->user->name}}</samll> </b> 
           <b > Pulish In:<samll> {{$post->created_at->format('d F, Y')}}</samll> </b> 
            </div>
            <div class="d-flex justify-content-between mx-1">
                <h1 class="mx-1">{{ $post->title }}</h1>
                @livewire('like-button', ['post' => $post])
            </div>
                <p class="mx-1">{{ $post->content }}</p>

            </div>
            <div class="">
                {{-- <h1>recent post</h1> --}}
                @if ($blogs->count() > 0)
                    @foreach ($blogs as $blog)
                    <a href="{{ route('view.post', ['postId' => $blog->id]) }}" class="text-decoration-none text-black">
                        <div class="card mt-3" style="width: 100%;  object-fit: fill;">
                            <img src="{{ asset('photos/' . $blog->image) }}" alt="Post Image" style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;">
                            <div class="card-body">
                                <h5 class="card-title">Title: {{ $blog->title }}</h5>
                                <p class="card-text"> Content:{{ implode(' ', array_slice(str_word_count($blog->content, 1), 0, 10)) }}......</p>
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
                </div>
            </div>
            <div style="margin-left: -120px">

                <livewire:comment :postId="$post->id" :userId="$post->user_id"/>
            </div>
        </body>
        
        </html>
 
</div>