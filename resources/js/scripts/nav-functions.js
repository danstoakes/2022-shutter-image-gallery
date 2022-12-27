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
    });

    $(".album-export").on("click", function (event) {
        const selectedItems = document.querySelectorAll(".item-selected");

        var ids = [];
        selectedItems.forEach(item => {
            var itemDataString = $(item).attr("modal-config-data");
            ids.push(JSON.parse(itemDataString).media_id);
        });

        ids = JSON.stringify(ids);

        $.ajax({
            type: "POST",
            url: "/media/export/",
            data: {ids: ids},
            success: function (data) {
                // $('#modal_main').html(data);
                // item.parentElement.remove();
                console.log(data);

                const link = document.createElement('a');
                link.setAttribute('href', data);
                link.setAttribute('download', 'yourfilename.zip'); // Need to modify filename ...
                console.log(link);
                link.click();
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + " - " + xhr.responseText
                console.log("ERROR: " + errorMessage);
            }
        });
    });
});