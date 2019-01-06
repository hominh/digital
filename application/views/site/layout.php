<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('site/blocks/header'); ?>
    </head>
    <body class="cms-index-index">
        <div class="page">
            <?php $this->load->view('site/blocks/head'); ?>
            <?php echo $this->load->view($subview,'',TRUE); ?>
            <?php $this->load->view('site/blocks/footer'); ?>
        </div>
    </body>
</html>
