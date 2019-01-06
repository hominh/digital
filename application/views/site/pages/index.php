<div id="magik-slideshow" class="magik-slideshow">
    <div class="wow">
        <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
            <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                <ul>
                    <?php foreach($slide as $row): ?>
                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='<?php echo base_url('upload/slides/'.$row->image); ?>'><img src='<?php echo base_url('upload/slides/'.$row->image); ?>' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                            <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15'  data-y='80'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'><?php echo $row->title1; ?></div>
                            <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15'  data-y='135'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><?php echo $row->title2; ?></div>
                            <div class='tp-caption sfb  tp-resizeme ' data-x='15'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href="<?php echo $row->link; ?>" class="view-more">View More</a></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
</div>
<div class="header-service">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content">
                    <div class="icon-truck">&nbsp;</div>
                    <span><strong>FREE SHIPPING</strong> on order over $99</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content">
                    <div class="icon-truck">&nbsp;</div>
                    <span><strong>FREE SHIPPING</strong> on order over $99</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content">
                    <div class="icon-truck">&nbsp;</div>
                    <span><strong>FREE SHIPPING</strong> on order over $99</span>
                </div>
            </div>
        </div>
    </div>
</div>

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
	        	<h3><a href="blog/detail/<?php echo $row->alias; ?>.html"><?php echo $row->name; ?></a> </h3>
	        	<p><?php echo $row->title; ?></p>
	        	<div class="post-date"><i class="icon-calendar"></i> <?php echo $row->created_at; ?></div>
	    	</div>
		<?php endforeach; ?>
    </div>
</section>