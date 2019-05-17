
    <form id="locationform" method="post" action="#">
        <div class="form_group">
            <div class="form_input">
                <input type="text" name="location" placeholder="Enter a location" class="form-control" >
            </div>
        </div>
        <div class="form_group">
            <div class="form_input">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6959761.014640264!2d50.69992317560584!3d31.566893458551075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef7ec2ec16b1df1%3A0x40b095d39e51face!2sIran!5e0!3m2!1sen!2sin!4v1552371736211" allowfullscreen=""></iframe>
            </div>
        </div>
        <div class="form_group">
            <div class="form_input">
                <select name="city" class="form-control" >
                    <option value="">Select City</option>
                    <option value="Tehran">Tehran </option>
                    <option value="Mashhad">Mashhad</option>
                    <option value="Isfahan">Isfahan</option>
                </select>
            </div>
        </div>
       <?php if($servicemethod == ' On Site'){ ?>
           <input type="hidden" value="schedule" id="next_tab">
       <?php }else{ ?>
           <input type="hidden" value="provider" id="next_tab">
       <?php } ?>
       <span class="btn btn-primary" onclick="save_location();">Save</span>
    </form>