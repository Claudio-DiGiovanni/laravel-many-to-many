@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Post con tag: {{$tag->name}}</h1>
    <a href="{{route('admin.tags.edit', ['tag' => $tag])}}" class="btn btn-warning my-4">Edita tag</a>
    <div class="list-group">
        @foreach ($tag->posts as $post)
            <a href="{{route('admin.posts.show', ['post' => $post])}}" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$post->title}}</h5>
                <small>{{$post->created_at}}</small>
                </div>
                <p class="mb-1">{{ $post->category->name }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection
