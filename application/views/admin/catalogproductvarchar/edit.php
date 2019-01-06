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
								<strong>Edit</strong> brand
							</div>
							<div class="card-body card-block">
								<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="name" name="name" value="<?php echo $info->name ?>" placeholder="Enter name..." class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="price" class=" form-control-label">Link</label></div>
										<div class="col-12 col-md-9"><input type="text" id="link" name="link" value="<?php echo $info->link ?>" placeholder="Enter link..." class="form-control"><span class="help-block"><?php echo form_error('link'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
										<div class="col-12 col-md-9"><input type="text" id="title" name="title" value="<?php echo $info->title ?>" placeholder="Enter title..." class="form-control"><span class="help-block"><?php echo form_error('title'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Image</label></div>
										<div class="col-12 col-md-9">
											<input type="file" class="form-control-file" id="image" name="image">
										</div>
										<div class="col col-md-3"><label for="keyword" class=" form-control-label"></label></div>
										<div class="col-12 col-md-9">
											<img src="<?php echo base_url('upload/brands/'.$info->image)?>" style="width:100px;height:70px">
										</div>
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
