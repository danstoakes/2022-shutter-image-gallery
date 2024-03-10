@php
    $isAlbumSingle = Route::currentRouteName() == "album.show" ? true : false;
@endphp

<button 
    class="recycle-button header-button @unless(isset($isAlbumSingle) && $isAlbumSingle) header-button-disabled @endunless flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100"
    @if(isset($isAlbumSingle) && $isAlbumSingle) data-enabled-for-album="true" @endif
>
    @include('icons/recycle-bin')
</button>