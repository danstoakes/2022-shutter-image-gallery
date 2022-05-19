<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <div >
                        <h1 class="w-full border-b border-gray-300 text-4xl text-bold">Albums</h1>
                    </div>
                    <div class="grid grid-cols-5 gap-10 p-6">
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                        <x-album-tile caption="Lorem ipsum dolor" count="20" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
