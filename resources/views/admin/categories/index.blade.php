@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success_delete'))
            <div class="alert alert-warning" role="alert">
                La categoria {{ session('success_delete')->name }} e' stata eliminata correttamente
            </div>
        @endif

        <h1>Categorie</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Slug</th>
                    <th class="text-center" scope="col">Nome</th>
                    <th class="text-center" scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->name }}</td>

                        <td class="d-flex justify-content-around">
                            <a href="{{ route('admin.categories.show', ['category' => $category]) }}" class="btn btn-primary mx-5">Visita</a>
                            <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="btn btn-warning mx-5">Edita</a>
                            <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-delete-me">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
@endsection
