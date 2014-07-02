<div class="col-md-offset-2 col-md-8 wrapper-form section" id="marketing-section">
    <h2><?php echo lang('marketing.marketing_form'); ?></h2>
    <hr />
    <div class="row" id="marketing-options">
        <div class="col-md-6">
            <h3 class="subtitle"><?php echo lang('marketing.poll_title'); ?></h3>
            <hr/>
            <div class="align_center polltext-wrapper">
                <p><?php echo lang('marketing.poll_text'); ?></p>
                <br />
                
                <?php alink(array(
                    'class' => 'btn-success',
                    'href' => base_url(ROUTE_POLL),
                    'icon' => 'glyphicon-plus',
                    'id' => 'gotopollform-btn',
                    'text' => 'marketing.poll_button'
                )); ?>
                
            </div>
            <hr/>
        </div>        
        <div class="col-md-6">
        
            <h3 class="subtitle"><?php echo lang('marketing.search_title'); ?></h3>
            <hr/>
        
            <?php load_view(VIEW_MARKETING_SEARCH); ?>
            
            <div class="align_right">

                <?php alink(array(
                    'class' => 'btn-default',
                    'href' => base_url(ROUTE_SEARCHPOLL),
                    'icon' => 'glyphicon-chevron-right',
                    'icon_position' => 'right',
                    'text' => 'marketing.searchmodule_button'
                )); ?>

            </div>
            
            <br />
                        
        </div>
    </div>  
</div>
