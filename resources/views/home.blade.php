@section('title')
Poster | home
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-8 mx-auto bg-white rounded">
                <a class="btn btn-primary m-4" href="{{route('post.create')}}">create new post</a>
                <div class="text-center h3">all posts</div>
                @foreach ($posts as $post)
                    <div class="card my-3 mx-auto border-secondary rounded w-75">
                        <div class="card-header">
                            <div class="text w-50 text-left m-2"> <a class="text-primary" href=""> 
                                {{$post->user->name}} </a>has posted a new publication <br>
                                {{$post->created_at}}
                            </div>
                        </div>
                        <img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{$post->title}}</h4>
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a href="{{route('post.show', $post->id)}}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-chat-left-text"></i> ({{$post->comments->count()}})
                                </a>
                                @if (auth()->user()->id === $post->user->id)
                                <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary text-white btn-sm mx-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <div>
                                    <form method="POST" action="{{route('post.destroy', $post->id)}}">
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
                    </div>
                @endforeach
            </div>
                <div class="col-lg-6 mx-auto">
                    <div class="d-flex justify-content-center my-3">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        
    </div>
@endsection

@include('layouts.master')