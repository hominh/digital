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
								<strong>Create</strong> product
							</div>
							<div class="card-body card-block">
								<form enctype="multipart/form-data" method="post" action="" id="form" class="form-horizontal">
									<div class="row form-group">
										<div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
										<div class="col-12 col-md-9"><input type="text" id="name" name="name" value="<?php echo $info->name ?>" placeholder="Enter name..." class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="price" class=" form-control-label">Price</label></div>
										<div class="col-12 col-md-9"><input type="text" id="price" name="price" value="<?php echo $info->price ?>" placeholder="Enter price..." class="form-control"><span class="help-block"><?php echo form_error('price'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="discount" class=" form-control-label">Discount</label></div>
										<div class="col-12 col-md-9"><input type="text" id="discount" name="discount" value="<?php echo $info->discount ?>" placeholder="Enter discount..." class="form-control"><span class="help-block"><?php echo form_error('discount'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Image</label></div>
										<div class="col-12 col-md-9">
											<input type="file" class="form-control-file" id="image" name="image">
										</div>
										<div class="col col-md-3"><label for="keyword" class=" form-control-label"></label></div>
										<div class="col-12 col-md-9">
											<img src="<?php echo base_url('upload/products/'.$info->image)?>" style="width:100px;height:70px">
										</div>
									</div>
									<?php $image_list = json_decode($info->image_list);?>
									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">List Image</label></div>
										<div class="col-12 col-md-9">
											<input type="file" multiple="" class="form-control-file" id="imagelist" name="imagelist[]">
										</div>
										<div class="col col-md-3"><label for="keyword" class=" form-control-label"></label></div>
										<div class="col-12 col-md-9">
											<?php if(is_array($image_list)): ?>
											<?php foreach ($image_list as $img):?>
								    		<img src="<?php echo base_url('upload/products/'.$img)?>" style="width:100px;height:70px;margin:5px">
								    		<?php endforeach;?>
											<?php endif;?>
										</div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="warranty" class=" form-control-label">Warranty</label></div>
										<div class="col-12 col-md-9"><input type="text" id="warranty" name="warranty" value="<?php echo $info->warranty ?>" placeholder="Enter warranty..." class="form-control"><span class="help-block"><?php echo form_error('warranty'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Gifts</label></div>
										<div class="col-12 col-md-9"><input type="text" id="gifts" name="gifts" value="<?php echo $info->gifts ?>" placeholder="Enter gifts..." class="form-control"><span class="help-block"><?php echo form_error('gifts'); ?></span></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-3"><label for="keyword" class=" form-control-label">Catalog</label></div>
										<div class="col-12 col-md-9">
											<select name="catalog" id="select" class="form-control">
				                                <option value="<?php echo $currentcataglog[0]->id; ?>"><?php echo $currentcataglog[0]->name; ?></option>
				                                <?php foreach ($othercatalogs as $row):?>
													<?php if(count($row->subs) > 1):?>
													<optgroup label="<?php echo $row->name?>">
														<?php foreach ($row->subs as $sub):?>
														<option value="<?php echo $sub->id?>"> <?php echo $sub->name?> </option>
														<?php endforeach;?>
													</optgroup>
													<?php else:?>
													<option value="<?php echo $row->id?>"><?php echo $row->name?></option>
													<?php endif;?>
												<?php endforeach;?>
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
									<div class="col-12 col-md-9"><input type="text" id="keyword" name="keyword" value="<?php echo $info->keyword ?>" placeholder="Enter keyword..." class="form-control"><span class="help-block"><?php echo form_error('keyword'); ?></span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="title" class="form-control-label">Title</label></div>
									<div class="col-12 col-md-9"><input type="text" id="title" name="title" value="<?php echo $info->title ?>" placeholder="Enter title..." class="form-control"><span class="help-block"><?php echo form_error('name'); ?></span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
									<div class="col-12 col-md-9"><input type="text" id="description" name="description" value="<?php echo $info->description ?>" placeholder="Enter description..." class="form-control"><span class="help-block"><?php echo form_error('description'); ?></span></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="content" class="form-control-label">Content</label></div>
									<div class="col-12 col-md-9">
										<textarea name="content" rows="9" placeholder="Content..." class="form-control"><?php echo $info->content ?></textarea>
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
