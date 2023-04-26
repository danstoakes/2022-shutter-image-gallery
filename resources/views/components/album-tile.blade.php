<div class="relative items-center flex flex-col hover:scale-[1.05] hover:opacity-[1] transition ease-in-out delay-50 cursor-pointer opacity-[0.85]">
    @if (!isset($modalOption))
        <a href="{{ route('album.show', $id) }}">
    @else
        <input class="z-10 opacity-0 absolute w-full h-full cursor-pointer" type="radio" name="album" value="{{ $id }}" />
    @endif

    <img class="object-cover aspect-square rounded w-full drop-shadow-md" src="{{ $thumbnail }}" />
    <div class="text-center mt-1.5">
        <h2 class="text-md font-semibold line-clamp-1">{{ $caption }}</h2>
        <h2 class="text-xs text-gray-600 font-regular leading-3">{{ $count }}</h2>
    </div>

    @if (!isset($modalOption))
        </a>
    @endif
</div>