<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recl | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/admin/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/admin/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/admin/plugins/iCheck/square/red.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style>
  
.capbox {
	background-color: #fff;
	
	border-width: 0px 12px 0px 0px;
	display: inline-block;
 *display: inline;
	zoom: 1; /* FOR IE7-8 */
	padding: 8px 8px 8px 8px;
    width:100%;
}
.capbox-inner {
	font: bold 11px arial, sans-serif;
	color: #000000;
	background-color: #ababab;
	margin: 5px auto 0px auto;
	padding: 3px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
}
.CaptchaDiv {
	font: bold 17px verdana, arial, sans-serif;
	font-style: italic;
	color: #fff;
	background-color: #dd4b39;
	padding: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
}
#CaptchaInput {
	margin: 1px 0px 1px 0px;
	width: 100%;
}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>RECL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

	<?php 
		$form_validation = $this->session->flashdata('form_validation');
		if(!empty($form_validation)){ ?>
		<div class="alert alert-danger alert-dismissible">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    	<h4><i class="icon fa fa-ban"></i> Error!</h4>
	    	<?php echo $form_validation; ?>
	  	</div>			
	<?php } ?>
	<?php if($this->session->flashdata('message_name')){ ?> 
		    <?php echo $this->session->flashdata('message_name'); ?>
        <?php } ?>
              
    <form action="<?php echo base_url(); ?>wp-admin/login/processing" method="post" novalidate id="lgn1">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
	  <div class="form-group">
            <div class="capbox">
                <div class="CaptchaDiv"><?php print_r($this->session->userdata('captcha')); ?></div>
                <div class="capbox-inner"> Type the above number:<br>
                  <input type="text" name="captcha" id="CaptchaInput" size="15" class="form-control">
                
                  
                </div> 
              </div> 
			  <?php echo $this->session->flashdata('cap');?>
            </div>
	  
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-8">
        	<a href="#forgot_password" data-toggle="modal">Forgot Password</a>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!------forgot modal----------------->
 <div class="modal fade" id="forgot_password" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background:#fff;">
        <div class="modal-header" style="background: #dd4b39;color: #fff;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold">Forgot Password</h4>
        </div>
        <div class="modal-body">
        	<p>Please Enter Your Registered Email Address.</p>
        	<p><?php echo $this->session->flashdata('email_not_exit');?></p>
         <form role="form" action="<?php echo base_url()?>wp-admin/login/forget_password" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="forgot_email" class="form-control" id="email" placeholder="Enter email" required/>
    </div>
   <button type="submit" class="btn btn-danger">Submit</button>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>resources/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>resources/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>resources/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
    $(document).ready(function(){
        $('#lgn1').submit(function(){
            var CaptchaDiv = $.trim($('.CaptchaDiv').text());
            var CaptchaInput = $.trim($('#CaptchaInput').val());
            if(CaptchaDiv == CaptchaInput){
                return true;
            }else{
            alert('Please Enter Valid Captcha');
                return false;
            }

        });
    });	
</script>
</body>
</html>
