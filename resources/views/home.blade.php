<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h1 class="text-lg font-semibold mb-2">{{ $article->title }}</h1>
                        <div>@cost($article->price)</div>
                        <p>{{ $article->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
