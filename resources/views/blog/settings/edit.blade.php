@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog Settings</div>

                <div class="card-body">
                   
                    <form action="/blog/{{ $blog->slug }}/edit" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $blog->name }}">

                            @if ($errors->has('name'))
                                <div class="help-block">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="slug">slug</label>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text @error('slug') is-invalid @enderror" id="basic-addon3"> {{config('app.url') . 'blog/'}} </span>
                                </div>
                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ? old('slug') : $blog->slug }}">
                            </div>

                            @if ($errors->has('slug'))
                                <div class="help-block">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif

                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            <label for="description">description</label>
                            
                            <textarea name="description" id="description" class="form-control">{{ old('description') ? old('description') : $blog->description }}</textarea>

                            @if ($errors->has('description'))
                                <div class="help-block">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="blog_image">blog image:</label>
                            <br>
                            <input type="file" name="blog_image" id="blog_image">

                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>

                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection
