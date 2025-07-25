<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Notícias</h1>
        <a href="{{ route('noticias.create') }}" class="btn btn-primary">Cadastrar Notícia</a>
        <a href="{{ route('noticias.index') }}" class="btn btn-primary">Ver Notícias</a>
        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
        @endif

        <h1>Pilotos</h1>
        <a href="{{ route('pilotos.create') }}" class="btn btn-primary">Cadastrar Piloto</a>
        <a href="{{ route('pilotos.index') }}" class="btn btn-primary">Ver Pilotos</a>

        <h1>Equipes</h1>
        <a href="{{ route('equipes.create') }}" class="btn btn-primary">Cadastrar Equipe</a>
        <a href="{{ route('equipes.index') }}" class="btn btn-primary">Ver Equipes</a>

    </div>
</x-app-layout>
