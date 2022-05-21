<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/script.js') }}" defer></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    }
                });
        
                $(".open-modal").on("click", function(e) {
                    e.preventDefault();
        
                    $.ajax({
                        type: "POST",
                        url: "{{ route('modal.loadModal') }}",
                        data: {configData: $(this).attr("modal-config-data"), view: $(this).attr("modal-view-target")},
                        success: function (data) {
                            $('#modal_content').html(data);
                        },
                        error: function (xhr, status, error) {
                            var errorMessage = xhr.status + " - " + xhr.responseText
                            console.log("ERROR: " + errorMessage);
                        }
                    });
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>
                @include("partials.modal")
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
