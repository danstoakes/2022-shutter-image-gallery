<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Library') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow-sm grow">
        <div class="p-3 bg-white flex flex-col h-full">
            <div class="border-b border-gray-300 pb-2 select-none cursor-default">
                <h1 class="w-full text-4xl font-bold">{{ $title }}</h1>
                @if ($mediaCount !== 1)
                    <h2 class="text-xs text-gray-600 font-regular">{{ $mediaCount }} media items</h2>
                @else
                    <h2 class="text-xs text-gray-600 font-regular">{{ $mediaCount }} media item</h2>
                @endif
            </div>
            @if (count($mediaItems) > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-10 p-6">
                    @foreach ($mediaItems as $media)
                        <x-media-thumb :media="$media" url="{{ $media->getUrl() }}" />
                    @endforeach
                </div>
            @else
                <div class="m-auto">
                    <h2 class="text-2xl font-bold text-gray-600">No Media to be displayed</h2>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>