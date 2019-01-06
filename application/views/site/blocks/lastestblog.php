<section class="latest-blog container wow">
	<div class="blog-title">
		<h2><span>Latest Blog</span></h2>
    </div>
    <div class="row">
    	<?php foreach($lastestblog as $row): ?>
			<div class="col-xs-12 col-sm-4">
				<div class="blog-img">
					<img src="<?php echo base_url('upload/blogs/'.$row->image); ?>" alt="<?php echo $row->name; ?>" />
	        	</div>
	        	<h3><a href=""><?php echo $row->name; ?></a> </h3>
	        	<p><?php echo $row->title; ?></p>
	        	<div class="post-date"><i class="icon-calendar"></i> <?php echo $row->created_at; ?></div>
	    	</div>
		<?php endforeach; ?>
    </div>
</section>