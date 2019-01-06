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
					<div class="col-xs-6 col-sm-6">
						<div class="card">
							<div class="card-header">
								<strong>Create</strong> blog
							</div>
							<div class="card-body card-block">
								<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter name..." class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="intro" class=" form-control-label">Intro</label></div>
										<div class="col-12 col-md-9"><input type="text" id="intro" name="intro" placeholder="Enter intro..." class="form-control"><span class="help-block"><?php echo form_error('intro'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="tag" class=" form-control-label">Tag</label></div>
										<div class="col-12 col-md-9"><input type="text" id="tag" name="tag" placeholder="Enter tag..." class="form-control"><span class="help-block"><?php echo form_error('tag'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Image</label></div>
										<div class="col-12 col-md-9">
											<input type="file" class="form-control-file" id="image" name="image">
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
					<div class="col-xs-6 col-sm-6">
						<div class="card">
							<div class="card-header">
								<strong class="card-title">SEO</strong>
							</div>
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col col-md-3"><label for="keyword" class="form-control-label">Keyword</label></div>
									<div class="col-12 col-md-9"><input type="text" id="keyword" name="keyword" placeholder="Enter keyword..." class="form-control"><span class="help-block"><?php echo form_error('keyword'); ?></span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="title" class="form-control-label">Title</label></div>
									<div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter title..." class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
									<div class="col-12 col-md-9"><input type="text" id="description" name="description" placeholder="Enter description..." class="form-control"><span class="help-block"><?php echo form_error('description'); ?></span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="content" class="form-control-label">Content</label></div>
									<div class="col-12 col-md-9">
										<textarea id="txt_content" name="content" rows="9" placeholder="Content..." class="form-control"></textarea>
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
	<?php $this->load->view('admin/footer'); ?>
</body>
</html>
