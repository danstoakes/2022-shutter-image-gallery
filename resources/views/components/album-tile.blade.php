<div class="items-center flex flex-col hover:scale-[1.05] hover:opacity-[1] transition ease-in-out delay-50 cursor-pointer opacity-[0.85]">
    @if (isset($modalOption))
        <button>
            <img class="object-cover aspect-square rounded w-full drop-shadow-md" src="https://picsum.photos/200/300" />
            <div class="text-center mt-1.5">
                <h2 class="text-md font-semibold line-clamp-1">{{ $caption }}</h2>
                <h2 class="text-xs text-gray-600 font-regular leading-3">{{ $count }}</h2>
            </div>
        </button>
    @else
        <a href="{{ route('album.show', $id) }}">
            <img class="object-cover aspect-square rounded w-full drop-shadow-md" src="https://picsum.photos/200/300" />
            <div class="text-center mt-1.5">
                <h2 class="text-md font-semibold line-clamp-1">{{ $caption }}</h2>
                <h2 class="text-xs text-gray-600 font-regular leading-3">{{ $count }}</h2>
            </div>
        </a>
    @endif
</div>