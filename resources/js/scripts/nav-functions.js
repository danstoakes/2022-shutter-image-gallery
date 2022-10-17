$(document).ready(function() {
    $.ajaxSetup ({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });
    
    $(".favourite-button").on("click", function (event) {
        const selectedItems = document.querySelectorAll(".item-selected");
        selectedItems.forEach(item => {
            var itemDataString = $(item).attr("modal-config-data");
            var itemData = JSON.parse(itemDataString);

            $.ajax({
                type: "POST",
                url: "/media/favourite/",
                data: {id: itemData.media_id},
                success: function (data) {
                    // $('#modal_main').html(data);
                    item.classList.toggle("item-favourited");
                    item.classList.toggle("item-selected");
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + " - " + xhr.responseText
                    console.log("ERROR: " + errorMessage);
                }
            });
        });
    });
});