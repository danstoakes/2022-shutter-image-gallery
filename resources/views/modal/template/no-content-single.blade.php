@include("modal/partials/topbar", [
    "data" => [
        "title" => "Error",
        "border" => true
    ]
])
<div class="[ flex justify-between flex-row h-full w-full mt-2 ]">
    <p>{{ $errorMessage }}</p>
</div>