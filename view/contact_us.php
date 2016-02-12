<div class="container">
    <div class="row">
	   <div class="col-lg-3"></div>
        <form role="form" method="post" id="contact_form"  name="contact_form" action="<?php echo base_url()?>home/contact_us">
            <div class="col-lg-6">                
				<?php if(!empty($data)){
						echo '<div class="alert alert-success fade in text-center"><strong>'. $data.'</strong></div>';} ?>				
                <div class="well well-sm text-center"><strong>Contact Us</strong></div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
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
                    <label for="mobile">Mobile </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="message">message</label>
                    <div class="input-group">
                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>								
				
                <input type="submit" name="send" id="send" value="Send" class="btn btn-info pull-right">
            </div>
        </form>
	   <div class="col-lg-3"></div>      
    </div>
</div>



