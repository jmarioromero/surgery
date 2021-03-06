<div class="col-md-offset-2 col-md-8 wrapper-form section" id="marketing-section">
    <h2><?php echo lang('marketing.marketing_form'); ?></h2>
    <hr />
    
    <input id="validate-msg" type="hidden" value="<?php echo lang('marketing.validate_msg'); ?>" />
    
    <form id="pollform" role="form">
        
        <?php load_view(VIEW_POLL_ACTIONS); ?>
        
        <hr />
        
        <?php load_view(VIEW_POLL_PERSONALDATA); ?>
        
        <?php load_view(VIEW_POLL_CONTACTDATA); ?>
        
        <?php load_view(VIEW_POLL_HEALTHDATA); ?>
        
        <?php load_view(VIEW_POLL_ACTIONS); ?>
            
        <br />
    </form>
    
    <?php load_view(VIEW_POLL_SUCCESS); ?>
    
</div>
