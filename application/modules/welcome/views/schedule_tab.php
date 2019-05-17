
    <form id="scheduleform" method="post" action="#">
         <div class="schedule_calendar">
            <div class="schedule_date_n"></div>
            <div class="time_slots_wrapper">
                <div class=show_schedule_date>
                    <input type="text" value="" name="dateslots" id="schedule_date_n">
                </div>
                <div class="radio_box">
                    <?php for($i=8;$i<=22;$i++){ ?>
                    <label>
                        <input type="radio" name="timeslots" value="<?=$i?>:30-<?=$i+1?>:30" onclick="save_schedule();">
                        <span class="r_text"><?=$i?>:30-<?=$i+1?>:30</span>
                    </label>
                    <?php } ?>
                    
                </div>
            </div>
         </div>
         <input type="hidden" value="provider" id="next_tab">
    </form>
    <script type="text/javascript">

	$(function () {
        $(".schedule_date_n").datepicker({
             maxDate: "+3m",
             minDate:"+1",
             dateFormat: "dd MM yy",
            onSelect: function(dateText, inst) { 
               //var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
               
               $("#schedule_date_n").val(dateText);
               $(".time_slots_wrapper").show();
            }
         });
	 });
	 </script>