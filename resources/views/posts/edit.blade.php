@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">タイトル</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="">内容</label>
                    <textarea name="body" rows="5" class="form-control">{{ $post->body }}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">更新する</button>
            </form>
        </div>
    </div>
</div>
@endsection
