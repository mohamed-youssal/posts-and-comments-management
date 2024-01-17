@section('title')
Poser | create new post
@endsection

@section('content')
    <div class="container">
        {{-- {{Auth::user()->name}} --}}
        <div class="row my-4">
            <div class="col-lg-6 mx-auto">
                <form method="POST" action="{{route('post.store')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="invisible" name="user_id" value="{{Auth::user()->id}}">
                        @error('user_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label>title</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label>description</label>
                      <textarea class="form-control" name="description" cols="70" rows="4"></textarea>
                      @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>image</label><br>
                        <input type="file" class="file-form-control" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-25">Add</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
@endsection

@include('layouts.master')