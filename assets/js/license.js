class BooklyUiLicense {

    static activation(key) {
        try {
            this.killTasks();
            this.timer = setTimeout(() => {

                this.input = document.getElementById(key);
                this.product_input = document.getElementById('product_id_' + key);
                this.element_id = 'licence_result_' + key;
                this.key = key;

                this.product_id = this.product_input.value;
                this.license = this.input.value;

                this._check();
            }, 300);

        } catch (e) {
            console.error(e);
        }
    }

    static _check() {
        try {
            if (!this.product_id || !this.license) throw 'Product id and licence required!';
            let url = `/wp-admin/admin-ajax.php?action=sbu_active_license&key=${this.key}&item_id=${this.product_id}&license=${this.license}`;
            this._show('...');
            this._request(url)
        } catch (e) {
            console.error(e);
            this._show('');
        }
    }

    static _request(url) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = () => this._result(xhttp.responseText);
        xhttp.open("GET", url);
        xhttp.send();
    }

    static _result(response) {
        let data = JSON.parse(response);
        if (!data['success']) return this._show('Invalid!');
        this._show('Activated!', true);
    }

    static _show(message, success = false) {
        let element = document.getElementById(this.element_id);
        if (message === '...' && window.SBITA_LOADING_URL) {
            element.innerHTML = '<img src="' + window.SBITA_LOADING_URL + '" width="20px"/>'
            return;
        }
        element.style.color = success ? 'green' : '';
        element.innerHTML = message;
    }

    static killTasks() {
        try {
            if (!this.timer) return;
            clearTimeout(this.timer);
            this.timer = null;
        } catch (e) {

        }
    }
}