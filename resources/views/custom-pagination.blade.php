<div class="flex justify-between items-center space-x-2">
    {{-- Contenido de paginación personalizado --}}
    @if ($paginator->hasPages())
        <div class="flex space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-2 py-2 text-gray-500">« Anterior</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-2 text-gray-900 hover:text-gray-900">« Anterior</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-2 py-2 text-gray-900 hover:text-gray-900">Siguiente »</a>
            @else
                <span class="px-2 py-2 text-gray-500">Siguiente »</span>
            @endif
        </div>
    @endif
</div>