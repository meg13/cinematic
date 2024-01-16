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

let writePost = document.getElementsByClassName("write-a-post")[0];

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
        };
        star.onmouseenter = () => setFilledStarsAmount(star, i + 1);
        star.onmouseleave = () => setFilledStarsAmount(star, newPostRating);
    }
}

handleStars();

const writePostForm = writePost.getElementsByTagName("form")[0];
writePostForm.addEventListener("submit", (event) => {
    event.preventDefault();
    ajaxSubmit(writePostForm, writePostForm.action + "&rating=" + newPostRating);
    location.reload();
});