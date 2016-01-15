<div class="container">
    <div class="row">
	   <div class="col-lg-3"></div>
  <form  method="post" id="login_form"  name="login" action="<?php echo base_url()?>registration/login">           
            <div class="col-lg-6">               
				<?php if(!empty($error_msg)){
					echo '<div class="alert text-center"><strong>'. $error_msg.'</strong></div>';} ?>					
                <div class="well well-sm text-center"><strong>Login Form</strong></div>                
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
                <input type="submit" name="submit" id="submit" value="Login" class="btn btn-info pull-right">
            </div>
        </form>
	   <div class="col-lg-3"></div>      
    </div>
</div>



