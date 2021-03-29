havit.ajax = {
    post: function (url, params, success, error) {
        this.ajax('POST', url, params, success, error);
    },
    get: function (url, params, success, error) {
        this.ajax('GET', url, params, success, error);
    },
    ajax: function (type, url, params, success, error) {
        $.ajax({
            type: type || 'GET',
            url: url,
            data: params || {},
            success: function (data) {
                if (success) {
                    success(data);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'HAVIT 93963874287');
            }
        });
    },
    dialog: function (msg, url, method) {
        var isOK = confirm(msg);
        if (isOK) {
            this.ajax(method, url);
        }
    }
};