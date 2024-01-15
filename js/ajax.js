/**
 * Performs a get without refreshing the page.
 * @param {*} url target url
 */
function ajaxGet(url) {
    fetch(url, {
        method: 'get'
    });
}

/**
 * Submits a form without refreshing the page.
 * @param {*} form form element
 */
function ajaxSubmit(form) {
    fetch(form.action, {
        method: form.method,
        body: new URLSearchParams(new FormData(form))
    });
}

/**
 * Lets this form submit data without refreshing the page.
 * @param {*} form form element
 */
function enableAjaxFormSubmit(form) {
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        ajaxSubmit(form);
    });
}