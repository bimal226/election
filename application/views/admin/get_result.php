
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
												<th>Candidate Name</th>
												<th>Voting Count</th>
												<th>Voting Percentage</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;?>
											<?php $count = 0;?>
											<?php foreach($candidate_lists as $candidate_list) {?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $candidate_list['name']; ?></td>
													<td><?php echo $candidate_list['count']."/".$total_vote_count; ?></td>
													<td><?php if($total_vote_count != 0){echo number_format(($candidate_list['count']/$total_vote_count)*100,2,'.','.')." %";}else{echo '0 %';} ?></td>
												</tr>
											<?php $i++; ?>
											<?php $count+=$candidate_list['count']; ?>
											<?php } ?>
												<tr>
													<td> Total Votes</td>
													<td> <?php echo $count; ?> </td>
													<td> Valid Votes</td>
													<td> <?php echo $total_vote_count*2; ?> </td>
												</tr>
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

