        </div> <!-- /container -->

        <?php //Assets::cdn(array('jquery'));?>
        
        <?php
        $js_list = array(
            'jquery.1.9.1.min.js',
            'jquery.easing.min.js',
            'jquery.numeric.js',
            'bootstrap.min.js',
            'jasny-bootstrap.min.js',
            'bootstrap-select.min.js',
            'bootstrap-datepicker.js',
            'bootstrap-timepicker.min.js',
            'bootstrap-growl.min.js',
            'spin.min.js',
            'ladda.min.js',
            'module_controller.js',
            'module_marketing.js',
            'footable/footable.js',
            'footable/footable.filter.js',
            'footable/footable.paginate.js',
            'footable/footable.sortable.js'
        );
        ?>

        <?php //Assets::js($js_list); ?>
        
        <?php foreach($js_list as $js): ?>
        
            <script type="text/javascript" src="<?php echo base_url("assets/js/{$js}"); ?>"></script>
        
        <?php endforeach; ?>
        
    </body>
</html>
