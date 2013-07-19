/**
 *
 * HTML5 Image uploader with Jcrop
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */

var jcrop_api, boundx, boundy;


var loadPreview = function(){
    $('#preview').Jcrop({
                            minSize: [150, 90], // min crop size
                            aspectRatio : 15 / 9, // keep aspect ratio 1:1
                            bgFade: true, // use fade effect
                            bgOpacity: .3, // fade opacity
                            onChange: updateInfo,
                            onSelect: updateInfo,
                            onRelease: clearInfo,
                            boxWidth: 900 
                            //                                boxHeight: 400
                        }, function(){
                            // use the Jcrop API to get the real image size
                            var bounds = this.getBounds();
                            boundx = bounds[0];
                            boundy = bounds[1];
                            
                            // Store the Jcrop API in the jcrop_api variable
                            jcrop_api = this;
                            /*console.log($('#x1').val()  
                                        + ' -- ' 
                                        +   $('#y1').val()  
                                        + ' -- ' 
                                        + $('#x2').val() 
                                        + ' -- ' 
                                        +  $('#y2').val());
                            console.log(boundx + '--' + boundy);*/
                            jcrop_api.setSelect([
                                                    validNumber($('#x1').val()), 
                                                    validNumber($('#y1').val()), 
                                                    validNumber($('#x2').val()), 
                                                    validNumber($('#y2').val()) 
                                                ]);
                            //console.log(jcrop_api.tellSelect());
                        });
};


// convert bytes into friendly format
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

function validNumber(n){
    if(isNaN(n) || n === ''){
        // console.log('whee');
        return 1;
    } else return parseInt(n, 10);
}

// check for selected crop region
function checkForm() {
    if (parseInt($('#w').val())) return true;
    $('.error').html('Por favor, selecione uma imagem e um miniatura').show();
    return false;
};

// update info by cropping (onChange and onSelect events handler)
function updateInfo(e) {
    $('#x1').val(e.x);
    $('#y1').val(e.y);
    $('#x2').val(e.x2);
    $('#y2').val(e.y2);
    $('#w').val(e.w);
    $('#h').val(e.h);
};

// clear info by cropping (onRelease event handler)
function clearInfo() {
    $('.info #w').val('');
    $('.info #h').val('');
};

function fileSelectHandler() {
    // get selected file
    var oFile = $('#image_file')[0].files[0];

    // hide all errors
    $('.error').hide();

    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg|image\/png)$/i;
    if (! rFilter.test(oFile.type)) {
        $('.error').html('Por favor selecione um arquivo válido de imagem (jpg, png)').show();
        return;
    }

    // check for file size
    if (oFile.size > 25 * 1024 * 1024) {
        $('.error').html('O arquivo é muito grande (maior que 25Mb), entre em contato com o administrador').show();
        return;
    }

    // preview element
    var oImage = document.getElementById('preview');
    
    // prepare HTML5 FileReader
    var oReader = new FileReader();
    oReader.onload = function(e) {

        // e.target.result contains the DataURL which we can use as a source of the image
        oImage.style.height = 'auto';
        oImage.src = e.target.result;
        oImage.onload = function () { // onload event handler            

            // display step 2
            $('.step2').fadeIn(500);
            // display some basic image info
            var sResultFileSize = bytesToSize(oFile.size);
            $('#filesize').val(sResultFileSize);
            $('#filetype').val(oFile.type);
            $('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);
            
            // Create variables (in this scope) to hold the Jcrop API and image size
            
            // destroy Jcrop if it is existed
            if (typeof jcrop_api != 'undefined') {
                // console.log('wheee!');
                jcrop_api.destroy();
            }
//            jcrop_api.destroy();
            
            // initialize Jcrop
            $('#preview').Jcrop({
                                    minSize: [150, 90], // min crop size
                                    aspectRatio : 15 / 9, // keep aspect ratio 1:1
                                    bgFade: true, // use fade effect
                                    bgOpacity: .3, // fade opacity
                                    onChange: updateInfo,
                                    onSelect: updateInfo,
                                    onRelease: clearInfo,
                                    boxWidth: 900
                                }, function(){
                                    // use the Jcrop API to get the real image size
                                    var bounds = this.getBounds();
                                    boundx = bounds[0];
                                    boundy = bounds[1];
                                    
                                    // Store the Jcrop API in the jcrop_api variable
                                    jcrop_api = this;
                                });
        };
    };
    
    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}