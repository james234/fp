<div class="container">
    <div class="row">
	   <div class="col-lg-3"></div>
        <form role="form" method="post" id="change_password_form"  name="change_password" action="<?php echo base_url()?>myaccount/changePassword">
            <div class="col-lg-6">                
				<?php if(!empty($pwdMsg)){
						echo '<div class="alert alert-success fade in text-center"><strong>'. $pwdMsg.'</strong></div>';} ?>				
                <div class="well well-sm text-center"><strong>Change Password</strong></div>
                 <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				 <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" onblur="retypePassword();" name="confirm_password" placeholder="Confirm Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>              
				
                <input type="submit" name="change_password" id="change_password" value="Change Password" class="btn btn-info pull-right">
            </div>
        </form>
	   <div class="col-lg-3"></div>      
    </div>
</div>



