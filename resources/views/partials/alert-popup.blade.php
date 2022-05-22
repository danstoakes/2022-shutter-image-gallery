@if (\Session::has('success'))
    <div class="flex items-top justify-center sm:items-center sm:pt-0 mt-6 full-width">
        <div class="w-full max-w-12xl mx-auto sm:px-6 lg:px-8 container success-pop-up" role="alert">
            <div class="font-bold rounded-t px-4 py-2 success-pop-up-header">
                <p>Success</p>
            </div>
            <div class="border border-t-0 rounded-b px-4 py-3 success-pop-up-body">
                <p>{{ \Session::get("success") }}</p>
            </div>
        </div>
    </div>
@elseif ($errors != null && count($errors) > 0)
    <div class="flex items-top justify-center sm:items-center sm:pt-0 mt-10 full-width">
        <div class="w-full max-w-12xl mx-auto sm:px-6 lg:px-8 container" role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                <p>Error</p>
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif