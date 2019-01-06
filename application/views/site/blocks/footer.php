
<footer class="footer">
    <div class="brand-logo ">
        <div class="container">
            <div class="slider-items-products">
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">
                        <?php foreach($brands as $row): ?>
                            <div class="item"> <a href="<?php echo $row->link; ?>"><img src="<?php echo base_url('upload/brands/'.$row->image); ?>" alt="<?php echo $row->name; ?>"></a> </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle container">
        <div class="col-md-3 col-sm-4">
            <div class="footer-logo"><a href="index.html" title="Logo"><img src="images/footer-logo.png" alt="logo"></a></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu. </p>
            <div class="payment-accept">
                <div><img src="images/payment-1.png" alt="payment"> <img src="images/payment-2.png" alt="payment"> <img src="images/payment-3.png" alt="payment"> <img src="images/payment-4.png" alt="payment"></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4">
            <h4>Shopping Guide</h4>
            <ul class="links">
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4">
            <h4>Shopping Guide</h4>
            <ul class="links">
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4">
            <h4>Shopping Guide</h4>
            <ul class="links">
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                <li class="first"><a href="#" title="How to buy">How to buy</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-4">
            <h4>Contact us</h4>
            <div class="contacts-info">
                <address>
                    <i class="add-icon">&nbsp;</i>123 Main Street, Anytown, <br>
                    &nbsp;CA 12345  USA
                </address>
                <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +1 800 123 1234</div>
                <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:support@magikcommerce.com">minhhh@gmail.com</a> </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom container">
        <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2018 Magikcommerce. All Rights Reserved.</div>
        <div class="col-sm-7 col-xs-12 company-links">
            <ul class="links">
                <li><a href="#" title="Magento Themes">Magento Themes</a></li>
                <li><a href="#" title="Premium Themes">Premium Themes</a></li>
                <li><a href="#" title="Responsive Themes">Responsive Themes</a></li>
                <li class="last"><a href="#" title="Magento Extensions">Magento Extensions</a></li>
            </ul>
        </div>
    </div>
</footer>
<div class="social">
    <ul>
        <li class="fb"><a href="#"></a></li>
        <li class="tw"><a href="#"></a></li>
        <li class="googleplus"><a href="#"></a></li>
        <li class="rss"><a href="#"></a></li>
        <li class="pintrest"><a href="#"></a></li>
        <li class="linkedin"><a href="#"></a></li>
        <li class="youtube"><a href="#"></a></li>
    </ul>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/common.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/revslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/js/owl.carousel.min.js"></script>
<script type='text/javascript'>
    jQuery(document).ready(function(){
        jQuery('#rev_slider_4').show().revolution({
        dottedOverlay: 'none',
        delay: 5000,
        startwidth: 1170,
        startheight: 580,

        hideThumbs: 200,
        thumbWidth: 200,
        thumbHeight: 50,
        thumbAmount: 2,

        navigationType: 'thumb',
        navigationArrows: 'solo',
        navigationStyle: 'round',

        touchenabled: 'on',
        onHoverStop: 'on',

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        spinner: 'spinner0',
        keyboardNavigation: 'off',

        navigationHAlign: 'center',
        navigationVAlign: 'bottom',
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: 'left',
        soloArrowLeftValign: 'center',
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: 'right',
        soloArrowRightValign: 'center',
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: 'on',
        fullScreen: 'off',

        stopLoop: 'off',
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: 'off',

        autoHeight: 'off',
        forceFullWidth: 'on',
        fullScreenAlignForce: 'off',
        minFullScreenHeight: 0,
        hideNavDelayOnMobile: 1500,

        hideThumbsOnMobile: 'off',
        hideBulletsOnMobile: 'off',
        hideArrowsOnMobile: 'off',
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ''
        });
    });
</script>
