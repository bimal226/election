
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
				Booth
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Booth</li>
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
							<h3 class="box-title">Add Booth</h3>
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
										<div class="form-group col-md-4">
											<label for="visitor_name">Booth Number</label>
											<input type="text" class="form-control" id="booth_number" name="booth_number" placeholder="Booth Number" tabindex="1" value="<?php echo set_value('booth_number'); ?>">
											<label class="error" id="voter_nameerr"><i class="fa fa-arrow-circle-o-up"></i> Please Enter Voter Name. </label>
										</div>
										
										<div class="form-group col-md-4">
											<label for="coming_from">Admin</label>
											<select name="admin_id" class="form-control">
												<option value="1">Select Admin</option>
												<?php foreach($member_lists as $member_list){?>
													<option value="<?php echo $member_list['id']; ?>"><?php echo $member_list['username']; ?></option>
												<?php } ?>
											</select>
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
												<th>Booth Number</th>
												<th>Admin Name</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;?>
											<?php if(isset($booth_lists)){ ?>
												<?php foreach($booth_lists as $booth_list) {?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $booth_list['booth_number']; ?></td>
														<td><?php echo $booth_list['adm_name']; ?></td>
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

