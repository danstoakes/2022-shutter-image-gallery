<div class="[ bg-white mx-auto rounded shadow-lg z-50 overflow-y-auto max-h-[32rem] {{ isset($extraClasses) ? $extraClasses : 'md:max-w-4xl' }} ]">
    <div class="[ p-4 text-left h-full flex flex-col ]">
        @include("modal/components/topbar")
        <div id="modal_content" class="[ flex flex-col h-full pt-4 px-6 overflow-scroll ]">
            {!! $content !!}
        </div>
        @include("modal/components/buttonbar")
    </div>
</div>