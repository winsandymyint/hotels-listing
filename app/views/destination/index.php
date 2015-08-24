<?php $graph_max_max_value = 1; ?>
<div class="row" id="avaliable-list">
  <div id="image" style="background:#FFF;height:400px;width:100%;text-align:center;">
    <img src="http://localhost/hotels/web/img/ajax-loader.gif" height="14px;" width="256px;" style="margin-top:200px;">
  </div>
</div>
<div class="alert alert-success" role="alert" id="results-bar" style="margin-top:20px;"></div>

<div id="sorting_select">
<select class="form-control" id="sort_by">
  <option value="best_deals">Best Deals</option>
  <option value="price_lth">Price (Low to High)</option>
  <option value="price_htl">Price (High to Low)</option>
</select>
</div>
<div class="clear"></div>
<ul class="hotel-list" style="display:none;"></ul>
<div id="status" style="display:none;"></div>
<script type="text/javascript" src="/hotels/web/js/listing/hotel-listing.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    load_select(0); 

    var time = 0;
    var destination = "<?= $location_id; ?>";
    var checkin = "<?= $check_in; ?>";
    var checkout = "<?= $check_out; ?>";
    var persons = "<?= $rooms; ?>";
    var rooms = "<?= $persons; ?>";
    //console.log(destination);
            function load_select() {
                    var newhtml = "";
                    var data = {
                                destination: destination,
                                checkin: checkin,
                                checkout: checkout,
                                persons: persons,
                                rooms: rooms
                                };
                    $.ajax({
                        type: "POST",
                        url: "/hotels/ajax/search_hotels",
                        dataType: "json",
                        data: data,
                        success: function(response) {                           
                                    var response_count = Object.keys(response).length;
                                    var count = 0;
                                    if (response_count > 0) {
                                        var search_complete = response.search_completed;
                                        var data = response.hotels;
                                        count = Object.keys(data).length;
                                        console.log(count);
                                    };

                                    if (count > 1) {
                                        var j = 1;
                                        var hotel_ids_arr = [];
                                        
                                          $.each(data, function(i, item) {
                                            hotel_ids_arr.push(item.id[0]);
                                            newhtml = hotel_listing_view(j, item);
                                            $(".hotel-list").append(newhtml);
                                            $(".hotel-list").css("display", "block");
                                            $("#avaliable-list").remove();
                                            j++;
                                          });
                                       
                                        
                                        $("#status").html("1");
                                        var hotel_count = j - 1;
                                        var result_list_count = "<strong>" + hotel_count + "</strong> hotels found";
                                        $("#results-bar").html(result_list_count);
                                        $("#results-bar").css("display", "block");
                                        $("#sorting_select").css("display", "block");
                                    };
                                },
                                complete: function() {
                                    var status = $("#status").html();
                                    console.log(status);
                                    if (status !== "1") {
                                        console.log("need to call again");
                                        if (time < 30001) {
                                            console.log(time);
                                            if (status !== 1) {};
                                            setTimeout(load_select, 5000);
                                            time = time + 5000;
                                        } else if (time > 30001 && status !== 1) {
                                            $("#avaliable-list").html("<p><center style=\"font-weight:bold;\">Sorry, no available hotels found.. change search criteria...</center></p>");
                                        }
                                    } else {
                                        console.log("no need to call");
                                        sort_by_best_deals();
                                    };
                                }
                            });
                        };
                    function book_hotel(element){
                        var room_key = $(element).attr("data-roomKey");
                        var room_des = $("#" +room_key+"des").text();
                        var price = $(element).parent().parent().attr("data-price");
                        var hotel_id = $(element).closest( "div" ).attr("id").replace("panel","");
                        var hotel_name = $("#" +hotel_id+"title").text();
                        var hotel_img =   $("#" +hotel_id+"img").attr("src"); 
                        var data = {
                                    checkin: checkin,
                                    checkout: checkout,
                                    persons: persons,
                                    rooms: rooms,
                                    room_key: room_key,
                                    room_des: room_des,
                                    price: price,
                                    hotel_id: hotel_id,
                                    hotel_img: hotel_img,
                                    hotel_name: hotel_name    
                                    };
                        
                        $.ajax({
                            type: "POST",
                            url: "/hotels/ajax/insert_hotels_temp",
                            dataType: "json",
                            cache: false,
                            data: data,
                            success: function(response) {
                                if (response > 0) {
                                    window.location.href = "http://localhost/hotels/property/booking/"+room_key;
                                };
                            }
                        });
                    }   
});
<?= $foot_script; ?>
</script>
<style type="text/css">
#rating{margin:10px 0px 10px 0px;}
#sorting_select{float: right;margin-bottom: 20px;display: none;}
#results-bar{display: none;}
.amenities{text-transform: capitalize;margin-left:6px;}
.price_td{text-align: right;}
.tab-list .glyphicon{margin-left:4px;}
.tab-details-item{margin-right: 10px;}
.tab-content{display: none;}
.hotel_content{margin-bottom: 10px;}
.collapse-expand{margin-right: 10px;}
.best_deal{  
          position: absolute;
          background-color: #da4453;
          color: #FFF;
          padding: 4px;
          bottom: 0px;
          padding-right: 10px;
        }
.ori_price{display: block;text-decoration: line-through;}
.price-title h3{font-size: 20px;}
.price-title span{font-size: 16px;}
.thumb{border-radius: 6px}
.title{font-size: 20px;color: #4b4b4c;font-weight: bold;margin-top:0px;}.hotel_address{color:#898989}#avaliable-list{margin: 0px;margin-top:-4px}.price_list{display: table;font-size: 22px;color: #e74c3c;width: 100%;margin-left: -15px}.price_list small{font-size: 10px}
</style>
 