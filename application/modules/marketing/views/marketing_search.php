<form class="searchform" role="form">
    <div class="align_center polltext-wrapper">
        <p><?php echo lang('marketing.search_text'); ?></p>
        <br />    
        <div class="input-group">
        
            <?php input(array(
                'id' => 'search',
                'innergroup' => FALSE,
                'placeholder' => 'marketing.search_title'
            )); ?>
            
            <span class="input-group-btn">
    
                <?php button(array(
                    'class' => 'btn-warning search-btn',
                    'text' => 'marketing.search_button'
                )); ?>        
            
            </span>
        </div>
    </div>                
    <hr/>
</form>
                