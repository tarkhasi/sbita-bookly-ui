
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