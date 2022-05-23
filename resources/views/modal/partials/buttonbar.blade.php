<div class="pt-4 flex justify-end">
    @foreach ($buttons as $button)
        <button class="text-sm {{ $button['styling'] }}" onclick="sendForm({{ $button['target'] }})">
            {{ $button["text"] }}
        </button>
    @endforeach
</div>