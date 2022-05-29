@section('title', 'Albums')
<x-app-layout>    
    @if (count($albums) > 0)
        @include('albums.list')
    @else
        <div class="flex m-auto">
            <h2 class="text-2xl font-bold text-gray-600">No Albums to be displayed</h2>
        </div>
    @endif
</x-app-layout>