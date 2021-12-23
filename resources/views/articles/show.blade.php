<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-lg font-semibold mb-2">{{ $article->title }}</h1>
                    <!--<div>@money($article->price)</div>-->
                    <p>{{ $article->description }}</p>
                    <form action="{{ route('cart.articles.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <x-button class="mt-3">
                            Add to cart
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
