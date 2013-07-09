var selected;
var chosen;
jQuery(document).ready(
    function(){

        chosen = jQuery("#ObraRelacionadas").chosen();        
        jQuery("#ObraRelacionadas")
            .change(
                function(){
                    var img = getThumbImage(jQuery(this).val());
                    jQuery("#ObrasRelacionadaRelacionadaId").val(jQuery(this).val());
                    selected = jQuery(this).val();
                });
        jQuery("a.relacionada-link-delete").click(
            function(e){                
                deleteButton(e, jQuery(this));
            });
    });


var deleteButton = 
    function(e, link){ 
        e.preventDefault();                
        if(confirm("Tem certeza que  deseja excluir relacionamento?")) {
            removeRelacionada(link.attr('href'), link.attr('parent'), link.attr('relacionada'));
        }
        return false;
    };


var removeRelacionada = 
    function(url, parent){
        jQuery.ajax(
            {
                url:  url,
                type: 'post',
                success: function (msg) {
                    console.log(msg);
                    try {
                        msg = jQuery.parseJSON(msg);
                    } catch (x) {
                        jQuery('body').html(msg);
                    }
                    if(msg.result === "success"){
                        jQuery('#' + parent).fadeOut(500, 
                                                     function(){
                                                         jQuery('#' + parent).remove();                                                         
                                                     });
                    }
                }
            });
    };


var getThumbImage = 
    function(id){
        jQuery.ajax(
            {
                url:  jQuery("#ObraGetImagemUrl").val() + "/" + id,
                type: 'get',
                success: function (msg) {
                    try {
                        msg = jQuery.parseJSON(msg);
                    } catch (x) {
                        console.log(x);
                    } 
                    jQuery("#thumb-relacionada").attr('src', jQuery('#ObraImagemUrl').val() + '/obras/thumbs/' + msg.imagem);
                }
            });
    };

var addRelacionada = 
    function(form) {
        jQuery.ajax({
                        url: form.action,
                        type: form.method,
                        data: jQuery(form).serialize(),
                        success: function (msg) {
                            try {
                                var error = jQuery.parseJSON(msg);
                            } catch (x) {
                                console.log(x);
                            } 
                            var elem = jQuery(msg);
                            jQuery("#obras-relacionadas").append(elem);
                                                        
                            jQuery("#obras-relacionadas .mini-obra:last-child a.relacionada-link-delete").click(
                                function(e){                
                                    deleteButton(e, jQuery(this));
                                });
                            
                            jQuery("#add-relacionada").modal('hide');
                            jQuery("#ObrasRelacionadaAddForm").each(
                                function(){
                                    this.reset();
                                });
                            
                            jQuery("#ObraRelacionadas option[value=" + selected + "]").attr('disabled','disabled');        
                            jQuery("#ObraRelacionadas").val('');        
                            chosen.trigger("liszt:updated");
                        }
                    });
        return false;
    };

var editRelacionada = 
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
                            } catch (x) {
                                console.log(x);
                            } 
                            
                            //jQuery("#obras-relacionadas").append(msg);
                            //jQuery("#select-pais .input_chosen").chosen();
                            //jQuery("#add-relacionada").modal('hide');
                        }
                    });
        return false;
    };