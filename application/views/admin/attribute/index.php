<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
	<?php $this->load->view('admin/header'); ?>
</head>
<body>

<?php $this->load->view('admin/left'); ?>
<div id="right-panel" class="right-panel">
	<?php $this->load->view('admin/head'); ?>
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Dashboard</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="content mt-3">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<?php echo $message; ?>
						<div class="card-header">
							<div class="col-sm-9">
								<strong class="card-title">Attribute</strong>
							</div>
							<div class="col-sm-3">
								<div class="float-right">
									<a href="<?php echo base_url()."admin/attribute/create"; ?>" class="btn btn-info" role="button">Create</a>
								</div>

							</div>
						</div>

						<div class="card-body">
							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Id</th>
										<th>Code</th>
										<th>Label</th>
										<th>Note</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($list as $row): ?>
											<tr>
												<td><?php echo $row->id; ?></td>
												<td><?php echo $row->code; ?></td>
												<td><?php echo $row->label; ?></td>
												<td><?php echo $row->note; ?></td>

												<td>
													<a href="<?php echo base_url()."admin/attribute/update/".$row->id; ?>"><button type="button" class="btn btn-success btn-sm">Edit</button></a>
													<a href="<?php echo base_url()."admin/attribute/delete/".$row->id; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer'); ?>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/assets/js/lib/data-table/datatables-init.js"></script>
</body>
</html>
