<?php $base_url = base_url()."public/";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Election</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>plugins/iCheck/square/blue.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href=""><b>Voter</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<?php $flash_data = $this->session->flashdata('flash');?>
					<?php if(isset($flash_data) && !empty($flash_data)){ ?>
						<div class="alert alert-<?php echo $flash_data['type']; ?>">
							<strong><?php echo $flash_data['msg']; ?></strong>
						</div>
					<?php } ?>
					<?php if(isset($flash) && !empty($flash)){ ?>
						<div class="alert alert-<?php echo $flash['type']; ?>">
							<strong><?php echo $flash['msg']; ?></strong>
						</div>
					<?php } ?>
				</div>
			</div>
			<p class="login-box-msg">Sign in to start your session</p>
			<form action="<?php echo base_url()."voter/add"; ?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" name="voter_number" class="form-control" placeholder="Voter Number">
				</div>
				<div class="row">
					 <!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Start Voting</button>
					</div>
				<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $base_url; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $base_url; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $base_url; ?>plugins/iCheck/icheck.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script>
</body>
</html>
