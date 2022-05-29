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
 
 // handles closing the modal when clicked outside of it
 const modalOverlay = document.getElementById("modal_overlay");
 if (modalOverlay !== null)
    modalOverlay.addEventListener("click", toggleModal);
 
 // handles closing the modal (DISABLED because topbar is now not loaded with the document)
 /* const closeModalButton = document.getElementById("modal_close_button");
 if (closeModalButton !== null)
   closeModalButton.addEventListener("click", toggleModal); */
 
 // handles opening the modal
 const openModalButton = document.querySelectorAll(".open-modal");
 for (var i = 0; i < openModalButton.length; i++)
 {
    openModalButton[i].addEventListener("click", function (event) {
        event.preventDefault();
        toggleModal();
    });
 }
 
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
        tab.classList.add("border-transparent", "hover:text-gray-600", "hover:border-gray-300", "dark:hover:text-gray-300");
    }
    }
 
    const tabElement = document.getElementById(tabId);
    if (tabElement !== null)
    tabElement.classList.remove("border-transparent", "hover:text-gray-600", "hover:border-gray-300", "dark:hover:text-gray-300");

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

    $(".open-modal").on("click", function (event) {
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
});