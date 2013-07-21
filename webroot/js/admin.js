jQuery(document).ready(
    function() {
        jQuery('#step-bar a').click(
            function (e) {
                e.preventDefault();
                jQuery(this).tab('show');
            });
        jQuery('.typeahead').typeahead();
    });

bkLib.onDomLoaded(
    function(){
        var myEditor = new nicEditor({fullPanel : true })
            .panelInstance('ObraDescricao')
            .panelInstance('ArtistaBiografia');


        myEditor.addEvent('blur', 
                          function() {
                              myEditor.instanceById('ArtistaBiografia').saveContent();
                          });
    });