<div class="poll-contactdata">
    <div class="row">
        <div class="col-md-6">
            <h3 class="subtitle subtitle-poll"><?php echo lang('marketing.healthdata_title'); ?></h3>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            
                <?php select($entity_select); ?>
           
            </div>                
        </div>
        <div class="col-md-6">
            <div class="form-group">
            
                <?php select($status_select); ?>
            
            </div>                
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">

                <?php select($agreement_select); ?>
            
            </div>                
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <hr />
</div>
