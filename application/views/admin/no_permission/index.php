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
					You don't have permission access
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
