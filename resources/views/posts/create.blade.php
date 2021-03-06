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
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力してください" name="title">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea name="body" rows="5" class="form-control" placeholder="内容"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">画像</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button class="btn btn-primary" type="submit">作成する</button>
            </form>
        </div>
        <div class="col-md-2">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">戻る</a>
        </div>
    </div>
</div>
@endsection
