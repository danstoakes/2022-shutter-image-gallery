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

    $(".recycle-button").on("click", function (event) {
        if (event.currentTarget.hasAttribute("data-enabled-for-album")) {
            let albumContainer = document.querySelector("#AlbumSingle");
            let id = albumContainer.getAttribute("data-album-id");

            $.ajax({
                type: "DELETE",
                url: "/album/delete",
                data: { id: id },
                success: function (data) {
                    window.location.href = "/album";
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + " - " + xhr.responseText
                    console.log("ERROR: " + errorMessage);
                }
            });
        } else {
            const selectedItems = document.querySelectorAll(".item-selected");
            selectedItems.forEach(item => {
                var itemDataString = $(item).attr("modal-config-data");
                var itemData = JSON.parse(itemDataString);
    
                $.ajax({
                    type: "POST",
                    url: "/media/recycle/",
                    data: {id: itemData.media_id},
                    success: function (data) {
                        // $('#modal_main').html(data);
                        item.parentElement.remove();
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = xhr.status + " - " + xhr.responseText
                        console.log("ERROR: " + errorMessage);
                    }
                });
            });
        }
    });

    $(".album-add-button").on("click", function (event) {
        event.preventDefault();

        const selectedItems = document.querySelectorAll(".item-selected");

        if (selectedItems && selectedItems.length > 0)
        {
            var mediaIds = [];
            selectedItems.forEach(item => {
                var itemDataString = $(item).attr("modal-config-data");
                var itemData = JSON.parse(itemDataString);

                mediaIds.push(itemData["media_id"]);
            });

            var modalConfigData = JSON.parse($(this).attr("modal-config-data"));
            modalConfigData["mediaIds"] = JSON.stringify(mediaIds);

            $.ajax({
                type: "POST",
                url: "/modal/loadModal",
                data: {configData: JSON.stringify(modalConfigData), view: $(this).attr("modal-view-target")},
                success: function (data) {
                    $('#modal_main').html(data);
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + " - " + xhr.responseText
                    console.log("ERROR: " + errorMessage);
                }
            });
        }
    });
});