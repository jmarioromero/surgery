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
                        
        </div>
    </div>  
</div>
