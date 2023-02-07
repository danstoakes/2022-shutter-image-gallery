<a class="[ flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group cursor-pointer ] open-modal" modal-config-data="{{ json_encode([
    'user' => Auth::user(),
    'title' => 'New Album',
    'subtitle' => 'Enter a name for the album',
    'buttons' => [
        [
            'text' => 'Create',
            'styling' => 'font-bold text-blue-500 hover:text-blue-800',
            'target' => 'new_album_form_submit'
        ]
    ],
    'extraClasses' => 'w-96 max-w-sm'
]) }}" modal-view-target="modal/template/new-album-form" modal-button-type="nav">
    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg>
    <span class="ml-3 sm:block hidden">New Album</span>
</a>