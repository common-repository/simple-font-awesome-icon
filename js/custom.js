jQuery(document).ready(function(){

var fontAwesomeApi = jsVars.pluginUrl+'files/icons.yml';

jQuery('body').on('click', '#fontIcon', function () { 
    jQuery('#loader').removeClass('hide'); 
    getFontAwesomeIcons(function(data){      
        jQuery('#fontIcon').focus();
        jQuery('#listIcons').append('<i class="fa fa-' + data.id + '"></i>');         
        jQuery('#fontIcon').attr('id','fontIconOpen');
        var fontClass = jQuery('.font-text-box').val().replace('fa ','');
        if(fontClass!=''){
            jQuery('.'+ fontClass).addClass('active');
        }
        jQuery('#loader').addClass('hide'); 
    });        
    
});

function getFontAwesomeIcons(handleData){    
    jQuery.get(fontAwesomeApi, function(data){
        var parsedYaml = jsyaml.load(data);
        jQuery.each(parsedYaml.icons, function(index, icon){          
            handleData(icon); 
        });  
    });    
}

jQuery('body').on('click', '#fontIconOpen', function () { 
    jQuery('#loader').addClass('hide');     
    jQuery('#listIcons').empty();
    jQuery('#fontIconOpen').attr('id','fontIcon');
});

jQuery('body').on('click', '.fa', function () {
    var className = jQuery(this).attr('class');
    jQuery('.font-text-box').val(className);
    jQuery('#fontIconOpen').attr('id','fontIcon');
    jQuery('#listIcons').empty();
});

});