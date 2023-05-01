/**
 * Reponsible for handling the client-side operations of the modal, i.e.
 * showing, hiding, keypresses, etc. It works in tandem with the AJAX request
 * and \App\Models\ModalController.php.
 */

 function toggleModal ()
 {
    // hides the modal if toggled off
    const modal = document.getElementById("modal");
    if (modal !== null) {
        modal.classList.toggle("opacity-0");
        modal.classList.toggle("pointer-events-none");
    }

    // lock the display in place to prevent scrolling
    const body = document.querySelector("body");
    if (body !== null) 
    {
        if (body.classList.contains("modal-active"))
        {
            if (modal !== null)
            {
                // remove the modal elements once the modal has transitioned from view
                modal.addEventListener("transitionend", function () {
                    // only hide if the modal is being closed/has been closed
                    if (modal.classList.contains("opacity-0")) {
                        const content = document.getElementById("modal_content");
                        if (content) {
                            content.innerHTML = null;
                            content.classList.remove("overflow-scroll");
                        }
                    }
                });
            }
        }

        body.classList.toggle("modal-active");
    }
 }
 
 document.onkeydown = function (event) 
 {
    event = event || window.event;

    // determine if the escape key was pressed or not
    var escapePressed = event.keyCode === 27;
    if ("key" in event)
        escapePressed = event.key === "Escape" || event.key === "Esc";

    // hides the modal if escape was pressed
    const body = document.querySelector("body");
    if (escapePressed && body.classList.contains("modal-active"))
        toggleModal();
 };
 
 function toggleModalTab (tabId, contentSectionId)
 {
   const tabElement = document.getElementById(tabId);
   if (tabElement !== null) 
   {
    const tabSection = document.getElementById("modal_tab_section");
    if (tabSection !== null)
    {
    const tabChildren = tabSection.children;

    for (var i = 0; i < tabChildren.length; i++)
    {
        // get the button from the <li> element
        let tab = tabChildren[i].children[0];
        tab.classList.add("border-transparent", "hover:text-gray-600", "hover:border-gray-300");
    }
    }
 
    const tabElement = document.getElementById(tabId);
    if (tabElement !== null)
    tabElement.classList.remove("border-transparent", "hover:text-gray-600", "hover:border-gray-300");

    const contentSection = document.getElementById("modal_tab_content_section");
    if (contentSection !== null) 
    {
    const contentChildren = contentSection.children;

    for (var i = 0; i < contentChildren.length; i++) 
    {
        let contentSection = contentChildren[i];
        contentSection.classList.add("hidden");
    }
    }
   
    const tabContentElement = document.getElementById(contentSectionId);
    if (tabContentElement !== null)
    tabContentElement.classList.remove("hidden");
    }
}

$(document).ready(function() {
    $.ajaxSetup ({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });

    $(".open-modal").on("dblclick", function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "/modal/loadModal",
            data: {configData: $(this).attr("modal-config-data"), view: $(this).attr("modal-view-target")},
            success: function (data) {
                $('#modal_main').html(data);
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + " - " + xhr.responseText
                console.log("ERROR: " + errorMessage);
            }
        });
    });

    $(".open-modal").on("click", function (event) {
        var clickedItem = event.currentTarget;

        if (clickedItem)
        {
            if (clickedItem.getAttribute("modal-button-type") == "thumb")
            {
                if (clickedItem.getAttribute("modal-selected-data") == "true")
                {
                    clickedItem.setAttribute("modal-selected-data", false);
                    clickedItem.classList.remove("item-selected");
                } else
                {
                    clickedItem.setAttribute("modal-selected-data", true);
                    clickedItem.classList.add("item-selected");
                }

                var selectedItems = document.querySelectorAll(".item-selected");
                var headerButtons = document.querySelectorAll(".header-button");
                headerButtons.forEach(button => {
                    if (selectedItems && typeof selectedItems !== "undefined" && selectedItems.length > 0)
                        button.classList.remove("header-button-disabled");
                    else
                        button.classList.add("header-button-disabled");
                });
            } else
            {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/modal/loadModal",
                    data: {configData: $(this).attr("modal-config-data"), view: $(this).attr("modal-view-target")},
                    success: function (data) {
                        $('#modal_main').html(data);
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = xhr.status + " - " + xhr.responseText
                        console.log("ERROR: " + errorMessage);
                    }
                });

                toggleModal();
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
     // handles closing the modal when clicked outside of it
    const modalOverlay = document.getElementById("modal_overlay");
    if (modalOverlay !== null)
        modalOverlay.addEventListener("click", toggleModal);
    
    // handles opening the modal
    const openModalButton = document.querySelectorAll(".open-modal");
    for (var i = 0; i < openModalButton.length; i++)
    {
        openModalButton[i].addEventListener("dblclick", function (event) {
            event.preventDefault();
            toggleModal();
        });
    }
});
// https://stackoverflow.com/a/38350925
function readableBytes(bytes) {
    var sizes = ['B', 'KB', 'MB', 'GB'];
    for (var i = 0; i < sizes.length; i++) {
        if (bytes <= 1024) {
            return bytes + ' ' + sizes[i];
        } else {
            bytes = parseFloat(bytes / 1024).toFixed(2)
        }
    }
    return bytes + ' P';
}

