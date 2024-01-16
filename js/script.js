/**
 * Adds/remove a style class
 * @param {*} element target element
 * @param {*} className class to toggle
 * @param {*} whenOn (optional) action to run when the class is added
 * @param {*} whenOffOff (optional) action to run when the class is removed
 */
function toggleClass(element, className, whenOn, whenOff) {
    if (element.classList.contains(className)) {
        element.classList.remove(className);
        if (whenOff) whenOff();
    } else {
        element.classList.add(className);
        if (whenOn) whenOn();
    }
}

function toggleFollow(followButton, username) {
    toggleClass(followButton, "following",
        () => {
            followButton.innerHTML = "Seguito";
            ajaxGet("api/follow.php?user=" + username);
        },
        () => {
            followButton.innerHTML = "Segui";
            ajaxGet("api/unfollow.php?user=" + username);
        }
    );
}

function toggleWatchlistAdd(watchlistButton, movieID) {
    toggleClass(watchlistButton, "in-watchlist",
        () => ajaxGet("api/watchlist_add.php?movieid=" + movieID),
        () => ajaxGet("api/watchlist_remove.php?movieid=" + movieID)
    );
}

function toggleWatchedAdd(watchedButton, movieID) {
    toggleClass(watchedButton, "watched",
        () => ajaxGet("api/watched_add.php?movieid=" + movieID),
        () => ajaxGet("api/watched_remove.php?movieid=" + movieID)
    );
}

let bioForm;
let bioTextArea;

function startBioEditing(editButton, bio, bioParagraph) {
    editButton.innerHTML = 'Salva'
    bioParagraph.style.display = 'none'

    bioForm = document.createElement('form');
    bioForm.action = "api/update_bio.php"
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
}

function endBioEditing(editButton, bioParagraph) {
    editButton.innerHTML = 'Modifica'
    bioParagraph.style.display = ''
    bioParagraph.innerText = bioTextArea.value;
    ajaxSubmit(bioForm);
    bioForm.remove();
}

/**
 * Toggles the edit mode for a user's bio.
 * @param {*} editButton profile's edit button
 */
function toggleBioEdit(editButton) {
    const bio = document.getElementsByClassName('bio')[0];
    const bioParagraph = bio.getElementsByTagName('p')[0];

    toggleClass(editButton, 'editing',
        () => startBioEditing(editButton, bio, bioParagraph),
        () => endBioEditing(editButton, bioParagraph)
    );
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

/**
 * Moves the cursor to the end of the input
 * @param {*} input target input
 */
function moveCursorToEnd(input) {
    setTimeout(
        () => input.setSelectionRange(input.value.length, input.value.length),
        1
    );
}