@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Slug</th>
                    <th class="text-center" scope="col">Titolo</th>
                    <th class="text-center" scope="col">Categoria</th>
                    <th class="text-center" scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>

                       @auth
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('admin.posts.show', ['post' => $post]) }}" class="btn btn-primary">Visita</a>
                            <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning">Edita</a>
                            <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                       @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
