function toggleClass(element, className, contentOn, contentOff) {
    if (element.classList.contains(className)) {
        element.classList.remove(className);
        if (contentOff) element.innerHTML = contentOff;
    } else {
        element.classList.add(className);
        if (contentOn) element.innerHTML = contentOn;
    }
}