<div class="[ h-full flex flex-col overflow-hidden ]">
    <div class="[ flex justify-between items-center flex-row h-full w-full overflow-hidden ]">
        <div class="[ flex w-full h-full flex-col ]">
            <h2 class="text-sm text-gray-600 font-regular pb-1">{{ $subtitle }}</h2>
            <form class="flex flex-col" method="post" action="{{ route('createAlbum') }}">
                @csrf
                <input class="shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-3 focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Title">
                <input type="submit" class="hidden" id="new_album_form_submit" />
            </form>
        </div>
    </div>
</div>