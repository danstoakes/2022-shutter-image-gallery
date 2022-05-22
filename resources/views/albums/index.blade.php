@section('title', 'Albums')
<x-app-layout>
    {{-- <x-slot name="header">
        <div class="flex flex-col lg:flex-row justify-between h-full items-center">
            <h2 class="font-semibold text-xl text-white leading-tight whitespace-nowrap overflow-hidden overflow-ellipsis w-full lg:w-1/2 mb-5 lg:mb-0">
                Companies
            </h2>
            <a class="btn btn-primary" href="{{ route('company.create') }}">
        </div>
    </x-slot> --}}
    
    @if (count($albums) > 0)
        @include('albums.list')
    @else
        <div class="flex m-auto">
            <h2 class="text-2xl font-bold text-gray-600">No Albums to be displayed</h2>
        </div>
    @endif
</x-app-layout>