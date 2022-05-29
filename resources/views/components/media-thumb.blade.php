<div class="items-center flex flex-col hover:scale-[1.05] hover:opacity-[1] transition ease-in-out delay-50 cursor-pointer opacity-[0.85]">
    <a class="my-auto open-modal" modal-config-data="{{ json_encode([
        "media" => $url,
        "media_id" => $media->id,
        "uploaded" => $media->created_at->diffForHumans(),
        "file_name" => $media->file_name,
        "name" => $media->name,
        "caption" => $media->caption,
        "file_type" => $media->mime_type,
        "file_size" => $media->getHumanReadableSize($media->size),
        "dimensions" => $media->getDimensionsString(),
        "title" => "Attachment Details",
        "subtitle" => "Attachment Details",
        'extraClasses' => 'w-[66vw] h-[90vh] max-w-sm sm:max-w-7xl max-h-[48rem]',
        'buttons' => [
            [
                'text' => 'Delete',
                'styling' => 'font-regular text-red-500 hover:text-red-800 mr-2',
                'target' => 'media_item_delete'
            ],
            [
                'text' => 'Update',
                'styling' => 'font-bold text-blue-500 hover:text-blue-800', 
                'target' => 'new_album_form_submit'
            ]
        ]
    ]) }}" modal-view-target="modal/template/media-item-single">
        <img class="object-cover w-full drop-shadow-md" src="{{ $url }}" />
    </a>
</div>