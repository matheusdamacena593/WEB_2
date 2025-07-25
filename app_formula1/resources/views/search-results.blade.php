<x-app-layout title="Resultados da Busca">
    @if($noticias->isNotEmpty())
        <h2>Resultados da busca para "{{ request('query') }}"</h2>
        @foreach($noticias as $noticia)
            <div>
                <h3>{{ $noticia->titulo }}</h3>
                <p>{{ $noticia->descricao }}</p>
            </div>
        @endforeach
    @else
        <h2>Nenhum resultado encontrado para "{{ request('query') }}"</h2>
    @endif
</x-app-layout>