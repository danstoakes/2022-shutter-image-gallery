<div class="[ flex justify-between items-center flex-row h-full w-full overflow-hidden ]">
    <div class="[ flex w-full h-full md:flex-row flex-col ]">
        <div class="modal-media-image-section relative">
            @if (isset($media) && $media !== null)
                <img class="[ object-center overflow-hidden w-full basis-auto md:basis-8/12 md:absolute h-full md:pr-4 relative object-contain ]" src="{!! $media !!}" />
            @endif
        </div>
        <div class="[ text-left md:px-4 {{ isset($media) && $media !== null ? 'basis-auto md:basis-4/12 ' : '' }} text-gray-500 ] modal-media-meta-section">
            <div class="[ border-b pb-2 mb-2 w-full ]">
                <p><span class="font-semibold">Uploaded</span> {{ $uploaded }}</p>
                <p><span class="font-semibold">File name:</span> {{ $file_name }}</p>
                <p><span class="font-semibold">File type:</span> {{ $file_type }}</p>
                <p><span class="font-semibold">File size:</span> {{ $file_size }}</p>
                <p><span class="font-semibold">Dimensions:</span> {{ $dimensions }}</p>
            </div>
            <div class="[ w-full ]">
                <form method="POST" action="{{ route('updateMedia') }}">
                    @csrf
                    <input type="hidden" name="image" value="{{ $media_id }}" />

                    <label for="name">{{ __("Name") }}<span class="text-red-500">*</span></label>
                    <input name="name" value="{{ $name }}" type="text" class="[ text-sm appearance-none rounded w-full mb-5 py-2 px-3 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline h-10 ]" required />

                    <label for="caption">{{ __("Caption") }}</label>
                    <textarea name="caption" class="[ form-textarea w-full text-sm appearance-none rounded w-full mb-2 py-2 px-3 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline h-20 ]" style="resize: none;">{{ $caption }}</textarea>

                    <input type="submit" class="hidden" id="new_album_form_submit" />
                </form>
            </div>        
            <form method="POST" action="{{ route('deleteMedia', $media_id) }}" class="hidden">
                @csrf
                @method("DELETE")
                <input type="submit" name="Delete" value="Delete" id="media_item_delete" />
            </form>
        </div>
    </div>
</div>