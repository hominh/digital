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
								<strong>Update</strong> admin user
							</div>
							<div class="card-body card-block">
								<form action="" method="post" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="name" name="name" value="<?php echo $info->name ?>" class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="username" class=" form-control-label">Username</label></div>
										<div class="col-12 col-md-9"><input type="text" id="username" name="username" value="<?php echo $info->username ?>" class="form-control"><span class="help-block"><?php echo form_error('username'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="password" class=" form-control-label">Password</label></div>
										<div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Enter password..." class="form-control"><span class="help-block"><?php echo form_error('password'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="repassword" class=" form-control-label">Re Password</label></div>
										<div class="col-12 col-md-9"><input type="password" id="repassword" name="repassword" placeholder="Re Enter password..." class="form-control"><span class="help-block"><?php echo form_error('repassword'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="" class=" form-control-label"></label></div>
										<div class="col-12 col-md-9">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Update
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
