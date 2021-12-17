@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>タイトル:{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">内容:{{ $post->body }}</p>
                <img src="{{ $post->image_path }}" alt="画像">
                <p>投稿日時:{{ $post->created_at }}</p>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value='削除' class="btn btn-danger" onclick='return confirm("削除しますか??");'>
                </form>
            </div>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label>コメント</label>
                    <textarea name="body" rows="5" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">コメントする</button>
            </form>

        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($post->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者:{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時:{{ $comment->created_at }}</h5>
                    <p class="card-text">内容:{{ $comment->body }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-2">
            <a href="{{ route('posts.index') }}" class="btn btn-primary">戻る</a>
        </div>
    </div>
</div>
@endsection
