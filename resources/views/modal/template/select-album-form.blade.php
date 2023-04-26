<div class="[ h-full flex flex-col overflow-hidden ]">
    <div class="[ flex justify-between items-center flex-row h-full w-full overflow-hidden ]">
        <div class="[ flex w-full h-full flex-col ]">
            <h2 class="text-sm text-gray-600 font-regular pb-1">{{ $subtitle }}</h2>
            <form class="flex flex-col" method="POST" action="{{ route('addToAlbum') }}">
                @csrf
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-10 mt-4">
                    @foreach ($albums as $album)
                        <x-album-tile caption="{{ $album['name'] }}" count="20" id="{{ $album['id'] }}" modal-option />
                    @endforeach
                </div>
                @if (isset($mediaIds))
                    <input type="hidden" name="media_ids" value="{{ $mediaIds }}" />
                @endif
                <input type="submit" class="hidden" id="media_add_form_submit" />
            </form>
        </div>
    </div>
</div>