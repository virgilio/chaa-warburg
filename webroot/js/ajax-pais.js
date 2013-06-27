var addPais = 
    function(form) {
        jQuery.ajax({
                        url: form.action,
                        type: form.method,
                        data: jQuery(form).serialize,
                        success: function (msg) {
                            console.log(msg);
                        }
                    });
        return false;
    };