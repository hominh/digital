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
								<strong>Create</strong> config
							</div>
							<div class="card-body card-block">
								<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
										<div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter title..." class="form-control"><span class="help-block"><?php echo form_error('title'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Logo</label></div>
										<div class="col-12 col-md-9">
											<input type="file" class="form-control-file" id="image" name="image">
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
										<div class="col-12 col-md-9"><input type="text" id="description" name="description" placeholder="Enter description..." class="form-control"><span class="help-block"><?php echo form_error('description'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Keyword</label></div>
										<div class="col-12 col-md-9"><input type="text" id="keyword" name="keyword" placeholder="Enter keyword..." class="form-control"><span class="help-block"><?php echo form_error('keyword'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="address" class=" form-control-label">Address</label></div>
										<div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="Enter address..." class="form-control"><span class="help-block"><?php echo form_error('address'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="address" class=" form-control-label">Phone</label></div>
										<div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Enter phone..." class="form-control"><span class="help-block"><?php echo form_error('phone'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
										<div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Enter email..." class="form-control"><span class="help-block"><?php echo form_error('email'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="facebook_address" class=" form-control-label">Facebook</label></div>
										<div class="col-12 col-md-9"><input type="text" id="facebook_address" name="facebook_address" placeholder="Enter facebook address..." class="form-control"><span class="help-block"><?php echo form_error('facebook_address'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="twitter_address" class=" form-control-label">Twitter</label></div>
										<div class="col-12 col-md-9"><input type="text" id="twitter_address" name="twitter_address" placeholder="Enter twitter address..." class="form-control"><span class="help-block"><?php echo form_error('twitter_address'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="youtube_address" class=" form-control-label">Youtube</label></div>
										<div class="col-12 col-md-9"><input type="text" id="youtube_address" name="youtube_address" placeholder="Enter youtube address..." class="form-control"><span class="help-block"><?php echo form_error('youtube_address'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="linkedin_address" class=" form-control-label">Linkedin</label></div>
										<div class="col-12 col-md-9"><input type="text" id="linkedin_address" name="linkedin_address" placeholder="Enter Linkedin address..." class="form-control"><span class="help-block"><?php echo form_error('linkedin_address'); ?></span></div>
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
