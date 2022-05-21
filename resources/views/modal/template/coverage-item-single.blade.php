@include("modal/partials/topbar")
<div class="[ h-full flex flex-col overflow-hidden ]">
    <div class="[ flex justify-between items-center flex-row h-full w-full overflow-hidden ]">
        <div class="[ flex w-full h-full md:flex-row flex-col ]">
            <div class="modal-media-image-section relative">
                @if (isset($data["media"]) && $data["media"] !== null)
                    <img class="[ object-center overflow-hidden w-full basis-auto md:basis-8/12 md:absolute h-full md:p-4 pt-2 md:pb-0 relative object-contain ]" src="{!! $data["media"] !!}" />
                @endif
            </div>
            <div class="[ text-left md:p-4 pt-2 {{ isset($data["media"]) && $data["media"] !== null ? 'basis-auto md:basis-4/12 ' : '' }} ] modal-media-meta-section">
                <div>
                    <h2 class="text-xl mb-2">{{ $data["title"] }}</h2>
                </div>
                <div>
                    <p>{{ $data["subtitle"] }}</p>
                </div>
                <div class="[ mt-4 mb-4 @if (!(isset($data["media"]) && $data["media"] !== null)) lg:w-1/2 @endif w-full ]">
                    <a class="[ italic btn-link ]" href="{{ $data["link"] }}" target="_blank">{{ $data["link"] }}</a>
                </div>
                @include("report.coverage-book-stats", [
                    "views" => 0,
                    "visits" => 0,
                    "engagements" => 0
                ])
            </div>
        </div>
    </div>
</div>