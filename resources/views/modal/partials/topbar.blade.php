<div id="modal_topbar">
    <div class="[ z-50 flex justify-between items-center {{ isset($data["border"]) && $data["border"] ? 'border-b' : '' }} ] modal-topbar">
        @if (isset($data["title"]) && $data["title"])
            <h2 class="text-xl">{{ $data["title"] }}</h2>
        @endif
        <svg id="modal_close_button" class="[ fill-current text-black cursor-pointer ]" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" onclick="toggleModal()">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
    </div>
</div>