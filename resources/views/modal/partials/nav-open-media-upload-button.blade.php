<a class="[ block font-semibold py-2 cursor-pointer ] open-modal" modal-config-data="{{ json_encode([
    'company_id' => $company->id,
    'images' => isset($images) ? $images->pluck('id')->toArray() : $company->getMedia('images')->pluck('id')->toArray(),
    'title' => 'Upload Media',
    'border' => false
]) }}" modal-view-target="modal/template/media-library-upload">{{ $text }}</a>