function previewImages (input) {
    let files = input.files;

    let modalContent = document.getElementById("modal_content");

    if (modalContent)
        modalContent.classList.add("overflow-scroll");

    // let inputButtons = document.getElementById('media_selection_buttons');
    let inputContainer = document.getElementById('media_upload_input_section');
    let contentContainer = document.getElementById('media_upload_output_section');

    var dimensions = [];
    for (var i = 0; i < files.length; i++) {
        var file = files[i];

        var image = document.createElement('img');
        image.className = 'object-cover aspect-square rounded w-20 drop-shadow-md';
        image.file = file;

        var reader = new FileReader();
        reader.onload = (function(image) {
            return function(event) {
                image.src = event.target.result;

                image.onload = function () {
                    dimensions.push(image.naturalWidth + ' by ' + image.naturalHeight + ' pixels');

                    if (i == files.length) {
                        let dimensionRows = document.getElementsByClassName('media-library-preview-dimensions');
                        for (var j = 0; j < dimensionRows.length; j++)
                            dimensionRows[j].innerHTML = dimensions[j];
                    }
                }
            };
        })(image);
        reader.readAsDataURL(file);

        var containerDiv = document.createElement("div");
        containerDiv.className = "flex";

        if (i > 0)
            containerDiv.className = "flex pt-4";

        var informationContainerDiv = document.createElement("div");
        informationContainerDiv.className = "flex flex-col upload-media-content-row";

        var informationNode1 = document.createElement("p");
        informationNode1.className = "font-semibold";
        informationNode1.innerText = image.file.name;

        var informationNode2 = document.createElement("p");
        informationNode2.className = "media-library-preview-dimensions";
        informationNode2.innerText = "0 by 0 pixels";

        var informationNode3 = document.createElement("p");
        informationNode3.innerText = readableBytes(image.file.size);

        informationContainerDiv.appendChild(informationNode1);
        informationContainerDiv.appendChild(informationNode2);
        informationContainerDiv.appendChild(informationNode3);

        containerDiv.appendChild(image);
        containerDiv.appendChild(informationContainerDiv);

        contentContainer.appendChild(containerDiv);
        contentContainer.classList.remove("hidden");
    }

    // inputButtons.style.display = 'flex';
    inputContainer.classList.add("hidden");
}

function resetImageModal () {
    let inputButtons = document.getElementById('media_selection_buttons');
    let inputContainer = document.getElementById('media_selection_container');
    let contentContainer = document.getElementById('media_selected_container');
    let container = document.getElementById('media_table_container');

    inputButtons.style.display = 'none';
    inputContainer.style.display = 'flex';
    container.style.display = 'none';
    contentContainer.innerHTML = '';
}

function sendForm (button)
{
    if (button) {
        console.log("clicked");
        button.click();
    }
}
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

    $(".album-add-button").on("click", function (event) {
        /* const selectedItems = document.querySelectorAll(".item-selected");
        selectedItems.forEach(item => {
            var itemDataString = $(item).attr("modal-config-data");
            var itemData = JSON.parse(itemDataString);

            $.ajax({
                type: "POST",
                url: "/album/add/",
                data: {id: itemData.media_id},
                success: function (data) {
                    $('#modal_main').html(data);
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + " - " + xhr.responseText
                    console.log("ERROR: " + errorMessage);
                }
            });
        }); */

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