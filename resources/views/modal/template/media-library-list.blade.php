@include("modal/partials/topbar")
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul id="modal_tab_section" class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
        <li class="mr-2">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" type="button" id="modal_tab_1" onclick="toggleModalTab(this.id, 'modal_tab_1_content')">Upload files</button>
        </li>
        <li class="mr-2">
            <button class="inline-block p-4 rounded-t-lg border-b-2" type="button" id="modal_tab_2" onclick="toggleModalTab(this.id, 'modal_tab_2_content')">Media Library</button>
        </li>
    </ul>
</div>
<div id="modal_tab_content_section" class="[ h-full overflow-scroll ]">
    <div class="[ p-4 rounded-lg hidden h-full ]" id="modal_tab_1_content" role="tabpanel">
        <form class="[ h-full ]" method="post" action="{{ route('company.storeImage') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="company" value="{{ $data["company_id"] }}" />

            @if (isset($data["campaign_id"]))
                <input type="hidden" name="campaign" value="{{ $data["campaign_id"] }}" />
            @endif

            @if (isset($data["commentary_id"]))
                <input type="hidden" name="commentary" value="{{ $data["commentary_id"] }}" />
            @endif

            @include("media_library/upload-form")
        </form>
    </div>
    <div class="pb-4 pl-2 pr-2 rounded-lg" id="modal_tab_2_content" role="tabpanel">
        @if(isset($data["images"]) && count($data["images"]) > 0)
            <div class="container grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4 mx-auto">
                @foreach ($data["images"] as $key=>$image)
                    @php
                        $image = \App\Models\Media::find($image);
                    @endphp
                    <div class="w-full rounded flex flex-col items-center justify-center border h-50 min-h-full">
                        {{ $image('thumb-cropped') }}
                        <div class="flex flex-col">
                            @if (isset($data["commentary_id"]))
                                @php
                                    $commentary = \App\Models\Commentary::find($data["commentary_id"]);
                                @endphp
                                @if ($commentary->hasMedia($image->id))
                                    <form method="POST" action="{{ route('commentary.detachImage', [$commentary, $image]) }}">
                                        @csrf
                                        <input class="btn btn-info m-2" type="submit" name="detach" value="Remove" />
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('commentary.attachImage', [$commentary, $image]) }}">
                                        @csrf
                                        <input class="btn btn-primary m-2" type="submit" name="attach" value="Choose" />
                                    </form>
                                @endif
                            @elseif (isset($data["campaign_id"]))
                                @php
                                    $campaign = \App\Models\Campaign::find($data["campaign_id"]);
                                @endphp
                                @if ($campaign->hasMedia($image->id))
                                    <form method="POST" action="{{ route('campaign.detachImage', [$image, $campaign]) }}">
                                        @csrf
                                        <input class="btn btn-info m-2" type="submit" name="detach" value="Remove" />
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('campaign.attachImage', [$image, $campaign]) }}">
                                        @csrf
                                        <input class="btn btn-primary m-2" type="submit" name="attach" value="Add" />
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
{{-- <div class="mt-auto border-t border-gray-200 dark:border-gray-700 sticky absolute">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
        <li class="mr-2">
            <button class="inline-block p-4 rounded-t-lg" type="button">Upload files</button>
        </li>
        <li class="mr-2">
            <button class="inline-block p-4 rounded-t-lg" type="button">Media Library</button>
        </li>
    </ul>
</div> --}}