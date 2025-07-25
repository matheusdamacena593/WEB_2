<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notícias') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        {{-- Pesquisa principal --}}
        <div class="text-center mb-5">
            <h4 class="text-danger">Pesquisa</h4>
            <form action="{{ route('search') }}" method="GET" class="d-flex justify-content-center mt-3">
                <div class="input-group w-75">
                    <input type="text" name="query" class="form-control form-control-lg" placeholder="Pesquisar..." aria-label="Pesquisar">
                    <button type="submit" class="btn btn-danger btn-lg ms-2">
                        <i class="bi bi-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>

        {{-- Filtros --}}
        <div class="text-center mb-4">
            <h4 class="text-danger">Filtros</h4>
        </div>
        <form method="GET" action="{{ route('noticias.index') }}" class="row g-3 justify-content-center mb-5">
            <div class="col-md-4">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ request('title') }}" placeholder="Digite o título">
            </div>

            <div class="col-md-4">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" name="description" id="description" class="form-control form-control-lg" value="{{ request('description') }}" placeholder="Digite a descrição">
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-danger btn-lg w-100">Filtrar</button>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <a href="{{ route('noticias.index') }}" class="btn btn-secondary btn-lg w-100">Limpar</a>
            </div>
        </form>

        {{-- Tabela de Notícias --}}
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Lista de Notícias</h3>
            <a href="{{ route('noticias.create') }}" class="btn btn-danger">Criar Notícia</a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif

        @if($noticias->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>URL</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->id }}</td>
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->descricao }}</td>
                    <td><a href="{{ $noticia->url }}" target="_blank">{{ $noticia->url }}</a></td>
                    <td>
                        <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" class="d-flex gap-1">
                            <a class="btn btn-info" href="{{ route('noticias.show', $noticia->id) }}">Ver</a>
                            <a class="btn btn-warning" href="{{ route('noticias.edit', $noticia->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $noticias->links() }}
        </div>
        @else
        <p class="text-center">Nenhuma notícia encontrada.</p>
        @endif
    </div>
</x-app-layout>