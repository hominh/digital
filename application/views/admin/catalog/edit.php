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
								<strong>Edit</strong> catalog
							</div>
							<div class="card-body card-block">
								<form action="" method="post" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter name..." class="form-control" value="<?php echo $info->name ?>"><span class="help-block"><?php echo form_error('name'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
										<div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter title..." class="form-control" value="<?php echo $info->site_title ?>"><span class="help-block"><?php echo form_error('title'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="des" class=" form-control-label">Description</label></div>
										<div class="col-12 col-md-9"><input type="text" id="desc" name="description" placeholder="Enter description..." class="form-control" value="<?php echo $info->meta_desc ?>"><span class="help-block"><?php echo form_error('description'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Keyword</label></div>
										<div class="col-12 col-md-9"><input type="text" id="keyword" name="keyword" placeholder="Enter keyword..." class="form-control" value="<?php echo $info->meta_key ?>"><span class="help-block"><?php echo form_error('keyword'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Order</label></div>
										<div class="col-12 col-md-9"><input type="text" id="order" name="order" placeholder="Enter order..." class="form-control" value="<?php echo $info->sort_order ?>"><span class="help-block"><?php echo form_error('order'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Parent catalog</label></div>
										<div class="col-12 col-md-9">
											<select name="catalog" id="select" class="form-control">
				                                <option value="0">Please select</option>
				                                <?php foreach($list as $row): ?>
													<option value="<?php echo $row->id; ?>" <?php echo ($row->id == $info->parent_id) ? 'selected' : ''; ?>><?php echo $row->name; ?></option>
												<?php endforeach; ?>
											</select>
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
