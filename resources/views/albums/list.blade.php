@section('title', 'Albums')
<div class="bg-white shadow-sm grow">
    <div class="p-3 bg-white">
        <div class="border-b border-gray-300 pb-2 select-none cursor-default">
            <h1 class="w-full text-4xl font-bold">Albums</h1>
            <h2 class="text-xs text-gray-600 font-regular">{{ $albumCount }} albums</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-10 p-6">
            @foreach ($albums as $album)
                <x-album-tile 
                    caption="{{ $album->name }}" 
                    count="{{ $album->media->count() }}" 
                    id="{{ $album->id }}"
                    thumbnail="{{ $album->media->count() > 0 ? $album->media->first()->getUrl() : 'https://picsum.photos/200/300' }}"
                />
            @endforeach
        </div>
        @if ($albums->hasPages())
            <div class="border-t border-gray-300 px-6 pt-6 pb-2">
                {{ $albums->links() }}
            </div>
        @endif
    </div>
</div>