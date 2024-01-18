const likeButtons = document.getElementsByClassName("unliked");

// Like yes/no

function toggleLikeAdd(likeButton, post_id) {
    toggleClass(likeButton, "liked",
        () => {
            likeButton.getElementsByTagName("span")[0].innerText++;
            ajaxGet("api/like.php?post_id=" + post_id);
        },
        () => {
            ajaxGet("api/unlike.php?post_id=" + post_id);
            likeButton.getElementsByTagName("span")[0].innerText--;
        }
    );
}

Array.from(likeButtons).forEach(likeButton => {
    likeButton.onclick = () => {
        const postID = likeButton.closest('.post').id;
        toggleLikeAdd(likeButton, postID);
    }
});

// Comments show/hide

function toggleCommentShow(commentSection) {
    toggleClass(commentSection, "show-comments",
        () => commentSection.style.display = "",
        () => commentSection.style.display = "none",
    );
}

Array.from(document.getElementsByClassName("comment-button")).forEach(commentButton => {
    commentButton.onclick = () => {
        const commentSection = commentButton.closest('.post').getElementsByClassName("comment-section")[0];
        toggleCommentShow(commentSection);
    }
});

// Post comment

/**
 * Disables the submit button if the form is incomplete.
 */
function validateNewCommentForm(textArea, submitButton) {
    if (textArea.value.length == 0) {
        submitButton.setAttribute("disabled", "true")
    } else {
        submitButton.removeAttribute("disabled");
    }
}

Array.from(document.getElementsByClassName("comment-section")).forEach(commentSection => {
    const commentForm = commentSection.getElementsByTagName("form")[0];
    const textArea = commentForm.getElementsByTagName("textarea")[0];
    const submitButton = commentForm.querySelector("input[type=submit]");

    validateNewCommentForm(textArea, submitButton);
    textArea.oninput = () => validateNewCommentForm(textArea, submitButton);

    // Run on form submit
    enableAjaxFormSubmit(commentForm, () => {
        const newComment = document.createElement("div");
        const author = document.createElement("p");
        const text = document.createElement("p");
        text.innerText = textArea.value;
        textArea.value = "";
        validateNewCommentForm(textArea, submitButton);

        getLoggedInUsername().then(username => {
            author.innerText = username;
            newComment.append(author, text);
            commentSection.insertBefore(newComment, commentForm);
            commentSection.closest(".post").querySelector(".comment-button span").innerText++;
            newComment.className = "new-comment"; // for animation
        });
    });
});

// Expand selected post from fragment (e.g. profile.php#25 => 25th post)

let selectedPostID = window.location.hash;
if (selectedPostID) {
    selectedPostID = selectedPostID.substring(1); // Removes the initial #
    const post = document.getElementById(selectedPostID);
    toggleCommentShow(post.getElementsByClassName("comment-section")[0]);
}