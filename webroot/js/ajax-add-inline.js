var addArtista =
    function(form) {
        try {
            jQuery("#add-artista").modal('hide');
            backdrop_switch(true);
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
                            }
            }).always(function(){
                setTimeout(backdrop_switch, 1000);
            });
            return false;
        } catch (x) {
            console.log(x.message);
            return false;
        }
    };

var addPais =
    function(form) {
        try {
            jQuery("#add-pais").modal('hide');
            backdrop_switch(true);
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

                                jQuery("#ArtistaAddForm").each(
                                    function(){
                                        this.reset();
                                    });
                            }
            }).always(function(){
                setTimeout(backdrop_switch, 1000);
            });
            return false;
        } catch(x) {
            console.log("erro: " + x);
            return false;
        }
    };

var addCidade =
    function(form) {
        try {
            jQuery("#add-cidade").modal('hide');
            backdrop_switch(true);
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
                            }
            }).always(function(){
                setTimeout(backdrop_switch, 1000);
            });
            return false;
        } catch(x) {
            console.log("erro: " + x);
            return false;
        }
    };

var addIconografia =
    function(form) {
        try {
            jQuery("#add-iconografia").modal('hide');
            backdrop_switch(true);
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
                            }
            }).always(function(){
                setTimeout(backdrop_switch, 1000);
            });
            return false;
        } catch(x) {
            console.log("erro: " + x);
            return false;
        }
    };

var addInstituicao =
    function(form) {
        try {
            jQuery("#add-instituicao").modal('hide');
            backdrop_switch(true);
            jQuery.ajax({
                            url: form.action,
                            type: form.method,
                            data: jQuery(form).serialize(),
                            success: function (msg) {
                                //console.log(msg);
                                try {
                                    var error = jQuery.parseJSON(msg);
                                    console.log(msg);
                                    return;
                                } catch (x) {
                                    console.log(x);
                                }
                                jQuery("#select-instituicao").html(msg);
                                jQuery("#select-instituicao .input_chosen").chosen();
                            }
            }).always(function(){
                setTimeout(backdrop_switch, 1000);
            });
            return false;
        } catch(x) {
            console.log("erro: " + x);
            return false;
        }
    };

var addObraTipo =
    function(form) {
        try {
            jQuery("#add-obratipo").modal('hide');
            backdrop_switch(true);
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
                            }
            }).always(function(){
                setTimeout(backdrop_switch, 1000);
            });
            return false;
        } catch(x) {
            console.log("erro: " + x);
            return false;
        }
    };

function backdrop_switch(on){
    var backdrop = '<div class="modal-backdrop"><img src="' + site_url + 'img/ajaxloader.gif" /></div>';
    if(on){
        jQuery(backdrop).appendTo(document.body);
    } else {
        jQuery(".modal-backdrop").remove();
    }
}
