<button 
    class="album-add-button header-button header-button-disabled [ flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 ] open-modal"
    modal-config-data="{{ json_encode([
        'albums' => Auth::user()->albums,
        'user' => Auth::user(),
        'title' => 'Add to album',
        'subtitle' => 'Select an album to add to',
        'extraClasses' => 'w-[40rem] h-[24rem] max-w-sm sm:max-w-xl',
        'buttons' => [
            [
                'text' => 'Cancel',
                'styling' => 'font-regular text-blue-500 hover:text-blue-800 mr-2', 
                'target' => 'modal_close_button'
            ],
            [
                'text' => 'Add',
                'styling' => 'font-bold text-blue-500 hover:text-blue-800', 
                'target' => 'media_add_form_submit'
            ]
        ]
    ]) }}"
    modal-view-target="modal/template/select-album-form"
    modal-button-type="nav">
    @include("icons/add-to-album")
</button>