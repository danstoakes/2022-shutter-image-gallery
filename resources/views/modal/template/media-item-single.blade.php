@include("modal/partials/topbar")
<div class="[ flex justify-between items-center flex-row h-full w-full overflow-hidden ]">
    <div class="[ flex w-full h-full md:flex-row flex-col ]">
        <div class="modal-media-image-section relative">
            @if (isset($data["media"]) && $data["media"] !== null)
                <img class="[ object-center overflow-hidden w-full basis-auto md:basis-8/12 md:absolute h-full md:p-4 pt-2 md:pb-0 relative object-contain ]" src="{!! $data["media"] !!}" />
            @endif
        </div>
        <div class="[ text-left md:p-4 pt-2 {{ isset($data["media"]) && $data["media"] !== null ? 'basis-auto md:basis-4/12 ' : '' }} text-gray-500 ] modal-media-meta-section">
            <div class="[ border-b pb-2 mb-2 w-full ]">
                <p><span class="font-semibold">Attached to:</span> {{ $data["company_name"] }}</p>
                <p><span class="font-semibold">Uploaded</span> {{ $data["uploaded"] }}</p>
                <p><span class="font-semibold">Uploaded by:</span> {{ \App\Models\User::find($data["uploaded_by"])->name ?? "Unknown" }}</p>
                <p><span class="font-semibold">File name:</span> {{ $data["file_name"] }}</p>
                <p><span class="font-semibold">File type:</span> {{ $data["file_type"] }}</p>
                <p><span class="font-semibold">File size:</span> {{ $data["file_size"] }}</p>
                <p><span class="font-semibold">Dimensions:</span> {{ $data["dimensions"] }}</p>
            </div>
            <div class="[ border-b pb-2 mb-2 w-full ]">
                <form method="POST" action="{{ route("company.updateMetadata", $data["image_id"]) }}">
                    @csrf
                    <label for="name">{{ __("Name") }}</label>
                    <input name="name" value="{{ $data["name"] }}" type="text" class="[ text-sm appearance-none rounded w-full mb-5 py-2 px-3 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline h-10 ]" />

                    <label for="caption">{{ __("Caption") }}</label>
                    <textarea name="caption" class="[ form-textarea w-full text-sm appearance-none rounded w-full mb-2 py-2 px-3 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline h-20 ]" style="resize: none;">{{ $data["caption"] }}</textarea>

                    <div class="flex items-center mb-1">
                        <input {{ $data["is_coverage_piece"] ? "checked" : "" }} type="checkbox" name="coverage" />
                        <label class="block pl-2">Is a piece of coverage</label>
                    </div>

                   {{-- <p class="[ mt-4 ]">Required fields are marked <span class="[ text-red-600 ]">*</span></p> --}}

                    <button id="group-form-submit" class="btn btn-primary mt-3 mb-2" type="submit">Update</button>
                </form>
            </div>
            <div class="[ w-full flex ]">
                <a class="[ btn-link ]" href="{{ $data["media"] }}" target="_blank">View fullscreen</a>
                <span class="px-2">|</span>
                <form method="POST" action="{{ route('company.deleteImage', [$data["company_id"], $data["image_id"], -1]) }}">
                    @csrf
                    @method('DELETE')
                    <input class="[ text-red-600 cursor-pointer ]" type="submit" name="Delete" value="Delete permanently" />
                </form>
            </div>
        </div>
    </div>
</div>