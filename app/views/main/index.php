<form action="property/search" method="POST" autocomplete="off">
    <div class="box-body">      
        <div class="form-group">
            <label>Minimal</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-location-arrow"></i>
                </div>
                <input class="required search_table_cell_input form-control" id="where" name="where" type="text" placeholder="eg. Singapore"/>            
                <input class="" id="destination_code" type="hidden" name="destination_code" value="">
                <input class="" id="autocomplete" type="hidden" name="autocomplete" value="n">     
            </div>
        </div>
        <div class="form-group">
            <label>Check In:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right daterange" id="from">
            </div>        
        </div>

        <div class="form-group">
            <label>Check Out:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" id="to">
            </div>        
        </div>
        <div class="form-group">
            <label>Persons</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <select class="form-control" name="no_of_guests">
                    <option value="1">1 Guests</option>
                    <option value="2">2 of Guests</option>
                    <option value="3">3 of Guests</option>
                    <option value="4">4 of Guests</option>
                </select>
            </div>        
        </div>
         <div class="form-group">
            <label>Rooms</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-building-o"></i>
                </div>
               <select class="form-control" name="no_of_rooms">
                    <option value="1">1 rooms</option>
                    <option value="2">2 rooms</option>
                    <option value="3">3 rooms</option>
                    <option value="4">4 rooms</option>
                </select>
            </div>        
        </div>
    </div>
    <button type="submit" class="btn green-btn">Search</button>
</form>
<script type="text/javascript">
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

  //Datepicker
  var startDate=null;
  var endDate=null;  
        $('#from').datepicker({'format': 'm/d/yyyy','autoclose': true,startDate: '+7d'})
        .on('changeDate', function(ev){
                startDate   =new Date(ev.date.getFullYear(),ev.date.getMonth(),ev.date.getDate(),0,0,0); 
                var myDate  = new Date($("#from").val());               
                
                var checkout = myDate.setDate(myDate.getDate() + 1); 
                var date = new Date(checkout);
                
                var newdate = new Date(date.toString("MMMM yyyy"));
                var change_checkout = (newdate.getMonth() + 1) + '/' + newdate.getDate() + '/' + newdate.getFullYear();
    
                endDate = $("#to").val();
                if (!endDate == '') {
                    var currentEndDate  = new Date(endDate);                    
                    if (currentEndDate <= startDate) {
                        $("#to").datepicker("update", change_checkout);
                    };
                }
                else{                    
                    $("#to").datepicker("update", change_checkout);
                };                           
                
        });
    
        $('#to').datepicker({'format': 'm/d/yyyy','autoclose': true,startDate: '+8d'})
        .on('changeDate', function(ev){
                endDate   =new Date(ev.date.getFullYear(),ev.date.getMonth(),ev.date.getDate(),0,0,0); 
            
                var checkOutDate = new Date($('#to').val()); 
    
                var checkin = checkOutDate.setDate(checkOutDate.getDate() - 1); 
    
                var possible_checkin = new Date(checkin);
               
                var new_checkin_date = new Date(possible_checkin.toString("MMMM yyyy"));
                
                 
                var change_checkin = (new_checkin_date.getMonth() + 1) + '/' + new_checkin_date.getDate() + '/' + new_checkin_date.getFullYear();
                     
                var startDate = $('#from').val();
                if (!startDate == '') {
                    var currentStartDate = new Date(startDate);
                    if (endDate <= currentStartDate) {
                        
                        $("#from").datepicker("update", change_checkin);
                    };
                };
        });
})(jQuery);
</script>


