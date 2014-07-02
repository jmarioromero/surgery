<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?php echo lang('general.page_title'); ?></title>

        <?php
        $css_list = array(
            'bootstrap.css',
            'jasny-bootstrap.min.css',
            'bootstrap-flatui.min.css',
            'bootstrap-select.min.css',
            'bootstrap-datepicker.css',
            'bootstrap-timepicker.min.css',
            'bootstrap-ladda-themeless.min.css',
            'custom.css',
            'footable.css'
        );
        ?>
        
        <?php //Assets::clear_cache(); ?>

        <?php //Assets::css($css_list); ?>
        
        <?php foreach($css_list as $css): ?>
        
            <?php echo link_tag(base_url("assets/css/{$css}")); ?>
        
        <?php endforeach; ?>

    </head>
    <body>
        <input id="baseurl" type="hidden" value="<?php echo base_url(); ?>"/>
        <div class="container">

            <?php //$this->load->view(VIEW_MENU); ?>
