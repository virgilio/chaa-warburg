var addPais = 
    function(form) {
        jQuery.ajax({
                        url: form.action,
                        type: form.method,
                        data: jQuery(form).serialize(),
                        success: function (msg) {
                            console.log(msg);
                            try {
                                var error = jQuery.parseJSON(msg);
                                console.log(msg);
                                return;
                            } catch (x) {
                                console.log(x);
                            } 

                            
                            jQuery("#select-pais").html(msg);
                            //jQuery("#select-pais .input_chosen").chosen();                            
                            jQuery("#add-pais").modal('hide');
                        }
                    });
        return false;
    };

var addCidade = 
    function(form) {
        jQuery.ajax({
                        url: form.action,
                        type: form.method,
                        data: jQuery(form).serialize(),
                        success: function (msg) {
                            console.log(msg);
                            try {
                                var error = jQuery.parseJSON(msg);
                                console.log(msg);
                                return;
                            } catch (x) {
                                console.log(x);
                            } 

                            
                            jQuery("#select-cidade").html(msg);
                            //jQuery("#select-pais .input_chosen").chosen();                            
                            jQuery("#add-cidade").modal('hide');
                        }
                    });
        return false;
    };