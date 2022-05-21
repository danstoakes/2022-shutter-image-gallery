@include("modal/partials/topbar")
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul id="modal_tab_section" class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
        <li class="mr-2">
            <button class="inline-block p-4 rounded-t-lg border-b-2" type="button" id="modal_tab_1" onclick="toggleModalTab(this.id, 'modal_tab_1_content')">Upload files</button>
        </li>
    </ul>
</div>
<div id="modal_tab_content_section" class="[ h-full overflow-scroll ]">
    <div class="[ p-4 rounded-lg h-full ]" id="modal_tab_1_content" role="tabpanel">
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