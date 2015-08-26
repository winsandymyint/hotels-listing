(function($) {	
  $( "#where" ).autocomplete({      
        source: function( request, response ) {
              $.ajax({
              url: "/ajax/retrieve_destinations",
              dataType: 'json',
              type: 'POST',
              data: request,
              success: function(data){                
                  response(data);                
              }
            });
          },
          minLength: 2,
          select: function( event, ui ) {
            $('#destination_code').val(ui.item.id); 
            $('#autocomplete').val('y');
          },
          open: function() {
            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            $( this ).autocomplete( 'widget' ).css( 'z-index' , 100);
          },
          close: function() {
            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
          }
    });  
})(jQuery);