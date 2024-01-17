@section('title')
Poser | Post info
@endsection

@section('content')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-7 mx-auto">
                <h2>Post infos</h2>
                <div class="card border-secondary">
                    <img class="card-img-top" src="{{ asset('storage/'.$post->image) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text text-right"> created by: {{$post->user->name}}</p>
                        <p class="card-text text-right">{{$post->created_at}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto my-2">
                <h4 class="card-title">All comments:</h4>
                <div class="card border-secondary">
                    @if ($post->comments->count() == 0)
                        <div class="d-flex justify-content-center mt-3">
                            No comments
                        </div>
                    @endif
                    <div class="card-body">
                        @foreach ($post->comments as $comment)
                            <div class="card w-100 my-2">
                                <div class="card-body">
                                    <b>{{$comment->user->name}}</b>: 
                                    {{$comment->description}}
                                    <div class="text-right text-secondary">{{$comment->created_at}}</div>
                                </div>
                                <div class="d-flex justify-content-center mb-2">
                                    @if (auth()->user()->id === $comment->user->id)
                                    <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary text-white btn-sm mx-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <div>
                                        <form method="POST" action="{{route('comment.destroy', $comment->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>                   

            <div class="col-8 mx-auto my-2">
                <div class="card w-100 border-secondary">
                    <div class="card-body">
                        <h4 class="card-title">Add comment</h4>
                        <form method="POST" action="{{route('comment.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                            <div class="form-group">
                              <textarea name="description" placeholder="Add your comment..." class="form-control" cols="50" rows="3"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection

@include('layouts.master')