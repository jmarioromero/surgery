<div class="poll-contactdata">
    <div class="row">
        <div class="col-md-6">
            <h3 class="subtitle subtitle-poll"><?php echo lang('marketing.contactdata_title'); ?></h3>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            
                <?php input(array(
                    'label' => 'marketing.celphone_label',
                    'class' => 'numeric'
                )); ?>
            
            </div>                
        </div>
        <div class="col-md-6">
            <div class="form-group">
            
                <?php input(array(
                    'label' => 'marketing.phone_label',
                    'class' => 'numeric'
                )); ?>
            
            </div>                
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">

                <?php input(array(
                    'label' => 'marketing.email_label',
                    'class' => 'onlyletters'
                )); ?>
            
            </div>                
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <hr />
</div>