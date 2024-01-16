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