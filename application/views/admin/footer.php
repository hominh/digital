<script src="<?php echo base_url(); ?>public/admin/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/main.js"></script>


<script src="<?php echo base_url(); ?>public/admin/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/widgets.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script src="<?php echo base_url(); ?>public/admin/assets/plugins/ckeditor/ckeditor.js"></script>

<script>
	( function ( $ ) {
		"use strict";

		jQuery( '#vmap' ).vectorMap( {
			map: 'world_en',
			backgroundColor: null,
			color: '#ffffff',
			hoverOpacity: 0.7,
			selectedColor: '#1de9b6',
			enableZoom: true,
			showTooltip: true,
			values: sample_data,
			scaleColors: [ '#1de9b6', '#03a9f5' ],
			normalizeFunction: 'polynomial'
		} );
	} )( jQuery );
</script>
<script type="text/javascript">
	jQuery(document).ready(function($){
		if ($(".select-section #values-table").length > 0) {
			$(document).on('click', '#add-value', function () {
				var index = $('.select-section #values-table tr:last').data('index');
				if (isNaN(index)) {
                    index = 0;
                } else {
                    index++;
                }
				$('.select-section #values-table tr:last').after('<tr id="tr_' + index + '" data-index="' + index + '"><td><div class="form-group">' +
                    '<input name="order[' + index + ']" type="text"' +
                    'value="" class="form-control"/></div></td><td><div class="form-group">' +
                    '<input id="options[' + index + ']" name="value[' + index + ']" type="text"' +
                    'value="" class="form-control"/></div></td>' +
                    '<td><input name="display[' + index + '] type="text"' +
                    'value="" class="form-control"/></div></td>' +
                    '<td><div class="form-group"><button type="button" class="btn btn-danger btn-sm remove-value" style="margin:0;" data-index="' + index + '">'
                    + '<i class="fa fa-remove"></i></button></div></td>' +
                    '</tr>');
			});
			$(document).on('click', '.remove-value', function () {
                var index = $(this).data('index');
                $("#tr_" + index).remove();
            });
		}
	});
</script>
<script type="text/javascript">
	jQuery(document).ready(function($){
		CKEDITOR.replace('txt_content' ,{
			filebrowserImageBrowseUrl : '<?php echo base_url('public/admin/assets/plugins/kcfinder');?>'
		});
		//if(CKEDITOR.instances['txt_content']) {
			//CKEDITOR.remove(CKEDITOR.instances['txt_content'],filebrowserImageBrowseUrl : '<?php echo base_url('public/admin/assets/plugins/kcfinder');?>');
		//}
		//CKEDITOR.config.width = 600;
	    //CKEDITOR.config.height = 150;
		CKEDITOR.replace('txt_content',{});
	})
</script>
