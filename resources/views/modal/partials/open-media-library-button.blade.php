<button class="open-modal [ btn btn-info ]" modal-config-data="{{ json_encode(array_merge([
    'company_id' => $company->id,
    'images' => isset($images) ? $images->pluck('id')->toArray() : $company->getMedia('images')->pluck('id')->toArray(),
    'title' => 'Manage Media',
    'border' => false
], $additionalData)) }}" modal-view-target="{{ isset($additionalData['uploadOnly']) && $additionalData['uploadOnly'] ? 'modal/template/media-library-upload' : 'modal/template/media-library-list' }}">{{ $buttonText }}</button>