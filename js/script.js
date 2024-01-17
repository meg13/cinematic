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
 * Asynchronously get the logged in username as a Promise 
 */
async function getLoggedInUsername() {
    const response = await fetch("api/current_user.php");
    return await response.text();
}

// Theme switch
Array.from(document.getElementsByClassName("theme-switch")).forEach(switchButton => {
    switchButton.onclick = () => {
        toggleClass(document.body, "light-theme");
        // TODO save value to session
    }
});