<aside id="left-panel" class="left-panel">
	<nav class="navbar navbar-expand-sm navbar-default">

		<div class="navbar-header">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
			<a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
		</div>

		<div id="main-menu" class="main-menu collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
				</li>
				<h3 class="menu-title">Products</h3><!-- /.menu-title -->
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/catalog"; ?>"> <i class="menu-icon fa fa-laptop"></i>Catalog</a>
				</li>
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/product"; ?>"> <i class="menu-icon fa fa-laptop"></i>Product</a>
				</li>
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/attribute"; ?>"> <i class="menu-icon fa fa-laptop"></i>Attribute</a>
				</li>
				<?php  ?>
				<h3 class="menu-title">User</h3><!-- /.menu-title -->
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/admin"; ?>"> <i class="menu-icon fa fa-laptop"></i>User</a>
				</li>
				<h3 class="menu-title">Transaction</h3><!-- /.menu-title -->
				<h3 class="menu-title">Other</h3><!-- /.menu-title -->

				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/brand"; ?>"> <i class="menu-icon fa fa-laptop"></i>Brand</a>
				</li>
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/blog"; ?>"> <i class="menu-icon fa fa-laptop"></i>Blog</a>
				</li>
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/slide"; ?>"> <i class="menu-icon fa fa-laptop"></i>Slide</a>
				</li>
				<h3 class="menu-title">Config</h3><!-- /.menu-title -->
				<li class="menu-item-has-children dropdown">
					<a href="<?php echo base_url()."admin/config"; ?>"> <i class="menu-icon fa fa-laptop"></i>Config</a>
				</li>
				<h3 class="menu-title">Report</h3><!-- /.menu-title -->

			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
</aside><!-- /#left-panel -->
