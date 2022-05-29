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