/**
 * Adds/remove a style class
 * @param {*} element target element
 * @param {*} className class to toggle
 * @param {*} contentOn (optional) HTML content to set when the class is added
 * @param {*} contentOff (optional) HTML content to set when the class is removed
 */
function toggleClass(element, className, contentOn, contentOff) {
    if (element.classList.contains(className)) {
        element.classList.remove(className);
        if (contentOff) element.innerHTML = contentOff;
    } else {
        element.classList.add(className);
        if (contentOn) element.innerHTML = contentOn;
    }
}

let bioForm;
let bioTextArea;

/**
 * Toggles the edit mode for a user's bio.
 * @param {*} editButton profile's edit button
 */
function toggleBioEdit(editButton) {
    const bio = document.getElementsByClassName('bio')[0];
    const bioParagraph = bio.getElementsByTagName('p')[0];

    toggleClass(editButton, 'editing', 'Salva', 'Modifica');

    if (editButton.classList.contains('editing')) {
        // Start editing
        bioParagraph.style.display = 'none'

        bioForm = document.createElement('form');
        bioForm.action = "#" // TODO action
        bioForm.method = "post"

        const label = document.createElement('label');
        label.for = 'bio';
        label.innerText = 'Bio';

        bioTextArea = document.createElement('textarea');
        bioTextArea.id = 'bio';
        bioTextArea.name = 'bio';
        bioTextArea.rows = '4';
        bioTextArea.placeholder = 'Qualcosa su di te...';
        bioTextArea.value = bioParagraph.innerText.trim();

        bioForm.appendChild(label);
        bioForm.appendChild(bioTextArea);
        bio.insertBefore(bioForm, bioParagraph);
        bioTextArea.focus();
    } else {
        // End editing
        bioParagraph.style.display = ''
        bioParagraph.innerText = bioTextArea.value;
        ajaxSubmit(bioForm);
        bioForm.remove();
    }
}

/**
 * Adapts the text area height to its content.
 * @param {*} textArea target text area
 */
function textAreaStretchToContent(textArea) {
    textArea.style.height = "";
    textArea.style.height = textArea.scrollHeight + "px";
    textArea.style.overflow = "hidden";
}