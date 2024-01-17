const username = document.getElementsByTagName("h1")[0].innerText;

// Follow/unfollow

function toggleFollow(followButton) {
    toggleClass(followButton, "following",
        () => {
            followButton.innerHTML = "Seguito";
            document.getElementById("follower-count").innerText++;
            ajaxGet("api/follow.php?user=" + username);
        },
        () => {
            followButton.innerHTML = "Segui";
            document.getElementById("follower-count").innerText--;
            ajaxGet("api/unfollow.php?user=" + username);
        }
    );
}

Array.from(document.getElementsByClassName("follow")).forEach(followButton => {
    followButton.onclick = () => toggleFollow(followButton);
});

// Edit bio

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

Array.from(document.getElementsByClassName("edit")).forEach(editButton => {
    editButton.onclick = () => toggleBioEdit(editButton);
});

// Log-out

Array.from(document.getElementsByClassName("logout")).forEach(logoutButton => {
    logoutButton.onclick = () => {
        ajaxGet("api/logout.php");
        location.reload();
    }
});