<div class="container">
<div class="col-md-2 col-xs-12">
<div class="logo"><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/logo (1).png" class="img-responsive"></a></div>
</div>
<div class="col-md-9 col-xs-12 pull-right social-icons">
<div class="text-left email-verify"><?php if(isset($errormsg) && $errormsg!=''){ echo $errormsg;} ?></div>
<div class="navbar-collapse1" id="navbar1" aria-expanded="false" style="height: 1px;">
          <form class="navbar-form navbar-right" method="post" id="login_form"  name="login" action="<?php echo base_url()?>verifylogin">
            <div class="form-group">
              <input type="text" id="InputEmail" name="InputEmail" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="password" id="InputPassword" name="InputPassword" class="form-control" placeholder="Password" required>
            </div>
			<input id="btn_login" name="btn_login" type="submit" class="btn btn-success" value="Login" />
            <a href="<?php echo base_url()?>registration/index" style="padding-left:5px;">Register</a>
          </form>
        </div>
</div>
</div>
