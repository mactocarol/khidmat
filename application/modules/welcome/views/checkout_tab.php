<?php
//print_r($_SESSION);
?>
<form method="post" id="" action="<?php echo site_url('welcome/checkout');?>">
<div class="checkout_panel">
                	<div class="row">
                    	<div class="col-md-12">
                        	<h1>Billing Address</h1>
                            <div class="form-group">
                            	<label><i class="fas fa-user"></i> Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                            </div>
                            
                            <div class="form-group">
                            	<label><i class="fas fa-envelope"></i> Enter Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                            	<label><i class="fas fa-file"></i> Address</label>
                                <input name="address" type="text" class="form-control" placeholder="Enter Your Address">
                            </div>
                            
                            <div class="form-group">
                            	<label><i class="fas fa-building"></i> Enter City</label>
                                <input name="city" type="text" class="form-control" placeholder="Enter Your Email">
                            </div>
                            
                            <div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                        <label>State</label>
                                        <input name="state" type="text" class="form-control" placeholder="Enter State">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                        <label>Zip Code</label>
                                        <input name="zipcode" type="text" class="form-control" placeholder="Enter Zip Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="col-md-6">
                        	<h1>Payment</h1>
                            <div class="form-group">
                            	<label>Accepted Card</label>
                                <div class="card_panel">
                                	<a href="#"><img src="images/maestro.png"></a>
                                    <a href="#"><img src="images/amazon.png"></a>
                                    <a href="#"><img src="images/master-card.png"></a>
                                    <a href="#"><img src="images/visa.png"></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name On Card</label>
                                <input type="text" class="form-control" placeholder="Enter Name On Card">
                            </div>
                            <div class="form-group">
                                <label>Card Number</label>
                                <input type="text" class="form-control" placeholder="Enter Card Number">
                            </div>
                            <div class="form-group">
                                <label>Exp Month</label>
                                <input type="text" class="form-control" placeholder="Enter Exp Month">
                            </div>
                            
                            <div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                        <label>Exp Year</label>
                                        <input type="text" class="form-control" placeholder="Enter Exp Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                        <label>CVV</label>
                                        <input type="text" class="form-control" placeholder="Enter CVV">
                                    </div>
                                </div>
                            </div>
                            
                         </div>-->
                    </div>
                    
                    <!--<p><input type="checkbox" name="shipping"> Shipping Address Same as Billing Address</p>-->
                    <button class="btn btn-primary" type="submit">Save</button>
                	</div>
<input type="hidden" id="next_tab" value="finished">
</form>
                    