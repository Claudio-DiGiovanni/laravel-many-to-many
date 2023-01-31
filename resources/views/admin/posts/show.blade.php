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
        <button id="delete" class="btn btn-danger" onclick="showPopup()">Elimina</button>
        <div class="background">
            <div class="popup">
                <h5 class="w-100 text-center mb-3">Sei sicuro di voler eliminarlo?</h5>
                <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Elimina</button>
                </form>
                <button class="btn btn-secondary" id="retry" onclick="hidePopup()">Annulla</button>
            </div>
        </div>
        @endauth
    </div>
@endsection
