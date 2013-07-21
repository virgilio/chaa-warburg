var addArtista = 
    function(form) {
        try {
            var addForm = jQuery("form#ArtistaAddForm")[0];
            var oFormData = new FormData(addForm);

            jQuery.ajax({
                            url: form.action,
                            data: oFormData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST',
                            success: function (msg) {
                                try {
                                    var error = jQuery.parseJSON(msg);
                                    console.log(msg);
                                    return;
                                } catch (x) {
                                    console.log(x.message);
                                } 

                                jQuery("#select-artista").html(msg);
                                jQuery("#select-artista .input_chosen").chosen();                            
                                jQuery("#add-artista").modal('hide');
                            }
                        });
        } catch (x) {
            console.log(x.message);
            return false;
        }
        return false;
    };

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
                            jQuery("#select-pais .input_chosen").chosen();                            
                            jQuery("#add-pais").modal('hide');
                            
                            jQuery("#ArtistaAddForm").each(
                                function(){
                                    this.reset();
                                });
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
                            jQuery("#select-cidade .input_chosen").chosen();                            
                            jQuery("#add-cidade").modal('hide');
                        }
                    });
        return false;
    };

var addIconografia = 
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

                            
                            jQuery("#select-iconografia").html(msg);
                            jQuery("#select-iconografia .input_chosen").chosen();                            
                            jQuery("#add-iconografia").modal('hide');
                        }
                    });
        return false;
    };

var addInstituicao = 
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
                            jQuery("#select-instituicao").html(msg);
                            jQuery("#select-instituicao .input_chosen").chosen();                            
                            jQuery("#add-instituicao").modal('hide');
                        }
                    });
        return false;
    };

var addObraTipo = 
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

                            
                            jQuery("#select-obratipo").html(msg);
                            jQuery("#select-obratipo .input_chosen").chosen();                            
                            jQuery("#add-obratipo").modal('hide');
                        }
                    });
        return false;
    };