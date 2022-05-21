<div class="[ bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto {{ isset($extraClasses) ? $extraClasses : 'md:max-w-4xl' }} ]">
    <div class="[ p-4 text-left h-full ]">
        @include("modal/partials/topbar")
        <div id="modal_content" class="[ flex flex-col h-full ]">
            {!! $content !!}
        </div>
    </div>
</div>