<?php	//	echo "<pre>";print_r($detail);	?>
<?php	$this->load->view('admin/common/top_bar'); ?>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">       
        <!-- left menu starts -->
        <?php	$this->load->view('admin/common/left_menu'); ?>
        <!-- left menu ends -->
<div class="container">
    <div class="row">
	   <div class="col-lg-3"></div>
        <form role="form" method="post" id="registration_form"  name="registration" action="<?php echo base_url()?>admin/register">
            <div class="col-lg-6">                
				<?php if(!empty($data)){
						echo '<div class="alert alert-success fade in text-center"><strong>'. SUCCESS_MSG.'</strong></div>';} ?>				
                <div class="well well-sm text-center"><strong>Registration Form</strong></div>
                <div class="form-group">
                    <label for="InputUserName">Contact Person</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputUserName" id="InputUserName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPasswordFirst" name="InputPassword" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				 <div class="form-group">
                    <label for="InputPassword">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPasswordSecond" name="InputPassword" placeholder="Confirm Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputAddress">Address</label>
                    <div class="input-group">
                        <textarea name="InputAddress" id="InputAddress" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="InputTermConditions">Tick agree on terms and conditions :</label>
                    <div class="input-group">
                     <input type="checkbox" class="form-control" id="InputTermConditions" name="InputTermConditions" required> 					 
                    </div>
                </div>
				
                <input type="submit" name="submit" id="submit" value="Register" class="btn btn-info pull-right">
            </div>
        </form>
	   <div class="col-lg-3"></div>      
    </div>
</div>



</div><!--/fluid-row-->    <hr> 
    <footer class="row">     </footer>
</div><!--/.fluid-container-->
