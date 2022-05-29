<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favourites') }}
        </h2>
    </x-slot>

    @if (count($mediaItems) > 0)
        <div class="bg-white shadow-sm grow">
            <div class="p-3 bg-white">
                <div class="border-b border-gray-300 pb-2 select-none cursor-default">
                    <h1 class="w-full text-4xl font-bold">Favourites</h1>
                    <h2 class="text-xs text-gray-600 font-regular">{{ $mediaCount }} media items</h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-10 p-6">
                    @foreach ($mediaItems as $media)
                        <x-media-thumb :media="$media" url="{{ $media->getUrl() }}" />
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="flex m-auto">
            <h2 class="text-2xl font-bold text-gray-600">No Favourites to be displayed</h2>
        </div>
    @endif
</x-app-layout>