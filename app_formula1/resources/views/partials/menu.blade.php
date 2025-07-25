<nav class="bg-white border border-gray-200 rounded-lg shadow-md w-full max-w-xs p-6">
    <ul class="space-y-4">
        <li>
            <a href="{{ route('pilotos.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold text-gray-700 hover:text-white transition
                       bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700">
                <!-- Ícone simples de piloto (volante) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.75 17L15 12l-5.25-5" />
                </svg>
                Pilotos
            </a>
        </li>
        <li>
            <a href="{{ route('equipes.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold text-gray-700 hover:text-white transition
                       bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700">
                <!-- Ícone simples de equipe (grupo de pessoas) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M15 11a4 4 0 11-6 0 4 4 0 016 0z" />
                </svg>
                Equipes
            </a>
        </li>
        <li>
            <a href="{{ route('noticias.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold text-gray-700 hover:text-white transition
                       bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700">
                <!-- Ícone simples de notícias (jornal) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h5l2 3h7a2 2 0 012 2v9a2 2 0 01-2 2z" />
                </svg>
                Notícias
            </a>
        </li>
    </ul>
</nav>