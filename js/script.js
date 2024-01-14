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
function toggleBioEdit(editButton) {
    const bio = document.getElementsByClassName('bio')[0];
    const bioParagraph = bio.getElementsByTagName('p')[0];

    toggleClass(editButton, 'editing', 'Salva', 'Modifica');

    if (editButton.classList.contains('editing')) {
        // Start editing
        bioParagraph.style.display = 'none'

        form = document.createElement('form');
        const label = document.createElement('label');
        label.for = 'bio';
        label.innerText = 'Bio';
        bioTextArea = document.createElement('textarea');
        bioTextArea.id = 'bio';
        bioTextArea.name = 'bio';
        bioTextArea.rows = '4';
        bioTextArea.placeholder = 'Qualcosa su di te...';
        bioTextArea.value = bioParagraph.innerText.trim();

        form.appendChild(label);
        form.appendChild(bioTextArea);
        bio.insertBefore(form, bioParagraph);
        bioTextArea.focus();
    } else {
        // End editing
        bioParagraph.style.display = ''
        bioParagraph.innerText = bioTextArea.value;
        form.submit();
        form.remove()
    }
}