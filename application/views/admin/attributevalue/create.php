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
								<strong>Create</strong> attribute
							</div>
							<div class="card-body card-block">
								<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Code</label></div>
										<div class="col-12 col-md-9"><input type="text" id="code" name="code" placeholder="Enter code..." class="form-control"><span class="help-block"><?php echo form_error('code'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="link" class=" form-control-label">Label</label></div>
										<div class="col-12 col-md-9"><input type="text" id="label" name="label" placeholder="Enter label..." class="form-control"><span class="help-block"><?php echo form_error('label'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Type</label></div>
										<div class="col-12 col-md-9">
											<select name="type" id="type" class="form-control">
				                                <option value="0">Please select type</option>
												<option value="1">varchar</option>
												<option value="2">text</option>
												<option value="3">decimal</option>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Required</label></div>
										<div class="col-12 col-md-9">
											<select name="required" id="required" class="form-control">
				                                <option value="1">Required</option>
												<option value="1">Not required</option>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Required</label></div>
										<div class="col-12 col-md-9">
											<select name="unique" id="unique" class="form-control">
				                                <option value="0">Not unique</option>
												<option value="1">Unique</option>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="link" class=" form-control-label">Note</label></div>
										<div class="col-12 col-md-9"><input type="text" id="note" name="note" placeholder="Enter note..." class="form-control"><span class="help-block"><?php echo form_error('note'); ?></span></div>
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
