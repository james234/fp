<div class="footer-container">
<div class="container">
<div class="col-md-3">
<div class="footer-one">
<h2>Our Services</h2>
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">About us</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Portfolio</a></li>
<li><a href="#">Contact us</a></li>
</ul>
</div>
</div><!---- close col-md-3--->
<div class="col-md-3">
<div class="footer-one">
<h2>Our Services</h2>
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">About us</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Portfolio</a></li>
<li><a href="#">Contact us</a></li>
</ul>
</div>

</div><!---- close col-md-3--->

<div class="col-md-3">
<div class="footer-one">
<h2>Follow Us</h2>
<ul>
<li><a href="#"><i class="icon-facebook6 footer-social"></i><span style="float:left;padding-left:10px;padding-top:2px;">Facebook</span></a></li>
<li><a href="#"><i class="icon-twitter3 footer-social"></i><span style="float:left;padding-left:10px;padding-top:2px;">Twitter</span></a></li>
<li><a href="#"><i class="icon-google-plus4 footer-social"></i><span style="float:left;padding-left:10px;padding-top:2px;">Googleplus</span></a></li>
<li><a href="#"><i class=" icon-youtube footer-social"></i><span style="float:left;padding-left:10px;padding-top:2px;">Youtube</span></a></li>

</ul>
</div>

</div><!---- close col-md-3--->
<div class="col-md-3">
<div class="footer-one">
<h2>Login Form</h2>
 <form role="form">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">LOGIN</button>
        <button type="submit" class="btn btn-default">REGISTER</button>
        
        <div class="checkbox">
      <label style="padding-left:0px;"><a href="#" style="text-decoration:none; color:#2ecc71; font-weight:500;"><i class="icon-lock-open"></i> Forget Password</label>
    </div>
  </form>

</div>

</div><!---- close col-md-3--->





</div><!---- close container--->
</div><!---- close footer container--->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login Form</h4>
        </div>
        <div class="modal-body">
           <form class="form-inline" action="index.html" method="post" id="form-login" style="padding-bottom:24px !important;">
            <input type="text" class="input-small" placeholder="Email">
            <input type="password" class="input-small" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn primary1">Sign in</button>
        </form>
        <a href="#" style="color:#2dcc70; font-size:12px; text-decoration:none;">Forgot your password?</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
    <!-- Bootstrap core JavaScript
    ================================================== -->	
	
<script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript-->
<script src="<?=Base_url()?>assets/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	<!-- Validation -->
	<script src="<?=Base_url()?>assets/js/jquery.validate.min.js"></script>    
	<script src="<?=Base_url()?>assets/js/custom.js"></script>
	<!----------Accordion---------->	
	<script src="<?=Base_url()?>assets/js/easyResponsiveTabs.js"></script>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- ColorBox PopUp -->
	<script src="<?=Base_url()?>assets/js/jquery.colorbox-min.js"></script>    
	
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="<?=Base_url()?>/assets/js/jquery.geocomplete.min.js"></script>
<script>
$(function () {	
	$("#location").geocomplete({           
	  details: ".geo-details",
	  detailsAttribute: "data-geo"
	});

});
</script>


    
	
  </body>
</html>