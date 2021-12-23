<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (optional(optional($cart)->articles)->count())
                    @foreach ($cart->articles as $article)
                        <div class="mb-4 pb-4 border-b">
                            <div class="font-semibold">{{ $article->title }}</div>
                        </div>
                    @endforeach
                @else
                    <p>Cart is empty</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
