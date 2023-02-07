{{--
    Image button which opens a modal for the image when clicked.
--}}

<button class="open-modal" modal-config-data="{{ json_encode([
    "media" => $media->original_url,
    "image_id" => $media->id,
    "company_id" => $company->id,
    "company_name" => $company->name,
    "uploaded" => $media->created_at->diffForHumans(),
    "uploaded_by" => $media->getMetadata("user_id"),
    "file_name" => $media->file_name,
    "name" => $media->name,
    "caption" => $media->getMetadata("caption"),
    "is_coverage_piece" => $media->getMetadata("is_coverage_piece"),
    "file_type" => $media->mime_type,
    "file_size" => $media->getHumanReadableSize($media->size),
    "dimensions" => $media->getDimensionsString(),
    "title" => "Attachment Details",
    "border" => true
]) }}" modal-view-target="modal/template/media-item-single" modal-button-type="thumb">
    {{ $media('thumb-cropped') }}
</button>