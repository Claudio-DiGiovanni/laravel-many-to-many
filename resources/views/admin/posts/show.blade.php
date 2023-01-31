@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        @if (isset($post->category->name))
            <h2>Nella categoria: {{ $post->category->name }}</h2>
        @endif
        @if ($post->tags->all())
            <h2>Tags</h2>
            <ul class="d-flex list-unstyled">
                @foreach ($post->tags as $tag)
                    <li class="p-4"><a class="text-decoration-none" href="{{route('admin.tags.show', ['tag' => $tag])}}">{{ $tag->name }}{{ $loop->last ? '' : ', ' }}</a></li>
                @endforeach
            </ul>
        @endif
        <img class="float-start px-5" src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>
            {{ $post->content }}
        </p>
        @auth
        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning">Edita</a>
        <form class="form-check form-check-inline" action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Elimina</button>
        </form>
        @endauth
    </div>
@endsection
