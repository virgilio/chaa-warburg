jQuery(document).ready(
    function() {
        
    });

bkLib.onDomLoaded(
    function(){
        var myEditor = new nicEditor(
            {
                fullPanel : true, 
                iconsPath : '/img/nicEditorIcons.gif' 
            }).panelInstance('ArtistaBiografia');
        /*myEditor.addEvent('add', function() {
         alert( myEditor.instanceById('ObraDescricao').getContent() );
         });*/
    });