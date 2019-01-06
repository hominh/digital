<div class="main-container col2-right-layout">
	<div class="main container">
		<div class="row">
			<div class="col-main col-sm-9 wow">
				<div class="page-title">
					<h2>Blog</h2>
				</div>
				<div class="blog-wrapper" id="main">
					<div class="site-content" id="primary">
						<div role="main" id="content">
							<article class="blog_entry clearfix" id="vutidvaoday">
								<header class="blog_entry-header clearfix">
									<div class="blog_entry-header-inner">
										<h2 class="blog_entry-title"> <?php echo $blog['name']; ?> </h2>
									</div>
								</header>
								<div class="entry-content">

									<div class="featured-thumb">
										<a href="#"><img alt="blog-img4" src="<?php echo base_url('upload/blogs/'.$blog['image']); ?>"></a>
									</div>
									<div class="entry-content">
										<?php echo $blog['content']; ?>
									</div>
									<footer class="entry-meta">
										This entry was posted in <a rel="category tag" title="View all posts in First Category" href="#first-category">First Category</a>
										On
	                    				<time datetime="<?php echo $blog['created_at']; ?>" class="entry-date"><?php echo $blog['created_at']; ?></time>
									</footer>
								</div>
							</article>
							<div class="comment-content wow">
								<div class="comments-wrapper">
									<h3> Comments </h3>
									<ul class="commentlist">
										<li class="comment">
											<div class="comment-wrapper" id="vutidvaoday">
												<div class="comment-author vcard">
													<p class="gravatar">
														<a href="#"><img width="60" height="60" alt="avatar" src="images/avatar60x60.jpg"></a>
														<span class="author">John Doe</span>
													</p>
												</div>
												<div class="comment-meta">
													<time datetime="2014-07-10T07:26:28+00:00" class="entry-date">Thu, Jul 10, 2014 07:26:28 am</time>
												</div>
												<div class="comment-body">
													Curabitur at vestibulum sem. Aliquam vehicula neque ac nibh suscipit ultrices. Morbi interdum accumsan arcu nec scelerisque ellentesque id erat sem, ut commodo nulla. Sed a nulla et eros fringilla. Phasellus eget purus nulla.
												</div>
											</div>
										</li>
										<li class="comment">
											<div class="comment-wrapper" id="vutidvaoday">
												<div class="comment-author vcard">
													<p class="gravatar">
														<a href="#"><img width="60" height="60" alt="avatar" src="images/avatar60x60.jpg"></a>
														<span class="author">John Doe</span>
													</p>
												</div>
												<div class="comment-meta">
													<time datetime="2014-07-10T07:26:28+00:00" class="entry-date">Thu, Jul 10, 2014 07:26:28 am</time>
												</div>
												<div class="comment-body">
													Curabitur at vestibulum sem. Aliquam vehicula neque ac nibh suscipit ultrices. Morbi interdum accumsan arcu nec scelerisque ellentesque id erat sem, ut commodo nulla. Sed a nulla et eros fringilla. Phasellus eget purus nulla.
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="comments-form-wrapper clearfix">
									<h3>Leave A reply</h3>
									<form class="comment-form" method="post" id="postComment" action="#">
										<div class="field">
											<label for="name">Name<em class="required">*</em></label>
	                        				<input type="text" class="input-text" title="Name" value="" id="user" name="user_name">
										</div>
										<div class="field">
					                        <label for="email">Email<em class="required">*</em></label>
					                        <input type="text" class="input-text validate-email" title="Email" value="" id="email" name="user_email">
				                      	</div>
				                      	<div class="field aw-blog-comment-area">
				                        	<label for="comment">Comment<em class="required">*</em></label>
				                        	<textarea rows="5" cols="50" class="input-text" title="Comment" id="comment" name="comment"></textarea>
				                      	</div>
				                      	<div style="max-width:96%" class="button-set">
	                        				<input type="hidden" value="1" name="blog_id">
	                        				<button type="submit" class="bnt-comment"><span><span>Add Comment</span></span></button>
	                      				</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('site/blocks/popularpost'); ?>
		</div>	
	</div>
</div>
