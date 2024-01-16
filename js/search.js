const searchField = document.getElementById("search-field");

/**
 * Moves the cursor to the end of the input
 * @param {*} input target input
 */
function moveCursorToEnd() {
    setTimeout(
        () => searchField.setSelectionRange(searchField.value.length, searchField.value.length),
        5
    );
}

searchField.onfocus = () => moveCursorToEnd();