@section('title')
Poser | edit comment
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto mt-4">
                <div class="card w-100 my-2">
                    <div class="card-body">
                        <h4 class="card-title">Edit comment</h4>
                        <form method="POST" action="{{route('comment.update', $comment->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                            <div class="form-group">
                              <textarea name="description" placeholder="Add your comment..." class="form-control" cols="50" rows="3">{{$comment->description}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')