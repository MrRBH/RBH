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
        {{-- bootstrap icons --}}
        <livewire:styles />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            .second {
                width: 450px;
                background-color: white;
                border-radius: 4px;
                box-shadow: 10px 10px 5px #aaaaaa;
            }

            .text1 {
                font-size: 13px;
                font-weight: 500;
                color: #56575b;
            }

            .text2 {
                font-size: 13px;
                font-weight: 500;
                margin-left: 6px;
                color: #56575b;
            }

            .text3 {
                font-size: 13px;
                font-weight: 500;
                margin-right: 4px;
                color: #828386;
            }
        </style>
    </head>

    <body>
        <div>
            <section>
                <div class="container">
                    <div class="">

                        <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                            {{-- <h1>Comments</h1> --}}
                            <form wire:submit="postComment">
                                {{-- <div class="form-group">
                                    <h4>Leave a comment</h4>
                                    <label for="name">Name:</label>
                                    <input wire:model.live="name" type="text" name="name" id="fullname" class="form-control">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div> --}}

                                <div class="form-group">
                                    <h4>Leave a comment</h4>
                                    <label for="comment">Comment:</label>
                                    <textarea wire:model.live="comment" name="comment" cols="30" rows="5"
                                        class="form-control"></textarea>
                                    @error('comment') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <input type="hidden" name="postId" wire:model.live="postId">
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-primary mt-1">Post Comment</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-5 col-md-6 col-12 pb-4">


                            @foreach ($comments as $comment)
                            <div class="d-flex justify-content-center py-2">
                                <div class="second py-2 px-2">
                                    <span class="text1"></span>
                                    <div class="d-flex justify-content-between py-1 pt-2">
                                        <div>
                                            <img src="https://i.imgur.com/tPvlEdq.jpg" width="18">
                                            <span class="text2">{{ optional($comment->user)->name }}</span>
                                        </div>
                                        @if($editingCommentId === $comment->id)
                                            <textarea wire:model.live="editedComment" cols="3" rows="3" class="form-control"></textarea>
                                            <button wire:click="saveComment({{ $comment->id }})" class="btn  btn-success mx-2 mt-2">Save</button>
                                        @else
                                            <p>{{ $comment->comment }}</p>
                                            <div>
                                                <span class="text3">{{ $comment->created_at->format('d F, Y') }}</span>
                                                <span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span>
                                                <span class="text4"></span>
                                                @if(Auth::user() )
                                                    <i wire:click="deleteComment({{ $comment->id }})" class="bi bi-trash3-fill user-select-auto"></i>
                                                    <i wire:click="editComment({{ $comment->id }})" class="bi bi-pencil-square"></i>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
            $(document).ready(function () {
                $('#commentInput').keypress(function (event) {
                    if (event.keyCode === 13 && !event.shiftKey) {
                        event.preventDefault();
                        $('#commentForm').submit();
                    }
                });
            });
        </script>
        <livewire:scripts />

    </body>

    </html>

</div>