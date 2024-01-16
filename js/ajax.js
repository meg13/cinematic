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
 * @param {*} url (optional) target url that overrides the form action
 */
function ajaxSubmit(form, url) {
    fetch(url ? url : form.action, {
        method: form.method,
        body: new URLSearchParams(new FormData(form))
    });
}

/**
 * Lets this form submit data without refreshing the page.
 * @param {*} form form element
 * @param {*} action (optional) action to run after submitting the form
 */
function enableAjaxFormSubmit(form, action) {
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        ajaxSubmit(form);
        if (action) action();
    });
}