<div class="[ h-full flex flex-col overflow-hidden ]">
    <div class="[ flex justify-between items-center flex-row h-full w-full overflow-hidden ]">
        <div class="[ flex w-full h-full flex-col ]">
            <h2 class="text-sm text-gray-600 font-regular pb-1">{{ $subtitle }}</h2>
            <form class="flex flex-col" method="POST" action="{{ route('addToAlbum') }}">
                @csrf
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-10 mt-4">
                    @foreach ($albums as $album)
                        @php $albumObject = \App\Models\Album::find($album['id']); @endphp
                        <x-album-tile 
                            caption="{{ $album['name'] }}" 
                            count="{{ $albumObject->media->count() }}" 
                            id="{{ $album['id'] }}" 
                            thumbnail="{{ $albumObject->media->count() > 0 ? $albumObject->media->first()->getUrl() : 'https://picsum.photos/200/300' }}"
                            modal-option 
                        />
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

<script>
    document.querySelectorAll(".album-form-tile").forEach(albumRadio => {
        albumRadio.addEventListener("change", () => {
            let selectedAlbums = document.querySelectorAll("img.item-selected");
            selectedAlbums.forEach(function(img) {
                img.classList.remove("item-selected");
            });

            if (albumRadio.checked) {
                let img = albumRadio.parentElement.querySelector("img");
                if (img)
                    img.classList.add("item-selected");
            }
        });
    });
</script>