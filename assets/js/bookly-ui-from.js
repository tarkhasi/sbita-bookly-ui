function getForm() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let json = JSON.parse(this.responseText);
        let sbu_form_main_element = document.getElementById("bookly-ui-form");
        let txt = json['data']['html'];

        sbu_form_main_element.innerHTML = txt.trim();
    }
    xhttp.open("GET", "/wp-json/bookly-ui/v1/form");
    xhttp.send();
}

function _checkDashboardAction() {
    var url_string = window.location.href
    var url = new URL(url_string);
    var action = url.searchParams.get("action");
    if (action === 'manage_licenses') {
        var tab = document.querySelector("#myTab > li:nth-child(2) > a");
        tab.click();
    }
}

window.addEventListener('load', (event) => {
    setTimeout(() => {
        _checkDashboardAction();
    }, 100)
});

function sbu_form_main() {
    try {
        let sbu_form_main_element = document.getElementById("bookly-ui-form");

        sbu_form_main_element.innerHTML = '...';
        getForm();
    } catch (e) {
        console.error(e);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    sbu_form_main();
});