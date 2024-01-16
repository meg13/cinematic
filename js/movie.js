const movieID = document.getElementsByTagName("header")[0].id;

// Watchlist yes/no

function toggleWatchlistAdd(watchlistButton) {
    toggleClass(watchlistButton, "in-watchlist",
        () => ajaxGet("api/watchlist_add.php?movieid=" + movieID),
        () => ajaxGet("api/watchlist_remove.php?movieid=" + movieID)
    );
}

for (watchlistButton of document.getElementsByClassName("watchlist-add")) {
    watchlistButton.onclick = () => toggleWatchlistAdd(watchlistButton);
}

// Watches yes/no

function toggleWatchedAdd(watchedButton) {
    toggleClass(watchedButton, "watched",
        () => ajaxGet("api/watched_add.php?movieid=" + movieID),
        () => ajaxGet("api/watched_remove.php?movieid=" + movieID)
    );
}

for (watchedButton of document.getElementsByClassName("unwatched")) {
    watchedButton.getElementsByTagName("a")[0].onclick = () => toggleWatchedAdd(watchedButton);
}

// Write post

let newPostRating = 0;

const writePost = document.getElementsByClassName("write-a-post")[0];
const writePostForm = writePost.getElementsByTagName("form")[0];
const writePostTextArea = writePost.getElementsByTagName("textarea")[0];
const submitPostButton = writePostForm.querySelector("input[type=submit]");

/**
 * Disables the submit button if the form is incomplete.
 */
function validateNewPostForm() {
    if (newPostRating <= 0 || writePostTextArea.value.length == 0) {
        submitPostButton.setAttribute("disabled", "true")
    } else {
        submitPostButton.removeAttribute("disabled");
    }
}

function setFilledStarsAmount(star, amount) {
    star.parentElement.className = "stars stars-" + amount;
}

/**
 * Handles actions on the stars of the 'new post' box:
 * clicking sets the new rating, hovering temporarily previews it.
 */
function handleStars() {
    const stars = writePost.getElementsByTagName("svg");

    for (let i = 0; i < stars.length; i++) {
        let star = stars[i];
        star.onclick = () => {
            newPostRating = i + 1;
            setFilledStarsAmount(star, newPostRating);
            validateNewPostForm();
        };
        star.onmouseenter = () => setFilledStarsAmount(star, i + 1);
        star.onmouseleave = () => setFilledStarsAmount(star, newPostRating);
    }
}

writePostTextArea.oninput = validateNewPostForm;

validateNewPostForm();

handleStars();

writePostForm.addEventListener("submit", (event) => {
    event.preventDefault();
    ajaxSubmit(writePostForm, writePostForm.action + "&rating=" + newPostRating);
    location.reload();
});