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
				<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
					<div class="row">
						<div class="col-xs-6 col-sm-6">
							<div class="card">
								<div class="card-header">
									<strong>Edit</strong> attribute
								</div>
								<div class="card-body card-block">

									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Code</label></div>
										<div class="col-12 col-md-9"><input type="text" id="code" name="code" value="<?php echo $info->code ?>" placeholder="Enter code..." class="form-control"><span class="help-block"><?php echo form_error('code'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Label</label></div>
										<div class="col-12 col-md-9"><input type="text" id="label" name="label" value="<?php echo $info->code ?>" placeholder="Enter label..." class="form-control"><span class="help-block"><?php echo form_error('label'); ?></span></div>
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
										<div class="col-12 col-md-9"><input type="text" id="note" name="note" value="<?php echo $info->note ?>" placeholder="Enter note..." class="form-control"><span class="help-block"><?php echo form_error('note'); ?></span></div>
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
									<strong>Create</strong> Options
								</div>
								<div class="card-body card-block">
									<div class="row form-group">
										<div class="table-responsive select-section">
											<table id="values-table" width="100%" class="table color-table info-table table table-hover table-striped table-condensed">
            									<thead>
										            <tr>
										                <th width="15%">Order</th>
										                <th width="35%">Value</th>
										                <th width="50%">Display</th>
										                <th></th>
										            </tr>
												<?php foreach($attribute_value as $row): ?>
													<tr id="<?php echo $row->id ?>" data-index="<?php echo $row->id ?>">
														<td>
															<div class="form-group">
																<input name="options[0][option_order]" type="text" value="" class="form-control">
															</div>
														</td>
														<td>
															<div class="form-group">
																<input name="value[]" type="text" value="<?php echo $row->value ?>" class="form-control">
															</div>
														</td>
														<td>
															<input name="display[]" type="text" value="<?php echo $row->display ?>" class="form-control">
														</td>
														<td>
															<div class="form-group">
																<button type="button" class="btn btn-danger btn-sm remove-value" style="margin:0;" data-index="0"><i class="fa fa-remove"></i></button>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
	            								</thead>
	            								<tbody>
	                        					</tbody>
        									</table>
										</div>
										<div class="col col-md-3">
											<button type="button" class="btn btn-success btn-sm" id="add-value"><i class="fa fa-plus"></i>
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
	<?php $this->load->view('admin/footer'); ?>
</body>
