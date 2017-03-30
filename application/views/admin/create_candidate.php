
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
				Candidate
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Candidate</li>
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
							<h3 class="box-title">Add Candidate</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="post" action="" enctype="multipart/form-data">
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
											<label for="visitor_name">Candidate Name</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Candidate Name" tabindex="1" value="<?php if(isset($candidate_detail['name'])){ echo $candidate_detail['name']; }else{ echo set_value('name'); } ?>">
											<label class="error" id="candidate_nameerr"><i class="fa fa-arrow-circle-o-up"></i> Please Enter Candidate Name. </label>
										</div>
										<div class="form-group col-md-4">
											<label for="visitor_name">Nike Name</label>
											<input type="text" class="form-control" id="nike_name" name="nike_name" placeholder="Candidate Nike Name" tabindex="1" value="<?php if(isset($candidate_detail['nike_name'])){ echo $candidate_detail['nike_name']; }else{ echo set_value('nike_name'); } ?>">
											<label class="error" id="candidate_nike_nameerr"><i class="fa fa-arrow-circle-o-up"></i> Please Enter Candidate Name. </label>
										</div>
										
										<div class="form-group col-md-4">
											<label for="contact_number">Candidate Image</label>
											<input type="file" class="form-control" name="candidate_image"  id="candidate_image" placeholder="Candidate Image" tabindex="3" value="<?php if(isset($candidate_detail['candidate_image'])){ echo $candidate_detail['candidate_image']; }else{ echo set_value('candidate_image'); } ?>">
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
					<!-- /.box -->
					<!-- general rtable elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Candidate List</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Candidate Image</th>
												<th>Candidate Name</th>
												<th>Candidate Nike Name</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;?>
											<?php foreach($candidate_lists as $candidate_list) {?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><img src="<?php echo $candidate_list['candidate_image']; ?>" class="img-circle" alt="User Image" height="50" width="50"></td>
													<td><?php echo $candidate_list['name']; ?></td>
													<td><?php echo $candidate_list['nike_name']; ?></td>
													<td><a href="<?php echo base_url().'candidate/'.$candidate_list['id']?>" class="label label-danger"> Edit </a></td>
												</tr>
											<?php $i++; ?>
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

