<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WeXplor Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin_assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome 4.4.0-->
    <link rel="stylesheet" href="<?php echo base_url()?>admin_assets/font_awesome/css/font-awesome.min.css">
    <!-- Ionicons 2.0.1-->
    <link rel="stylesheet" href="<?php echo base_url()?>admin_assets/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin_assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin_assets/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body class="hold-transition login-page">
<div class="login-box">
		<?php if($this->session->flashdata('warning')!=''){ ?>
								<p style="color: red;font-size: 14px;text-align: center;"><?php echo $this->session->flashdata('warning'); ?></p>  
				<?php } ?>
      <div class="login-logo">
        <b>Admin</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>
		<form class="form-horizontal" action="<?php echo base_url();?>admin/login" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	
	
	<!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>admin_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>admin_assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>admin_assets/dist/js/app.min.js"></script>
</body>
</html>