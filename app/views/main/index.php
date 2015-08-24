<form action="property/search" method="POST" autocomplete="off">
<div class="box-body">
    <div class="form-group">
        <label>Minimal</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
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
            <input type="text" class="form-control pull-right daterange" id="reservation">
        </div>        
    </div>

    <div class="form-group">
        <label>Check Out:</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="">
        </div>        
    </div>
    <div class="form-group">
        <label>Persons</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
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
                <i class="fa fa-phone"></i>
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



