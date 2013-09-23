bkLib.onDomLoaded(
    function(){
        var myEditor = new nicEditor({fullPanel : true, iconsPath : '/img/nicEditorIcons.gif' })
            .panelInstance('ArtistaBiografia');
        
        
        myEditor.addEvent('blur', 
                          function() {
                              myEditor.instanceById('ArtistaBiografia').saveContent();
                          });
    });