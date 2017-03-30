
<style>
	.error {
		display:none;
		color:red;
		
	}
</style>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Member</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Add Member</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="post" action="">
							<div class="box-body">
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
								<div class="row">
									<div class="col-md-12">
										<?php if(isset($id)){ ?>
											<input type="hidden" name="is_edit" value="1">
										<?php } ?>
										<div class="form-group col-md-4">
											<label for="visitor_name">Member Name</label>
											<input type="text" class="form-control" id="username" name="username" placeholder="User Name" tabindex="1" value="<?php if(isset($member_detail['username'])){ echo $member_detail['username'];}else{ echo set_value('username');}; ?>">
											<label class="error" id="voter_nameerr"><i class="fa fa-arrow-circle-o-up"></i> Please Enter Voter Name. </label>
										</div>
										
										<div class="form-group col-md-4">
											<label for="coming_from">Password Id</label>
											<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" tabindex="2" value="<?php echo set_value('pwd'); ?>">
											<label class="error" id="voter_iderr"><i class="fa fa-arrow-circle-o-up"></i> Please Enter Voter Id. </label>
										</div>
										<!-- /.form group -->
									</div>
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary submit-visitor" tabindex="12">Submit</button>
							</div>
						</form>
					</div>
					<!-- general rtable elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Voter List</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Member Name</th>
												<th>Member Password</th>
												<th>Edit</th>
										</thead>
										<tbody>
											<?php $i = 1;?>
											<?php if(isset($member_lists)){ ?>
												<?php foreach($member_lists as $member_list) {?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $member_list['username']; ?></td>
														<td><?php echo $member_list['pwd']; ?></td>
														<td><a class="label label-danger" href="<?php echo base_url()."member/list/".$member_list['id']; ?>" > Edit </a></td>
													</tr>
												<?php $i++; ?>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
  <!-- /.content-wrapper -->

