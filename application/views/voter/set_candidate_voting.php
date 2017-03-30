	<style>
		input[type="checkbox"]{
		  width: 30px; /*Desired width*/
		  height: 30px; /*Desired height*/
		  cursor: pointer;
		  appearance: none;
		}
	</style>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Shree Surat Visa Oswal Candidates 2017 - 15 Candidates.
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Candidates</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general rtable elements -->
					<form action="<?php echo base_url().'voter/submit_voting' ?>" method="post">
						<div class="box box-primary">
							<!-- /.box-header -->
							<div class="box-body">
								<div class="row">
									<div class="col-md-12">
										<table id="example1" class="table table-bordered table-striped">
											<tbody>
												<?php $i = 1;?>
												<?php $j = 1;?>
												<tr border="2">
												<?php foreach($candidate_lists as $candidate_list) {?>
													
														
														<td  class="<?php //echo ( $candidate_list['id']%2 == 0)?'bg-red':'bg-blue' ?>" style="border: 6px solid #f4f4f4;<?php echo (($i+$j)%2 == 0)?'background-color: rgba(255, 255, 0, 0.18)':'background-color: rgba(255, 165, 0, 0.22);' ?>">
															<div class="col-md-9">
																<div class="col-md-12">
																	<b><?php echo $i.") "; echo $candidate_list['name']; ?></b>
																</div>
																<div class="col-md-12">
																	<b><?php echo $candidate_list['nike_name']; ?></b>
																</div>
															</div>
															<div class="col-md-3">
																<img src="<?php echo $candidate_list['candidate_image']; ?>" class="img-circle" alt="User Image" height="60" width="60">
															</div>
															<div class="col-md-12" style="margin-left: 50px;">
																<label><input type="checkbox" class="selected_candidate flat-red" name="candidate[<?php echo $i; ?>][candidate_id]" value="<?php echo $candidate_list['id']; ?>" checked></label>
																<input type="hidden" name="candidate[<?php echo $i; ?>][voter_id]" value="<?php echo $voter;?>">
															</div>
														</td>
													<?php if($i % 4 == 0){?>
													<?php $j++;?>
														</tr>
														<tr border="2">
													<?php } ?>
														
												<?php $i++; ?>
												<?php } ?>
													<td><button type="submit" id="voter_submit" class="btn btn-primary" tabindex="" style="height: 120px;width: 310px;font-size: 50px;">Submit</button></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
					</form>
					<!-- /.box -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
  <!-- /.content-wrapper -->

