jQuery(document).ready(
    function() {
        jQuery('.fancybox').fancybox();
        
        jQuery('#tab_buscas a').click(
            function (e) {
                e.preventDefault();
                jQuery(this).tab('show');
            });
        
        jQuery('.input_chosen').chosen();
        
        jQuery('.carousel').carousel();
    });