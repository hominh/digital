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
							<div class="card-header">
								<strong>Create</strong> product
							</div>
							<div class="card-body card-block">
								<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter name..." class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Image</label></div>
										<div class="col-12 col-md-9">
											<input type="file" class="form-control-file" id="image" name="image">
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="link" class=" form-control-label">Link</label></div>
										<div class="col-12 col-md-9"><input type="text" id="link" name="link" placeholder="Enter link..." class="form-control"><span class="help-block"><?php echo form_error('link'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="title1" class=" form-control-label">Title1</label></div>
										<div class="col-12 col-md-9"><input type="text" id="title1" name="title1" placeholder="Enter title1..." class="form-control"><span class="help-block"><?php echo form_error('title1'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="title2" class=" form-control-label">Title2</label></div>
										<div class="col-12 col-md-9"><input type="text" id="title2" name="title2" placeholder="Enter title2..." class="form-control"><span class="help-block"><?php echo form_error('title2'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="link" class=" form-control-label">Title3</label></div>
										<div class="col-12 col-md-9"><input type="text" id="title3" name="title3" placeholder="Enter title3..." class="form-control"><span class="help-block"><?php echo form_error('title3'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="" class=" form-control-label"></label></div>
										<div class="col-12 col-md-9">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Submit
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
										</div>
									</div>


							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
