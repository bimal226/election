
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
				Voter
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Voter</li>
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
							<h3 class="box-title">Add Voter</h3>
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
											<label for="coming_from">Voter Id</label>
											<input type="text" class="form-control" name="voter_id" id="voter_id" placeholder="Voter Id" tabindex="2" value="<?php echo set_value('voter_id'); ?>">
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
												<th>Voting ID</th>
												<th>Added By</th>
												<th>Is Voted</th>
												<?php if($_SESSION['parent_id'] == '0'){?>
												<th>Reset Voter</th>
												<?php } ?>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;?>
											<?php if(isset($voter_lists)){ ?>
												<?php foreach($voter_lists as $voter_list) {?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $voter_list['voter_id']; ?></td>
														<td><?php echo $voter_list['adm_name']; ?></td>
														<td><label class="label <?php echo ($voter_list['vote_given'] == '1')?'label-success':'label-danger'; ?>"><?php echo ($voter_list['vote_given'] == '1')?'Voted':'Not Voted'; ?></label></td>
														<?php if($_SESSION['parent_id'] == '0'){?>
														<td>
															<a class="label label-info" href="<?php echo base_url()."admin/reset_voting/".$voter_list['id'];?>">
																Reset Voter
															</a>
														</td>
														<?php } ?>
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

