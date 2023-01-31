@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        @foreach ($tags as $tag)
            <a class="list-group-item d-flex list-group-item-action justify-content-around align-items-center fs-2" href="{{route('admin.tags.show', ['tag' => $tag])}}" class="text-decoration-none"  aria-current="true">
            {{$tag->name}}
            <div class="badge bg-primary rounded-pill">{{count($tag->posts)}}</div>
            </a>
        @endforeach
    </div>
</div>
@endsection
