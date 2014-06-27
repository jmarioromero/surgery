<div class="hidden_section" id="pollform-success">
    <div class="alert alert-success">
        <h4><span class="glyphicon glyphicon-ok"></span> <?php echo lang('marketing.poll_created'); ?></h4>
    </div>
    <hr />
    <div class="row">
        <div class="align_center col-md-4">
            
            <?php alink(array(
                'href' => base_url(ROUTE_MARKETING),
                'text' => 'marketing.home_button'
            )); ?>
                        
        </div>
        <div class="align_center col-md-4">
            
            <?php alink(array(
                'class' => 'btn-success',
                'href' => base_url(ROUTE_POLL),
                'icon' => 'glyphicon-plus',
                'text' => 'marketing.poll_button'
            )); ?>
                        
        </div>
        <div class="align_center col-md-4">
        
            <?php alink(array(
                'class' => 'btn-warning',
                'href' => base_url(ROUTE_SEARCHPOLL),
                'icon' => 'glyphicon-search',
                'text' => 'marketing.search_title'
            )); ?>            
        
        </div>
    </div>
    <br />
</div>
